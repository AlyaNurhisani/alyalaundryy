<?php

namespace App\Imports;

use App\Models\paket_cucian;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PaketImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return paket_cucian|null
     */
    public function model(array $row)
    {
        //dd($row);
        return new paket_cucian([
            'id_outlet' => auth()->user()->id_outlet,
            'nama_paket' => $row[3],
            'jenis' => $row[2],
            'harga' => $row[4]
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}
