<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
            return new Student([
            'nis'      => $row['nis'],  // Kolom NIS
            'name'     => $row['name'], // Kolom Name
            'gender'   => $row['gender'],  // Kolom Gender ('B' atau 'G')
            'rombel_id'=> $row['rombel_id'],  // Kolom Rombel ID
        ]);
    }
}
