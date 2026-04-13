<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportAlumniController extends Controller
{
    public function index()
    {
        return view('alumni.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new AlumniImport, $request->file('file_excel'));

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diimport.');
    }
}
