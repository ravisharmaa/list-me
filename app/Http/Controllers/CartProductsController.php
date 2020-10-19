<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartProductsController extends Controller
{
    public function index(Cart $cart) {
    	return $cart->cart_product()->get();
    }
}
