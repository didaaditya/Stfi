<?php

namespace App\Models;

use App\Models\ExcelTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absen extends Model
{
    use HasFactory;
    public $fillable = [
        'id_excel_test','nama'
];
// tidak aktif
    public $timestamps = false;

   // membuat relasi one to many
   public function ExcelTest()
   {
       // data dari model 'Guru' bisa memiliki banyak data
       // dari model 'Siswa' melalui id_guru
       return $this->belongsTo(ExcelTest::class, 'id_excel_test');
   }
}
