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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
            //Tags Permissoins
            $table->boolean('create_tag')->default(0);
            $table->boolean('edit_tag')->default(0);
            $table->boolean('delete_tag')->default(0);
            //Ads Permissions
            $table->boolean('create_ads')->default(0);
            $table->boolean('view_ads')->default(0);
            $table->boolean('edit_ads')->default(0);
            $table->boolean('delete_ads')->default(0);
            //Slider Permissions
            $table->boolean('create_slider')->default(0);
            $table->boolean('view_slider')->default(0);
            $table->boolean('edit_slider')->default(0);
            $table->boolean('delete_slider')->default(0);

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
