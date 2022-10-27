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
            'nik',
            'tanggal_lahir',
            'agama',
            'jk',
            'pendidikan',
            'alamat',
        ];
    }
}
