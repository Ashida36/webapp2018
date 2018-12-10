<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemsDetail',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('items_id');
            $table->string('name');//商品名
            $table->string('type');//種類
            $table->unsignedInteger('price');//商品の価格
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_detail');
        Schema::table('itemsDetail', function (Blueprint $table) {
            $table->dropForeign('itemsDetail_items_id_foreign');
        });
    }
}
