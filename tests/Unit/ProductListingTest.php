<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class ProductListingTest extends TestCase
{
    public function test_admin_or_user_can_view_the_products_page()
    {
        $admin = User::find(1);
        $response = $this->actingAs($admin)->get('/products');
        $response->assertStatus(200)
            ->assertSee("Base Item")
            ->assertSee("Add To Cart")
            ->assertSee("Stadium Full Exterior");

    }

    public function test_product_listing()
    {
        // Access the admin user
        $admin = User::find(1);

        $product = Product::all();
        $response = $this->actingAs($admin)->get('/products');
        $response->assertStatus(200);
        $products = $response->getOriginalContent();
        foreach ($products as $product_info) {
            $this->assertEquals($product['name'], $product_info->name);
            $this->assertEquals($product['description'], $product_info->description);
            $this->assertEquals($product['category_id'], $product_info->category_id);
            $this->assertEquals($product['quantity'], $product_info->quantity);
        }

    }

    public function test_product_adding_to_cart()
    {
        $admin = User::find(1);
        $product = Product::find(1);
        $countBefore = Cart::count();
        $response = $this->actingAs($admin)->get('/products');
        $response->assertStatus(200);
        $product_data = ['id' => "1", 'user_id' => $admin->id, 'product_id' => $product->id, 'quantity' => "1"];
        $response = $this->Post('/shop/addtocart', ['id' => "1", 'user_id' => $admin->id, 'product_id' => $product->id, 'quantity' => "1"]);
        $response->assertStatus(200);
        $response->assertExactJson(['Added to cart']);
        $countAfter = Cart::count();
        $this->assertEquals($countBefore + 1, $countAfter);
        $cart = Cart::first();
        $this->assertEquals($cart['id'], $product_data['id']);
        $this->assertEquals($cart['product_id'], $product_data['product_id']);
        $this->assertEquals($cart['user_id'], $product_data['user_id']);
        $this->assertEquals($cart['quantity'], $product_data['quantity']);
    }
    public function test_product_added_to_cart_are_on_the_cart_page()
    {
        $admin = User::find(1);
        $cart_data1 = Cart::create([
            "user_id" => 1,
            "product_id" => 1,
            "quantity" => 4,
        ]);
        $cart_data2 = Cart::create([
            "user_id" => 1,
            "product_id" => 2,
            "quantity" => 4,
        ]);

        $response = $this->actingAs($admin)->get('/cart_data');
        $response->assertStatus(200);
        $data = $response->json();
        $cart_data_ids = [$cart_data1->id, $cart_data2->id];
        $cart_data_product_id = [$cart_data1->product_id, $cart_data2->product_id];
        $cart_data_user_id = [$cart_data1->user_id, $cart_data2->user_id];
        foreach ($data as $value) {
            $this->assertContains($value['id'], $cart_data_ids);
            $this->assertContains($value['user_id'], $cart_data_user_id);
            $this->assertContains($value['product_id'], $cart_data_product_id);
        }
    }

    public function test_date_filter_of_the_line_chart()
    {
        $admin = User::find(1);
        $date1 = "2023-12-08";
        $date2 = "2023-12-20";

        $str_date = Carbon::create($date1);
        // dd($str_date);
        $end = Carbon::create($date2);
        $start_date = $str_date->toIso8601ZuluString('millisecond');
        $end_date = $end->toIso8601ZuluString('millisecond');

        // $formatted1 = $str_date->toIsoString('millisecond');
        // // dd($formatted1);

        // $formatted2 =$end->toIsoString('millisecond');
        // // dd($formatted2);
        $newDate = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $end_date)->format('Y-m-d\TH:i:sO');
        $newDate2 = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $start_date)->format('Y-m-d\TH:i:sO');

        $requested_dates = ['start_date' => $newDate2, 'end_date' => $newDate];
        // dd($newDate);

        //if we are using the get then it should be as query parameters
        $response = $this->actingAs($admin)->get("/analytics_data?start_date={$start_date}&end_date={$end_date}");
        $response->assertStatus(200);
        $data_response = $response->json();

        $start_date_response = $data_response['start_date'];
        $end_date_response = $data_response['end_date'];
        $this->assertEquals($requested_dates['start_date'], $start_date_response);
        $this->assertEquals($requested_dates['end_date'], $end_date_response);

    }
}
