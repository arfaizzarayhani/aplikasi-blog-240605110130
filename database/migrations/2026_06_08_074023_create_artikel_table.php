<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {

            $table->id();

            $table->foreignId('id_penulis');

            $table->foreignId('id_kategori');

            $table->string('judul');

            $table->text('isi');

            $table->string('foto')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};