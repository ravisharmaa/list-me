<?php

namespace App\Models;

use App\Models\CartProduct;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $with = ['cart_product'];

    protected $hidden = ['supplier', 'store','supplier_id','store_id','user_id'];

    protected $appends = ['supplierName','storeName'];

    // user relationship
    public function user() {
    	return $this->belongsTo(User::class);
    }

    // product for carts

    public function cart_product() {
    	return $this->hasMany(CartProduct::class);
    }

    // supplier

    public function supplier() {
    	return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    // supplier name

    public function getSupplierNameAttribute($value) {
        return $this->supplier->name;
    }

    public function store() {
        return $this->belongsTo(Store::class);   
    }

    public function getStoreNameAttribute() {
        return $this->store->name;   
    }

}
