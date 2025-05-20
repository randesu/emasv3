<?php
namespace App\Livewire;

use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components/layouts/app');
}); 

// Route::get('/', function () {
//     return view('tama');
// }); 

//route register
Route::get('/register', Register::class)->name('register');

Route::get('/login', Auth\Login::class)->name('login');

Route::middleware('auth:customer')->group(function () {
    
    Route::group(['prefix' => 'account'], function () {
        
        //route my order
        Route::get('/my-orders', Account\MyOrders\Index::class)->name('account.my-orders.index');
  
        //route my order show
        Route::get('/my-orders/{snap_token}', Account\MyOrders\Show::class)->name('account.my-orders.show');

        Route::get('/my-profile', Account\MyProfile\Index::class)->name('account.my-profile');

    });

});