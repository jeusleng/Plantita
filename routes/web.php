<?php

use App\Http\Controllers\CustomerMyAccount;
use App\Http\Controllers\CustomerOrders;
use App\Http\Controllers\Marketplace;
use App\Http\Controllers\Payment;
use App\Http\Controllers\SellerMyAccount;
use App\Http\Controllers\SellerOrders;
use App\Http\Controllers\SellerPlantita;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('loginPage');
});

Route::post('login', [UserAuth::class, 'login']);
Route::view('debug', 'debug');
Route::view('customerPage', 'customer.customerPage');
Route::view('sellerPage', 'seller.sellerPage');

Route::get('/logout', function () {
    if (session()->has('regno')) {
        session()->pull('regno');
    }
    return redirect('/')->with('success', 'Log out successful');
});

Route::get('/', function () {
    if (session()->has('regno')) {
        $regno = session('regno');
        $user  = DB::select('SELECT * FROM users WHERE regno = ?', [$regno]);

        if (!empty($user) && $user[0]->user_type == 'customer') {
            return redirect('customerPage');
        }
        if (!empty($user) && $user[0]->user_type == 'seller') {
            return redirect('sellerPage');
        }
    }
    return view('loginPage');
});



Route::get('/signup', function () {

    return view('signupPage');
});

Route::get('/login', function () {

    if (session()->has('regno')) {
        $regno = session('regno');
        $user  = DB::select('SELECT * FROM users WHERE regno = ?', [$regno]);

        if (!empty($user) && $user[0]->user_type == 'customer') {
            return redirect('customerPage');
        }
        if (!empty($user) && $user[0]->user_type == 'seller') {
            return redirect('sellerPage');
        }
    }
    return view('loginPage');
});


Route::post('signup', [SignUp::class, 'createAcc']);

//edit accounts

//customer
route::resource('MyAccountCustomer', CustomerMyAccount::class);
Route::post('customerMyAcc', [UserAuth::class, 'customerMyAccRoute']);

Route::get('edit/customer/{id}', [CustomerMyAccount::class, 'edit']);
Route::post('edit/customer/{id}', [CustomerMyAccount::class, 'update']);

//seller
route::resource('MyAccountSeller', SellerMyAccount::class);
Route::post('sellerMyAcc', [UserAuth::class, 'sellerMyAccRoute']);

Route::get('edit/seller/{id}', [SellerMyAccount::class, 'edit']);
Route::post('edit/seller/{id}', [SellerMyAccount::class, 'update']);

//

//customer


//seller plantita
route::resource('sellerMyPlantita', SellerPlantita::class);
Route::post('sellerPlantitaDirect', [UserAuth::class, 'sellerPlantitaRoute']);

Route::get('edit/plantita/{id}', [SellerPlantita::class, 'edit']);
Route::post('edit/plantita/{id}', [SellerPlantita::class, 'update']);
Route::get('delete/plantita/{id}', [SellerPlantita::class, 'destroy']);


//customer Marketplace
route::resource('customerMarketplace', Marketplace::class);
Route::post('customerMarketplaceDirect', [UserAuth::class, 'customerMarketplaceRoute']);

//customer payment
route::resource('customerPayment', Payment::class);
Route::post('customerPaymentDirect', [UserAuth::class, 'customerPaymentRoute']);


//customer orders
route::resource('customerOrders', CustomerOrders::class);
Route::post('customerMyOrdersDirect', [UserAuth::class, 'customerMyOrdersRoute']);
Route::get('delete/order/{id}', [CustomerOrders::class, 'destroy']);


//seller orders
route::resource('sellerOrders', SellerOrders::class);
Route::post('sellerOrdersDirect', [UserAuth::class, 'sellerOrdersRoute']);
Route::get('edit/{id}', [SellerOrders::class, 'edit']);
Route::post('edit/{id}', [SellerOrders::class, 'update']);
