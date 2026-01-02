<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // regular, customized, wedding
            $table->decimal('price', 8, 2);
            $table->string('image'); // path to image
            $table->text('description')->nullable();
            $table->text('ingredients')->nullable();
            $table->timestamps();
            $table->softDeletes();



        });
    }

    public function down(): void {
        Schema::dropIfExists('cakes');
    }
};
