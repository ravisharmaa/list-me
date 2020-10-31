<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name','flavour','category_name', 'weight','unit','pack_size'];

    protected $hidden = ['product','cart_id'];

    public function cart() {
    	return $this->belongsTo(Cart::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function getNameAttribute() {
    	return $this->product->name;
    }

    public function getFlavourAttribute() {
    	return $this->product->flavour;
    }

    public function getCategoryNameAttribute() {
    	return $this->product->category_name;
    }

    public function getWeightAttribute() {
    	return $this->product->weight;
    }

    public function getUnitAttribute(){
    	return $this->product->unit;
    }

    public function getPackSizeAttribute() {
    	return $this->product->pack_size;
    }
}
