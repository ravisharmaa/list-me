<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    public function index() {

        $product = Product::search(request('name'))->get();

        return $product;
    }
}
