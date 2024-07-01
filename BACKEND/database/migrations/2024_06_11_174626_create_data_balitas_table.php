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
        if (!Schema::hasTable('data_balitas')) {
            Schema::create('data_balitas', function (Blueprint $table) {
                $table->id();
                $table->string('nama'); 
                $table->string('NIK anak');
                $table->date('tanggal_lahir'); 
                $table->enum('jenis_kelamin', ['L', 'P']); 
                $table->string('nama_ayah'); 
                $table->string('nama_ibu');
                $table->unsignedBigInteger('id_data_orangtua');
                $table->foreign('id_data_orangtua')->references('id')->on('data_orangtua')->onDelete('cascade');
                // $table->foreignId('id_data_orangtua')->constrained('data_orangtua')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_balitas');
    }
};
