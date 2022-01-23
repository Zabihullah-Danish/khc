<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhcModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khc_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->boolean('users')->default(0);
            $table->boolean('posts')->default(0);
            $table->boolean('tags')->default(0);
            $table->boolean('ads')->default(0);
            $table->boolean('slider')->default(0);
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
        Schema::dropIfExists('khc_models');
    }
}
