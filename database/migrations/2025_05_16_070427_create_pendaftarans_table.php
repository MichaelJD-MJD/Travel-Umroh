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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id('pendaftaran_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paket_id');
            $table->enum('status', ['Baru', 'Dikonfirmasi'])->default('Baru');
            $table->timestamp('tanggal_pendaftaran')->useCurrent();
            $table->timestamp('tanggal_dikonfirmasi')->nullable();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paket_id')->references('paket_id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
