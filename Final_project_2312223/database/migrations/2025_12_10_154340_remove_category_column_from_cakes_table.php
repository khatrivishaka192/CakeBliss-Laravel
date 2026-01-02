<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cakes', function (Blueprint $table) {
            $table->dropColumn('category');  // REMOVE OLD COLUMN
        });
    }

    public function down()
    {
        Schema::table('cakes', function (Blueprint $table) {
            $table->string('category')->nullable(); // REVERSE IF NEEDED
        });
    }
};
