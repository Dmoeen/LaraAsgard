<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductManagementProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmanagement__products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('product_id',20);
            $table->string('name',50);
            $table->double('price',10,2);
            $table->integer('tier');
            $table->integer('weight');
            $table->text('description');
            $table->string('photo',150);
            $table->integer('status');
            $table->integer('customizable');
            $table->integer('sequence');
            $table->integer('quantity');
            $table->integer('text');
            $table->integer('icing_id');
            $table->integer('category_id');

            // Your fields
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
        Schema::dropIfExists('productmanagement__products');
    }
}
