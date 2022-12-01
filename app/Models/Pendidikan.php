<?php

namespace App\Models;

use App\Model\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    public $fillable = [
        'id_user','pendidikan','tahun_masuk','tahun_lulus'
    ];
    public $timestamps = false;
    
       // membuat relasi one to many
       public function User()
       {
           // data dari model 'Guru' bisa memiliki banyak data
           // dari model 'Siswa' melalui id_guru
           return $this->belongsTo(User::class, 'Id_user');
       }
}
