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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat_ktp');
            $table->string('alamat_domisili');

            $table->unsignedInteger('prov_id'); 
            $table->foreign('prov_id')->references('prov_id')->on('provinces')->onDelete('cascade');
            //$table->foreignId('provinsi_id')->constrained('provinces');  // Links to Provinsi table
            $table->unsignedInteger('city_id'); 
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
            //$table->foreignId('kabupaten_id')->constrained('cities'); 
            $table->unsignedInteger('dis_id'); 
            $table->foreign('dis_id')->references('dis_id')->on('districts')->onDelete('cascade');
            //$table->foreignId('kecamatan_id')->constrained('districts');

            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->enum('kewarganegaraan', ['WNI Asli', 'WNI Keturunan', 'WNA']);
            $table->string('negara_asal')->nullable(); 
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('status_nikah', ['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)']);
            $table->enum('agama', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Lain-lain']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
