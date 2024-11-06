<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
     * Mendapatkan data mahasiswa untuk diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil semua data mahasiswa
        return Student::all();  // Anda bisa menambahkan kondisi lain sesuai kebutuhan
    }

    /**
     * Menambahkan heading pada file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',            // ID mahasiswa
            'Nis',          // Nama mahasiswa
            'Name',         // Email mahasiswa
            'Gender',        // Alamat mahasiswa       // Nomor telepon mahasiswa        // Alamat mahasiswa       // Nomor telepon mahasiswa
            'Rombel_id', // Tanggal Lahir // Tanggal bergabung
        ];
    }
}
