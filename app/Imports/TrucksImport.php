<?php

namespace App\Imports;

use App\Models\Asset;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrucksImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

     // dd($row);
            $reg =  $result = str_replace(' ', '', $row['registration']); 

            $asset = Asset::where('registration', $reg)->first();

            if($asset){

                $assetupdate = Asset::where('registration', $reg)->update([

                    'regNumber1' => $row['registration1'],
                    'regNumber2' => $row['registration2'],
                ]);
            }
          
        }
    }
}
