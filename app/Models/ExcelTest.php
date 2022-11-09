<?php

namespace App\Models;

use App\Models\Absen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExcelTest extends Model
{
    use HasFactory;
    public $fillable = [
        'foto','nama','tempat_lahir','tanggal_lahir','jk','agama','kewarganegaraan','alamat','wilayah','ayah','ibu'
];
    // tidak aktif
    public $timestamps = false;

     // membuat relasi one to many di model
     public function absen()
     {
         // data dari model 'Siswa' bisa dimiliki
         // oleh model 'Guru' melalui 'id_siswa'
         return $this->hasMany(Absen::class, 'id_excel_test');
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
