<?php

namespace App\Http\Controllers;

use App\Imports\TrucksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TruckController extends Controller
{
    public function import(Request $request)
    {
        //dd('done');
        $request->validate([

            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $filename = $request->file('file')->getClientOriginalName();

        Excel::import(new TrucksImport($filename), $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }


    public function plan() {
      
        return view('planning.import');
    }
}
