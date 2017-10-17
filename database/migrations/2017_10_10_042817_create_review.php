<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned()->nullable()->default(11);
            
            $table->string('amazon_id', 100)->nullable()->default('text');
            
            $table->string('nama_user', 100)->nullable()->default('text');
            
            $table->integer('rating')->unsigned()->nullable()->default(12);
            
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
        //
        Schema::dropIfExists('review');
    }
}
