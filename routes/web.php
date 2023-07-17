<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', "isAdmin"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group([ "prefix" => "dashboard" ], function (){
        Route::get("/product", [ProductController::class, "index"])->name("product.index");
        Route::get("/product/show/{id}", [ProductController::class, "show"])->name("product.show");
        Route::get("/product/create", [ProductController::class, "create"])->name("product.create");
        Route::post("/product/store", [ProductController::class, "store"])->name("product.store");
        Route::get("/product/edit/{id}", [ProductController::class, "edit"])->name("product.edit");
        Route::post("/product/update", [ProductController::class, "update"])->name("product.update");
        Route::get("/product/delete/{id}", [ProductController::class, "delete"])->name("product.delete");
        Route::post("/product/destroy", [ProductController::class, "destroy"])->name("product.destroy");
    });
});

require __DIR__.'/auth.php';
