<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('state');
            $table->integer('customer_id');
            $table->integer('created_by');
            $table->string('token')->nullable();
            $table->integer('history_id')->nullable();
            $table->integer('edited_number')->default(0);
            $table->integer('edited_by')->nullable();
            $table->timestamps();
        });
        DB::update("ALTER TABLE quotations AUTO_INCREMENT = 6498;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
