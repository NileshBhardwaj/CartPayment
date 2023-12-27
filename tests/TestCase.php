<?php

namespace Tests;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, HasFactory, RefreshDatabase, HasRoles;

    protected $admin; // Add this line

    public function setUp(): void
    {
        parent::setUp();

        // Create the 'admin' role
        Role::create(['name' => 'admin']);

        $this->admin = User::create([ // Modify this line
            'id' => 1,
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('12345678'),
        ]);

        // Assign the 'admin' role to the user
        $this->admin->assignRole('admin'); // Modify this line

        $product1 = Product::create([
            'id' => 1,
            'name' => "Dummy Product",
            'description' => "Good Product",
            'category_id' => "2",
            'quantity' => "1",
            'price'=>"50",
            'image' => "image.jpg",
        ]);
        
        $product2 = Product::create([
            'id' => 2,
            'name' => "Product",
            'description' => "Good Product",
            'category_id' => "2",
            'quantity' => "1",
            'price'=>"50",
            'image' => "image.jpg",
        ]);
        $product3 = Product::create([
            'id' => 3,
            'name' => "Dummy Product",
            'description' => "Good Product",
            'category_id' => "2",
            'quantity' => "1",
            'price'=>"50",
            'image' => "image.jpg",
        ]);
        
        $product4 = Product::create([
            'id' => 4,
            'name' => "Product",
            'description' => "Good Product",
            'category_id' => "2",
            'quantity' => "1",
            'price'=>"50",
            'image' => "image.jpg",
        ]);

       

    }

    // public function login()
    // {
    //     $this->actingAs($this->admin); 
    // }
}