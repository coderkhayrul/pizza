<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('frontpage');
Route::get('home/pizza/{pizza}', [FrontendController::class, 'show'])->name('frontpizza.show');
Route::post('/pizza/order/{pizza}', [FrontendController::class, 'store'])->name('order.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('pizza', PizzaController::class);
    // User Order
    Route::get('user/order', [UserOrderController::class, 'index'])->name('user.order');
    Route::post('order/status/{id}', [UserOrderController::class, 'statusChange'])->name('order.status');
});
