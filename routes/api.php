<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\CategoriesController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// GET http://list-me.test/api/categories

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('categories', [CategoriesController::class, 'store']);

// gets a product of a single categorys

// GET http://list-me.test/api/products/Chips

Route::get('products/{category}', [CategoryProductsController::class, 'index']);

//GET http://list-me.test/api/products

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





