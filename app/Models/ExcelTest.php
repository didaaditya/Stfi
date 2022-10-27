<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelTest extends Model
{
    use HasFactory;
    public $fillable = [ 
        'foto','nama','tanggal_lahir','agama','alamat','jk','nik','pendidikan','id_absen',
]; 
    // tidak aktif
    public $timestamps = false;

     // membuat relasi one to many di model
     public function absen()
     {
         // data dari model 'Siswa' bisa dimiliki
         // oleh model 'Guru' melalui 'id_siswa'
         return $this->belongsTo(Absen::class, 'id_absen');
     }

       // Method menampilkan image (foto)
       public function image() 
    {
        if ($this->foto && file_exists(public_path('images/excel/' 
            . $this->foto))) {
            return asset('images/excel/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    // Menghapus image(foto) di storage(pemyimpanan) public
    public function deleteImage() {
        if ($this->foto && file_exists(public_path('images/excel/'
             . $this->foto))) {
            return unlink(public_path('images/excel/' . $this->foto));
        }
    }
}
