<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->before('name');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /** Reverse the migrations.*/
  public function down(): void{Schema::dropIfExists('contacts');}
};
