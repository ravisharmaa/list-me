<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Registration and Login Routes.
Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);


// GET http://list-me.test/api/categories

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('categories', [CategoriesController::class, 'store']);

// gets a product of a single categorys
// GET http://list-me.test/api/products/Chips
Route::get('products/{category}', [CategoryProductsController::class, 'index']);

//GET http://list-me.test/api/products
// Gets the products.
Route::get('products', [ProductsController::class, 'index']);

// POST http://list-me.test/api/products/create
// Content-Type: application/json
/*
{
    "name":"Doritos",
    "flavour":"Potato Ranch",
    "weight":"12",
    "unit":"oz",
    "price":500,
    "minimum_order_quantity":12,
    "in_stock":0,
    "is_new":1,
    "offer_price":1200,
    "offer_label":"Christmas",
    "offer_valid_till":"2020-12-20",
    "category_id":2
}
*/

Route::post('products/create', [ProductsController::class, 'store']);

// DELETE http://list-me.test/api/products/12/delete

Route::delete('products/{product}/delete', [ProductsController::class, 'destroy']);

Route::put('products/{product}/update', [ProductsController::class, 'update']);

// GET http://list-me.test/api/suppliers
Route::get('suppliers',[SuppliersController::class, 'index']);

// GET http://list-me.test/api/stores
Route::get('stores',[StoresController::class, 'index']);

//GET http://list-me.test/api/cart/1
Route::get('cart/{user}', [CartController::class, 'index']);

// PUT http://list-me.text/api/cart/{cart}/1/update

Route::put('cart/{cart}/{user}/update', [CartController::class, 'update']);

//POST http://list-me.test/api/cart/1/create
Route::post('cart/{user}/create', [CartController::class, 'store']);

// Delete cart

Route::delete('cart/{cart}/{user}/delete', [CartController::class, 'destroy']);

// GET http://list-me.test/api/products/search?name=testla

// Searches the products aailable in the database.
Route::get('search/products', [ProductSearchController::class, 'index']);

// Gets the products/items available in the cart currently.
Route::get('cart/{cart}/products',[CartProductsController::class, 'index']);

Route::delete('cart/{cart}/products/delete',[CartProductsController::class, 'destroy']);

// Saves the items in the cart.
Route::post('cart/{cart}/product/create', [CartProductsController::class, 'store']);

