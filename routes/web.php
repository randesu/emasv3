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