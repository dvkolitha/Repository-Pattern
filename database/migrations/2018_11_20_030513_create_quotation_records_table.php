<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area');
            $table->integer('quotaion_id');
            $table->integer('product_category_id');
            $table->integer('product_id');
            $table->integer('cct_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('remark')->nullable();
            $table->boolean('is_edited')->nullable();
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
        Schema::dropIfExists('quotation_records');
    }
}
