<?php

namespace App\Imports;

use App\Models\Asset;
use App\Models\Driver;
use Auth;
use Carbon\Carbon;
use App\Models\Route;
use App\Models\Plan;
use DB;
use App\Models\Plandetails;
use App\Models\Plandetailshistory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrucksImport implements ToCollection, WithHeadingRow
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {

     //   dd($row['sheet_ver_21'],$row,$rows[$index + 4]);

       $startDate = Carbon::parse($row['sheet_ver_21']);
       $endDate = Carbon::parse($row['sheet_ver_21']);

       $dates = [];

     $userId = Auth::user()->id;
    $product = $rows[$index + 4]['7'];
    $maxloads = $rows[$index + 4]['8'];
     $loadingNumber = $rows[$index + 4]['sheet_ver_21'];
    $clientname = $row['ovl_sheet_nr'];
  
   list($beforeTo, $afterTo) = explode('to', $this->filename, 2);

    // Trim whitespace from both parts
    $beforeTo = trim($beforeTo);
    $afterTo = trim($afterTo);

    // Remove text starting from '.' and after
    $afterTo = explode('.', $afterTo)[0];

    // dd($beforeTo,$afterTo);

   $route = Route::where('from',$beforeTo)->where('to', $afterTo)->first();
  // dd($route,$startDate,$clientname,$maxloads);
       
    $createplan = Plan::create([
        'date' => $startDate,
        'name' => $clientname,
        'enddate' => $endDate,
        'product' => $product,
        //'producttype' => $request->producttype,
        'maxloads' => $maxloads,
        'loadingNumber' => $loadingNumber,
        'routeId' => $route->id,
        'route' => $beforeTo .' to '. $afterTo ,
        'createdBy' => $userId
    ]);
              

        foreach ($rows as $index => $row) {
          
            if($index > 3){

               if($row['5'] != null){
         
                list($firstName, $secondName) = explode(' ', $row['5'], 2);

                // Capitalize both names
                $firstName = strtoupper($firstName);
                $secondName = strtoupper($secondName);

                $firstName = preg_replace('/"\s+|\s+"/', '"', trim($firstName));
                $secondName = preg_replace('/"\s+|\s+"/', '"', trim($secondName));


                $driver = DB::table('drivers')
                ->where('name', 'like', '%' . $firstName . '%')
                ->where('surname', 'like', '%' . $secondName . '%')
                ->first();

              if(!$driver){
                
                  $driver = Driver::create([

                    'name' => $firstName,
                    'surname' => $secondName,
                
                  ]);
              }

             // dd($row,$startDate,$createplan->id,$row['ovl_sheet_nr'],$maxloads,$row['5'],$driver);

                $companyrole = Plandetails::create([

                    'plan_id' => $createplan->id,
                    'route' => $beforeTo .' to '. $afterTo ,
                    'routeId' => $route->id,
                    'date' => $startDate,
                    'truck' =>  $row['ovl_sheet_nr'],
                    'trips'  => $maxloads, 
                    'driver_id'  => $driver->id,
                    'createdBy' => $userId
                    
                ]);


                $companyroles  = Plandetailshistory::create([

                    'plan_id' => $createplan->id,
                    'plandetails_id' =>  $companyrole->id,
                    'route' => $beforeTo .' to '. $afterTo ,
                    'routeId' => $route->id,
                    'date' => $startDate,
                    'truck' =>  $row['ovl_sheet_nr'],
                    'trips'  => $maxloads, 
                    'driver_id'  => $driver->id,
                    'createdBy' => $userId
                    
                ]);

             }

            }
                
        }

        break;
       

     }


    }
}
