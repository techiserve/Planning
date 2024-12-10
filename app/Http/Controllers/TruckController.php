<?php

namespace App\Http\Controllers;

use App\Imports\TrucksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TruckController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TrucksImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
