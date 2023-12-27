<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class ProductListingTest extends TestCase
{
    public function test_product_listing()
    {
        // Access the admin user
        $admin = User::find(1);

        $product = Product::find(1);

        $response = $this->actingAs($admin)->get('/products');
        $response->assertStatus(200)
            ->assertSee("Add To Cart")
            ->assertSee("Dummy Product")
            ->assertSee("50")
            ->assertSee("Base Item");
    }
    public function test_product_added_to_cart()
    {
        $admin = User::find(1);

        $product = Product::find(1);

        $response = $this->actingAs($admin)->get('/products');
        $response->assertStatus(200)
            ->assertSee("Add To Cart")
            ->assertSee("Dummy Product")
            ->assertSee("50")
            ->assertSee("Base Item");
        $product_data = ['id' => "1", 'user_id' => $admin->id, 'product_id' => $product->id, 'quantity' => "1"];
        // dd($product_data);

        $response = $this->Post('/shop/addtocart', ['id' => "1", 'user_id' => $admin->id, 'product_id' => $product->id, 'quantity' => "1"]);
        $response->assertStatus(200);

        $response = $this->get('/cart_data');
        // $response->assertStatus(200);
        $cart_data = ($response->getOriginalContent());
        foreach ($cart_data as $data) {
            $id = $data->id;
            $product_id = $data->product_id;
            $user_id = $data->user_id;
            $quantity = $data->quantity;
            // dd($id);
        }

        $this->assertEquals($product_data['id'], $id);
        $this->assertEquals($product_data['product_id'], $product_id);
        $this->assertEquals($product_data['user_id'], $user_id);
        $this->assertEquals($product_data['quantity'], $quantity);

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
