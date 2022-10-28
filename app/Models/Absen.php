<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    public $fillable = [ 
        'nama', 'id_excel_test',
]; 
// tidak aktif
    public $timestamps = false;

   // membuat relasi one to many
   public function ExcelTest()
   {
       // data dari model 'Guru' bisa memiliki banyak data
       // dari model 'Siswa' melalui id_guru
       return $this->hasMany(ExcelTest::class, 'id_excel_test');
   }
}
