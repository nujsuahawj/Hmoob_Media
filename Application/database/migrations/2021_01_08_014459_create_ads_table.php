<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->integer('id');
            $table->text('home_1')->nullable();
            $table->text('home_2')->nullable();
            $table->text('download_1')->nullable();
            $table->text('download_2')->nullable();
            $table->text('download_3')->nullable();
            $table->text('blog_1')->nullable();
            $table->text('blog_2')->nullable();
            $table->text('blog_3')->nullable();
            $table->text('mobile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
