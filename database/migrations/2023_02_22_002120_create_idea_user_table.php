<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_users', function (Blueprint $table) {
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('like')->default(0);

            // $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idea_user');
    }
};
