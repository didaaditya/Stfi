<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_tests', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('alamat');
            $table->string('wilayah')->nullable();
            $table->string('ayah');
            $table->string('ibu');
            $table->timestamps();
        });
    }

    /**  
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_tests');
    }
}
