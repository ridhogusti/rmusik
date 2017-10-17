<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilrekomendasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hasilrekomdasi', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('reviewerid')->unsigned()->nullable()->default(11);
            
            $table->string('amazon_id', 100)->nullable()->default('text');
            
            $table->string('rekomend', 100)->nullable()->default('text');
            
            $table->integer('rating')->unsigned()->nullable()->default(12);
            
            $table->string('hasil', 100)->nullable()->default('text');
            
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
        Schema::dropIfExists('hasilrekomdasi');
        //
    }
}
