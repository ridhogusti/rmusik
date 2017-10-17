<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetadata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('metadata', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('amazon_id', 100)->nullable()->default('text');
            
            $table->string('title', 100)->nullable()->default('text');
            
            $table->string('artist', 100)->nullable()->default('text');
            
            $table->string('root_genre', 100)->nullable()->default('text');
            
            $table->string('label', 100)->nullable()->default('text');
            
            $table->string('first_release_year', 100)->nullable()->default('text');
            
            $table->string('imUrl', 100)->nullable()->default('text');
            
            $table->string('rate', 100)->nullable()->default('text');
            
            $table->string('view', 100)->nullable()->default('text');
            
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
        Schema::dropIfExists('metadata');
    }
}
