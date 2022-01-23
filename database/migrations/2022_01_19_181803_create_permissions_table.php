<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constained()->cascadeOnDelete()->cascadeOnUpdate();
            //User Permissions
            $table->boolean('create_user')->default(0);
            $table->boolean('view_user')->default(0);
            $table->boolean('edit_user')->default(0);
            $table->boolean('delete_user')->default(0);

            //Post Permissions
            $table->boolean('create_post')->default(0);
            $table->boolean('view_post')->default(0);
            $table->boolean('edit_post')->default(0);
            $table->boolean('delete_post')->default(0);

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
        Schema::dropIfExists('permissions');
    }
}
