<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QRCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentDetails;
use App\Models\Cart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('cancel',function(){
    return view("cancel");
})->name('cancel');

Route::get('paypal', [PaymentController::class, 'index'])->name('paypal');

Route::get('paypal/payment', [PaymentController::class, 'payment'])->name('paypal.payment');

Route::get('paypal/payment/success', [PaymentController::class, 'paymentSuccess'])->name('paypal.payment.success');

Route::get('paypal/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('paypal.payment/cancel');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashBoardController::class,'ShowUserlist'])->middleware(['auth', 'verified','role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/user',[QRCode::class,'qr_code'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/qr_content', function (Request $request) {
    
    $token = $request->get('token');

    // Find the QR code in the database
    $qr = DB::table('qr_codes')->where('token', $token)->first();

    // dd($qr);

    $users = DB::table('users')->where('id',$qr->user_id)->first();
    // dd($user);
    if (isset($users)) {
     
      
        return view('qr_content', compact('users'));
    } else {
      
        return view('/invalid');
    }
});  
Route::post('/ajax',function(){
    $users = User::all();
return view('/dashboard',compact('users'));
});

Route::get('/products',function(){
    // dd(Auth::User());
    $product = Product::all();
// dd($product);
   return view('products',compact('product')); 
})->name('products');

Route::post('/shop/addtocart',[CartController::class,'add_to_cart']);

Route::get('/cart_data',[CartController::class,'user_cart']);

Route::get('/cart',function(){
    
    return view('cart');
})->name('cart');

Route::get('cart_empty',[CartController::class,'fetch_data']);

Route::get('fetch_data',[CartController::class,'remove_cart']);

Route::get('remove_product',[CartController::class,'remove_single_cart']);

Route::get('add_product',[CartController::class,'add_single_cart']);




Route::get('/payment',function(){
    return view('payment_dashboard');
})->name('payment');

Route::get('/analytics',function(){
    return view('analytics');
})->name('analytics');

Route::get('/analytics_data',[PaymentDetails::class,'fetch_payments'])->middleware(['auth', 'verified','role']);

Route::get('/payment_data',[PaymentDetails::class,'fetch_payments'])->middleware(['auth', 'verified','role']);


// Route::get('/dashboard', 'DashboardController@index')->middleware('user');
require __DIR__.'/auth.php';
