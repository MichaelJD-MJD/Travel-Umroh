<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id('galeri_id');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('url_gambar');
            $table->unsignedBigInteger('diupload_oleh');
            $table->timestamp('tanggal_upload')->useCurrent();
    
            $table->foreign('diupload_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
