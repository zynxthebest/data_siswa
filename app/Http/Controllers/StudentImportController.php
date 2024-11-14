<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rombel;

class StudentImportController extends Controller
{
    /**
     * Menampilkan form upload file Excel
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('students.import');
    }

    /**
     * Memproses file Excel yang diupload dan mengimpor data mahasiswa
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);


        // Mengimpor data mahasiswa dari file Excel
        Excel::import(new StudentImport, $request->file('file'));

        // Mengarahkan kembali dengan pesan sukses
        return back()->with('success', 'Data mahasiswa berhasil diimpor!');
    }
}
