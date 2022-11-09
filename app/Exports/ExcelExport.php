<?php

namespace App\Exports;

use App\Models\ExcelTest;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelTest::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'foto',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jk',
            'agama',
            'kewarganegaraan',
            'alamat',
            'wilayah',
            'ayah',
            'ibu',
        ];
    }
}
