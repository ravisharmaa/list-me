<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            // to which supplier shall I send this cart
            $table->unsignedBigInteger('supplier_id')->nullable();

            $table->foreign('supplier_id')->references('id')->on('suppliers')
                     ->onDeleteCascade()
                    ->onUpdateCascade();
            
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDeleteCascade()
                    ->onUpdateCascade();

            // to which store shall I nominate the cart to.
            $table->unsignedBigInteger('store_id');

            $table->foreign('store_id')->references('id')->on('stores')
                   ->onDeleteCascade()
                   ->onUpdateCascade();


            $table->timestamp('completed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
