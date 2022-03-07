<?php

namespace App\Imports;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MemberImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return Member|null
     */
    public function model(array $row)
    {
        //dd($row);
        return new Member([
            'nama' => $row[1],
            'alamat' => $row[2],
            'jenis_kelamin' => $row[3],
            'tlp' => $row[4]
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}
