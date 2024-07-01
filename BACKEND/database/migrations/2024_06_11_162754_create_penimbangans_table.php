<?php

use App\Models\data_balita;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     */
    public function up(): void
    {
        if (!Schema::hasTable('penimbangans')) {
            Schema::create('penimbangans', function (Blueprint $table) {
                $table->id();
                // $table->foreignId('data_balita_id')->constrained('data_balitas');
                $table->foreignId('data_balita_id')->constrained('data_balitas')->onDelete('cascade');
                //$table->unsignedBigInteger('data_balita');
                //$table->foreignId('data_balita_id')->constrained('data_balita')->onDelete('cascade'); // Asumsi ada tabel data_balita
                $table->date('tanggal_penimbangan');
                $table->integer('usia');
                $table->double('berat_badan', 5, 2);
                $table->double('tinggi_badan', 5, 2);
                $table->double('lingkar_lengan', 5, 2);
                $table->double('lingkar_kepala', 5, 2)->nullable();

                //$table->foreignId('data_balita_id')->index()->constanted();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('penimbangans');
    }
};
