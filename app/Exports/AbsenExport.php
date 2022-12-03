<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absen::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'nama',
            'tanggal_masuk',
            'jam_masuk',
            'jam_keluar',
            'jk',
            'rekap',
        ];
    }
}
