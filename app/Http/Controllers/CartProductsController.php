<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartProductsController extends Controller
{
    public function index(Cart $cart) {
    	return $cart->cart_product()->get();
    }

    public function store(Cart $cart) {
    	
    	$cartProduct = CartProduct::where('cart_id', $cart->id)
    		->where('product_id', request('product_id'));

    	if (!$cartProduct->exists() && !request('added')) {
    		return $cart->cart_product;
    	}

    	if ($cartProduct->exists() && request('added')) {
    		$cartProduct->first()->increment('quantity', 1);
    	}

    	if ($cartProduct->exists() && !request('added') && ($cartProduct->first()->quantity == 1)) {
			$cartProduct->delete();
    	}

    	if ($cartProduct->exists() && !request('added') && ($cartProduct->first()->quantity != 1)) {
			$cartProduct->first()->decrement('quantity', 1);
    	}

    	
    	if (!$cartProduct->exists() && request('added')) {
    		$cart->cart_product()->create([
    			'product_id' => Product::find(request('product_id'))->id
    		]);
    	}
    			
    	return $cart->cart_product;
    }

    public function destroy (Cart $cart) {
       
        $cart->cart_product->map(function($product) {
            return $product->delete();
        });

        return [];
    }
}
