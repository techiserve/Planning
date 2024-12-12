<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Routeasset;
use App\Models\Contract;
use App\Models\Driver;
use App\Models\Routecapacity;
use App\Models\Formula;
use App\Models\Contractasset;
use App\Models\Contractplan;
use App\Models\Routeplan;
use App\Models\Monthlyforecast;
use App\Models\Capability;
use App\Models\Planassets;
use App\Models\Planroutes;
use App\Models\Plandrivers;
use App\Models\Plan;
use App\Models\Plandetails;
use App\Models\Plandetailshistory;
use App\Models\Plancontract;
use App\Models\Assetdriver;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Escalationformula;
use App\Models\Route;
use Carbon\Carbon;
use Auth;
use DB;
use App\Models\Routeratetracker;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /**
     * Display a listing of the resource.
     */
    public function contractplan()
    {
         dd( ini_get('max_input_vars'));
        
        $contracts = Contract::all();

        return view('planning.contractplan', compact('contracts'));
    }


    public function planindex()
    {
        
        $plans = Plan::all();

      //  dd($plans);

        return view('plan.planindex', compact('plans'));

    }


    public function showcontractplan($id)
    {
        $user = auth()->user();

        //Monthly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $forecastmonthcapacity = Route::where('contractId', $id)->sum('estimatedmonthQuantity');
        $contractroutes = Routeasset::where('contract', $id)->get();

        $availablemonthcapacity = 0;
        $assets = [];

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
            $assetRecord = Asset::where('id', '=', $routes->asset)->where('resourcePoolStatus' , '=', null)->first();
         //   dd($assetRecord);

            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;

            }else{

                return back()->with('error', 'There are no resource to use, adjust your assigments for this Contract'); 
            }
          
           
        }

       // dd($assets);

        //compare forecast vs current plan 
        if($availablemonthcapacity > $forecastmonthcapacity){

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Contractplan::create([

                'duration' => 1,
                'contract' => $id,
                'capacity' => $forecastmonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,
                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }
             

                }
               
                dd($asset);

            }

            //produce plan to fit the forecastmonthcapacity


            //get all resources that are assigned to contract but still in resource pool

        }else{

            //produce plan for the available capacity 
            $currentCapacity = 0;
            $contractplancreate = Contractplan::create([

                'duration' => 1,
                'contract' => $id,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);

            foreach($assets as $asset){

                if($currentCapacity <= $availablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make,
                        'assetId'     => $asset->id,  
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updateasset = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        
            

          //search out for additional resources 
           $neededadditionalcapacity = $forecastmonthcapacity - $currentCapacity;
         $newavailablemonthcapacity = 0;
         $newassets = [];

         foreach($contractroutes as $routes){

            $assetRecord = Asset::where('id', '=', $routes->asset )->where('resourcePoolStatus' , '=', null)->first();
           // dd($assetRecord);
           if($assetRecord != null){

            $newassets[] = $assetRecord;
            $newavailablemonthcapacity += $assetRecord->payloadCapacity;
            $checkrecords = 1;
           }else{
            $checkrecords = 0;
           }

        }

        if($checkrecords == 1){
     
        if($newavailablemonthcapacity > 0){
     
            //adding additional resource pool assets and drivers to the plan
            foreach($newassets as $asset){

                if($neededadditionalcapacity <= $newavailablemonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'contractplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'resourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::create([

                            'contractplanId' => $contractplancreate->id,
                            'name'            =>$plandriver->name, 
                            'driverId'            =>$plandriver->id, 
                            'surname'         =>$plandriver->surname, 
                            'group'           =>$plandriver->group, 
                            'gender'          =>$plandriver->gender, 
                            'routeType'       =>$plandriver->routeType, 
                            'licenseNumber'    =>$plandriver->licenseNumber,    
                            'statusReason'     =>$plandriver->statusReason,     
                            'vehicleType'      =>$plandriver->vehicleType, 
                            'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                            'createdBy'      => $user->name,

                        ]);

                        
                    $updatedriver = Driver::where('id','=', $driver->id )->update([
                        
                        'resourcePoolStatus' => '1',
                    ]);

                    }

                }             

            }        

        }
        }

        }

        dd('zvaita....');



        //output final plan 
    

        return view('planning.showmonthlycontractplan', compact('contracts'));
    }


    public function routeplan()
    {
        $user = auth()->user();
        $routes = Route::all();
        $contracts = Contract::all();

        foreach($routes as $route){

          
            $date = Carbon::now();
            $forecast = Monthlyforecast::where('route', '=' , $route->id)->where('month', '=', $date->format('F'))->first();

            if( $forecast == null){

                $forecastValue = 0;
            }else{
                $forecastValue = $forecast->forecastValue; 
            }
          //  dd($forecast);

            $contractroutes = Routeasset::where('route', $route->id)->get();

            $availablemonthcapacity = 0;
     
            //Get monthly current capacity
            foreach($contractroutes as $routes){
                
                $assetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', 1)->first();
          
                if($assetRecord != null){ 
                 
                    $availablemonthcapacity += $assetRecord->payloadCapacity;            
    
                }
                       
            }


            $routecheck = Routecapacity::where('route', $route->id)->count();

            if($routecheck > 0){

                $routecapacity = Routecapacity::where('route' , $route->id)->update([
                 
                    'contractVolume'    => $route->totalQuantity,
                    'totalforecast'     => $route->estimatedmonthQuantity,
                    'monthlyforecast'   => $forecastValue,
                    'capacity'          => $availablemonthcapacity,
                    'updatedBy'         => $user->name,
    
                ]);

            }else{

                $routecapacity = Routecapacity::create([

                    'route'             => $route->id,
                    'contractVolume'    => $route->totalQuantity,
                    'totalforecast'     => $route->estimatedmonthQuantity,
                    'monthlyforecast'   => $forecastValue,
                    'capacity'          => $availablemonthcapacity,
                    'createdBy'         => $user->name,
    
                ]);
            }

        }


        $allroutes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->get();
        
     //   dd($allroutes);

        return view('planning.routeplan', compact('allroutes','contracts'));
    }

    public function showrouteplan($id)
    {
   
        $user = auth()->user();

        //Monthly Horizon being planned for
       // dd($id);
        //Get the forecast monthly plan/capacity
        $date = Carbon::now();
        $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
       
        if($threemonthcheck > 0){

            $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
            $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;

        }else{

            $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        }

    

        $contractroutes = Routeasset::where('route', $id)->get();
        $contractroutescount = Routeasset::where('route', $id)->count();

       // dd($contractroutes);
        $availablemonthcapacity = 0;
        $assets = [];
        

        if($contractroutescount  == 0){
            
            return back()->with('error', 'This route needs asset assignments to be made first!'); 
        }

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
            $assetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', 1)->first();
      
            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;
                $activity = 1;

            }else{
                
                $activity = 0;
                continue;
            }
     
           
        }

       // dd($availablemonthcapacity);

        //compare forecast vs current plan 

            $forecastmonthcapacity;
            $currentCapacity = 0;

            $contractplancreate = Routeplan::create([

                'duration' => 1,
                'route' => $id,
                'activity' => $activity,
                'capacity' => $availablemonthcapacity,
                'createdBy' =>  $user->name

            ]);


            foreach($assets as $asset){

              //  dd($asset);

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::create([

                        'routeplanId' => $contractplancreate->id,
                        'make'     => $asset->make, 
                        'assetId'     => $asset->id, 
                        'registration'    =>$asset->registration, 
                        'assetDescription'    =>$asset->assetDescription, 
                        'vinNumber'    =>$asset->vinNumber, 
                        'assetType'    =>$asset->assetType, 
                        'weight'     => $asset->weight,    
                        'statusReason'    => $asset->statusReason,     
                        'licenseNumber'    => $asset->licenseNumber, 
                        'payloadCapacity'    => $asset->payloadCapacity,  
                        'mileage'      => $asset->mileage, 
                        'fueltype'     => $asset->fueltype,            
                        'truckType'      => $asset->truckType,
                        'trailerType'    => $asset->trailerType,
                        'model'           => $asset->model,
                        'registrationYear'    => $asset->registrationYear,
                        'engineCapacity'    => $asset->engineCapacity,
                        'expectedFuelConsumption'    => $asset->expectedFuelConsumption,
                        'gearType'    => $asset->gearType,     
                        'registrationExpireDate'    => $asset->registrationExpireDate, 
                        'createdBy' => $user->name,

                    ]);


                    $updateasset = Asset::where('id','=', $asset->id )->update([

                        'routeresourcePoolStatus' => '1',
                    ]);

                    $driversIds = Assetdriver::where('asset', '=' , $asset->id)->get();
                  //  dd($driversIds);
                    foreach($driversIds as $driver){
                      //  dd($driver);
                        $plandriver = Driver::where('id', '=', $driver->driver)->where('status', '=', '1')->first();
          
                        if($plandriver){

                            $plandrivercreate = Plandrivers::create([

                                'routeplanId' => $contractplancreate->id,
                                'name'            =>$plandriver->name, 
                                'driverId'         =>$plandriver->id, 
                                'surname'         =>$plandriver->surname, 
                                'group'           =>$plandriver->group, 
                                'gender'          =>$plandriver->gender, 
                                'routeType'       =>$plandriver->routeType, 
                                'licenseNumber'    =>$plandriver->licenseNumber,    
                                'statusReason'     =>$plandriver->statusReason,     
                                'vehicleType'      =>$plandriver->vehicleType, 
                                'licenseExpireDate'    =>$plandriver->licenseExpireDate,                          
                                'createdBy'      => $user->name,
                            ]);
    
                            
                        $updatedriver = Driver::where('id','=', $driver->id )->update([
                            
                            'routeresourcePoolStatus' => '1',
                        ]);

                        }
                                           
                    }
             
                }
               
               // dd($asset);

            }

            //produce plan to fit the forecastmonthcapacity

            $unavailableassets = [];
            $unavailabledrivers = [];
            //get all resources that are assigned to contract but still in resource pool
            foreach($contractroutes as $routes){
               
                $unassetRecord = Asset::where('id', '=', $routes->asset)->where('status' , '=', '2')->first();
          
                if($unassetRecord != null){
    
                    $unavailableassets[] = $unassetRecord;
            
                }
                          
            }

          //  dd($unavailableassets);

            foreach($unavailableassets as $unasset){

           // dd($unasset);
            $driverss = Assetdriver::where('asset', '=' , $unasset->id)->get();
            //  dd($driverss);
              foreach($driverss as $driver){
       
                  $unplandriver = Driver::where('id', '=', $driver->driver)->where('status', '=', '2')->first();
    
                  if($unplandriver){
       
                    $unavailabledrivers[] = $unplandriver;

                    }
                }

            }

          //  dd($unavailabledrivers, $unavailableassets);

    

     
        $title = 'Remove item!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $routeplan = Routeplan::where('id', '=' ,  $contractplancreate->id)->first();
       // dd($routeplan);
       $routecapcheck = Routecapacity::where('route', '=' , $routeplan->route)->count();
      // dd($routecapcheck);

    
       if($routecapcheck > 0){

        $routecapcheck = Routecapacity::where('route', '=' , $routeplan->route)->update([

            'capacity' => $availablemonthcapacity

        ]);

        $routes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->where('routes.id','=',  $routeplan->route)
        ->get();

       }else{

        $routes = DB::table('routes')
        ->join('routecapacities','routecapacities.route','=','routes.id')
        ->where('routes.id','=',  $routeplan->route)
        ->get();

       }
        
      
        
        $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
        $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();

        // $assetdrivers = [];

        // foreach( $routeplanassets as $assets){

        //    $assetcount = Assetdriver::where('asset', $assets->assetId)->count();
        //    $asset = Assetdriver::where('asset', $assets->assetId)->first();
        //    if($assetcount > 0 ){

        //     $assetdrivers[] =  $asset;
        //    }


        // }
        // dd($combinedresources);

        return view('planning.showmonthlyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers','unavailableassets','unavailabledrivers'));
    }

    public function showrouteplanweekly($id)
    {
        //dd($id);
        $user = auth()->user();

        $routeplanId = Routeplan::where('route','=', $id)->where('activity','=', '1')->latest()->first();
       // dd($routeplanId);
        //Weekly Horizon being planned for

        //Get the forecast monthly plan/capacity
        $date = Carbon::now();
        $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
       
        if($threemonthcheck > 0){

            $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
            $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;


        }else{

            $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
        }
        $forecastmonthcapacity = $forecastmonthcapacity/4;
       // dd($forecastmonthcapacity);
        $contractroutes = Planassets::where('routeplanId', $routeplanId->id)->get();

        $availablemonthcapacity = 0;
        $assets = [];

        //Get monthly current capacity
        foreach($contractroutes as $routes){
            
        $assetRecord = Planassets::where('assetId', '=', $routes->assetId)->where('routeplanId','=', $routeplanId->id)->first();
         //   dd($assetRecord);

            if($assetRecord != null){

                $assets[] = $assetRecord;
                $availablemonthcapacity += $assetRecord->payloadCapacity;

            }else{
                
                return back()->with('error', 'There are no resources to use, adjust your assigments for this Route'); 
            }
          
           
        }

            $forecastmonthcapacity;
            $currentCapacity = 0;

            foreach($assets as $asset){

                if($currentCapacity <= $forecastmonthcapacity){

                    $currentCapacity += $asset->payloadCapacity;

                    $planassetcreate = Planassets::where('id','=', $asset->id)->update([

                        'weekly' => 1,                      
                        'updatedBy' => $user->name,

                    ]);


                    $driversIds = Assetdriver::where('asset', '=' , $asset->assetId)->get();

                    foreach($driversIds as $driver){

                        $plandriver = Driver::where('id', '=', $driver->id)->first();
                        
                        $plandrivercreate = Plandrivers::where('driverId','=', $plandriver->id )->where('routeplanId','=', $routeplanId->id)->update([

                        'weekly' => 1,                      
                        'updatedBy' => $user->name,

                        ]);
                             
                    }
             
                }             

            }

            $title = 'Remove item!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            $routeplan = $routeplanId;
            $routes = DB::table('routes')
            ->join('routecapacities','routecapacities.route','=','routes.id')
            ->where('routes.id','=',  $routeplan->route)
            ->get();
            $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
            $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();

        //    dd($routeplan,$routeplanassets,$routeplandrivers);
        return view('planning.showweeklyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers'));
    }


    public function showrouteplandaily($id)
    {
       //dd($id);
       $user = auth()->user();

       $routeplanId = Routeplan::where('route','=', $id)->where('activity','=', '1')->latest()->first();
       //Weekly Horizon being planned for

       //Get the forecast monthly plan/capacity
       $date = Carbon::now();
       $threemonthcheck  = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->count();
      
       if($threemonthcheck > 0){

           $monthlyforecastcheck = Monthlyforecast::where('route', $id)->where('month', '=', $date->format('F') )->latest()->first();
           $forecastmonthcapacity =   $monthlyforecastcheck->forecastValue;


       }else{

           $forecastmonthcapacity = Route::where('id', $id)->sum('estimatedmonthQuantity');
       }
       $forecastmonthcapacity = $forecastmonthcapacity/30;
     //  dd($forecastmonthcapacity);
       $contractroutes = Planassets::where('routeplanId', $routeplanId->id)->get();

       $availablemonthcapacity = 0;
       $assets = [];

       //Get monthly current capacity
       foreach($contractroutes as $routes){
           
       $assetRecord = Planassets::where('assetId', '=', $routes->assetId)->where('routeplanId','=', $routeplanId->id)->first();
        //   dd($assetRecord);

           if($assetRecord != null){

               $assets[] = $assetRecord;
               $availablemonthcapacity += $assetRecord->payloadCapacity;

           }else{
               
               return back()->with('error', 'There are no resource to use, adjust your assigments for this Route'); 
           }
         
          
       }


           $forecastmonthcapacity;
           $currentCapacity = 0;

           foreach($assets as $asset){

               if($currentCapacity <= $forecastmonthcapacity){

                   $currentCapacity += $asset->payloadCapacity;

                   $planassetcreate = Planassets::where('id','=', $asset->id)->update([

                       'daily' => 1,                      
                       'updatedBy' => $user->name,

                   ]);


                   $driversIds = Assetdriver::where('asset', '=' , $asset->assetId)->get();

                   foreach($driversIds as $driver){

                       $plandriver = Driver::where('id', '=', $driver->id)->first();
                       
                       $plandrivercreate = Plandrivers::where('driverId','=', $plandriver->id )->where('routeplanId','=', $routeplanId->id)->update([

                       'daily' => 1,                      
                       'updatedBy' => $user->name,

                       ]);
                            
                   }
            

               }
              
               //dd($asset);

           }

           //produce plan to fit the forecastmonthcapacity
           $title = 'Remove item!';
           $text = "Are you sure you want to delete?";
           confirmDelete($title, $text);

           //get all resources that are assigned to contract but still in resource pool

           $routeplan = $routeplanId;

           $routes = DB::table('routes')
           ->join('routecapacities','routecapacities.route','=','routes.id')
           ->where('routes.id','=',  $routeplan->route)
           ->get();

           $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->get();
           $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->get();
   

       return view('planning.showdailyrouteplan', compact('routeplan','routes','routeplanassets','routeplandrivers'));
    }


    public function editroutemonthlyplandriver($id){


    $plandriver = Plandrivers::where('id', $id)->first();

    $actualdriver = Driver::where('id', $plandriver->driverId)->update([

        'status' => '2'
    ]);

    if($plandriver){

        return back()->with('success', 'Driver removed from plan successfully!'); 

    }else{

        return back()->with('error', 'Failed to remove driver!'); 
    }
    
    }


    public function editroutemonthlyplanasset($id){

        $plandriver = Planassets::where('id', $id)->first();

        $actualAsset= Asset::where('id', $plandriver->assetId)->update([

            'status' => '2'
        ]);
    
        if($plandriver){
    
            return back()->with('success', 'Asset removed from plan successfully!'); 
    
        }else{
    
            return back()->with('error', 'Failed to remove Asset!'); 
        }
        
        }


        public function reassignroutemonthlyplanasset($id){

           
            $asset = Planassets::where('assetId', $id)->latest()->first();
            $contracts = Contract::all();
            $routes = Route::all();
       
            return view('planning.reassignasset', compact('asset','contracts','routes'));
            
        }



            public function reassignasset(Request $request,$id){
          

               $asset = Routeasset::where('asset', $id)->update([

                'route' => $request->route,

               ]);

             $routeplan = Routeplan::where('id', $request->routeplan)->first();
         
             return redirect()->route('planning.showrouteplan', [$routeplan->route])->with('success', 'Asset created re-assigned!');
                
           }



        public function confirmplan($id){

           $routeplan = Routeplan::where('id', $id)->first(); 

           $routeplanUpdate = Routeplan::where('id', $id)->update([

            'confirmation' => '1'

           ]); 

           $routeplanassetUpdate = Planassets::where('routeplanId', $routeplan->id)->where('daily','=' , '1')->update([

             'confirmation' => '1'

           ]); 

           $routeplandriverUpdate = Plandrivers::where('routeplanId', $routeplan->id)->where('daily','=' , '1')->update([
            
            'confirmation' => '1'
            
           ]); 


             if($routeplanassetUpdate && $routeplandriverUpdate){

                $routes = Route::where('id', '=' , $routeplan->route)->get();
                $routeplanassets = Planassets::where('routeplanId','=', $routeplan->id)->where('daily','=' , '1')->where('confirmation','=' , '1')->get();
                $routeplandrivers = Plandrivers::where('routeplanId','=', $routeplan->id)->where('daily','=' , '1')->where('confirmation','=' , '1')->get();

               }else{

                return back()->with('error', 'Failed to confrim plan!'); 
               }

               return view('planning.dailyrouteschedule', compact('routeplan','routes','routeplanassets','routeplandrivers'));        
            
            }

            public function allroutes()
            {
                 $routes = Route::all();
                 $drivers = Driver::all();

                //  $dates = [];
                //  // Loop to generate the next 7 days including today
                //  for ($i = 0; $i <= 6; $i++) {
                //      $dates[] = Carbon::now()->addDays($i)->format('Y-m-d'); // Format the date as you need (e.g., 'Y-m-d')
                //  }

                $dates = [];
                for ($i = 0; $i < 8; $i++) {
                    $date = now()->addDays($i)->format('Y-m-d');
                    $dates[] = $date;
                }
                   $routesWithDates = $routes;

                //  $routesWithDates = [];
                //  foreach ($routes as $route) {
                //      // Add the dates array as a property of each route
                //      $route->dates = $dates;
                //      $routesWithDates[] = $route;
                //  }


                 return view('plan.route', compact('routesWithDates','dates','drivers'));
            }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateplan(Request $request)
    {
   
        $userId = Auth::user()->id;

            $plan_ids = $request->input('plan_ids');
          //  $nooftrips = $request->input('nooftrips');
            //$shifts = $request->input('shifts');
            $times = $request->input('times');
            $routes = $request->input('routes');
            $trips = $request->input('trips');


                foreach($plan_ids as $key => $n ) {

                  //  dd( $truck_ids[$key],$nooftrips[$key]);

                    $route = Route::where('id', $routes[$key])->first();
                    $currentplan = Plandetails::where('id',  $plan_ids[$key])->first();
                    $prevplan = Plandetails::where('date',  $currentplan->date)->where('routeId', $routes[$key])->first();

                    if(!$prevplan){
                         
                        return redirect()->route('plan.changeassignment')->with('warning', 'You selected a route that has no plan!');

                    }
                    //dd($currentplan,$prevplan,$currentplan->date,$routes[$key],$route);

                    $arrData[] = array(

                        $change = Plandetails::where('id',  $plan_ids[$key])->update([  


                            'plan_id'  => $prevplan->plan_id,
                            'route' => $route->from .' to '. $route->to ,
                            'routeId' =>  $routes[$key],
                            //'trips'  => $nooftrips[$key],
                            'trips'  => $trips[$key],
                            'time'  => $times[$key],
                            'updatedBy' => $userId
                            
                        ]),

                        $companyrole = Plandetailshistory::create([

                            'plan_id' => $currentplan->plan_id,
                            'plandetails_id' =>  $currentplan->id,
                            'route' => $route->from .' to '. $route->to,
                            'routeId' => $routes[$key],
                            'date' => $currentplan->date,
                            'truck' =>  $currentplan->truck,
                            'trips'  => $trips[$key],
                            'shift'  => $currentplan->shift,
                            'time'  => $times[$key],
                            'createdBy' => $userId
                            
                        ])
                    );

                }

                
     
                if($change){

                    return redirect()->route('plan.changeassignment')->with('success', 'Plan changed successfully!');
                }
                  return redirect()->route('plan.changeassignment')->with('error', 'Failed to change Plan!');
          
    }



    public function planupdate(Request $request, $id)
    {
    
   
        $startDate = Carbon::parse($request->date);
        $endDate = Carbon::parse($request->enddate);
          
        $dates = [];

        if ($startDate->eq($endDate)) {
            // If start and end dates are the same, add only one date to the array
            $dates[] = $startDate->format('Y-m-d');
        } else {
            
            $currentDate = $startDate->copy();
            while ($currentDate->lte($endDate)) {
                $dates[] = $currentDate->format('Y-m-d'); // Add each date to the array
                $currentDate->addDay(); // Increment by one day
            }
        }



    $userId = Auth::user()->id;

    $getroute = Route::where('id', $request->route)->first();

    $createplan = Plan::where('id', $id)->update([

        'date' => $request->date,
        'name' => $request->clientname,
        'enddate' => $request->enddate,
        'product' => $request->product,
        'maxloads' => $request->maxloads,
        'loadingNumber' => $request->loadingNumber,
        'routeId' => $request->route,
        'route' => $getroute->from .' to '. $getroute->to ,

    ]);

 
    $delete  = Plandetails::where('plan_id',$id)->delete();

    foreach ($dates as $date) {

        $truck_ids = $request->input('truck_ids');
        $nooftrips = $request->input('nooftrips');
        $driver = $request->input('driver');
       // $shifts = $request->input('shifts');
        $times = $request->input('times');
        $status = $request->input('status');

         if($truck_ids){

            foreach($truck_ids as $key => $n ) {
              //  dd($n);

                $truck = Asset::where('licenseNumber', $n)->first();

                $arrData[] = array(

                    $companyrole = Plandetails::create([

                        'plan_id' => $id,
                        'route' => $getroute->from .' to '. $getroute->to ,
                        'routeId' => $request->route,
                        'date' => $date,
                        'truck' =>  $truck->licenseNumber,
                        'trips'  => $nooftrips[$key], 
                        'time'  => $times[$key],
                        'driver_id'  => $driver[$key],
                        'createdBy' => $userId
                        
                    ]),

                    
                $truckupdate = Asset::where('licenseNumber', $n)->update([

                    'status'  => 1,
                ]),


                    $companyroles = Plandetailshistory::create([

                        'plan_id' => $id,
                        'plandetails_id' =>  $companyrole->id,
                        'route' => $getroute->from .' to '. $getroute->to ,
                        'routeId' => $request->route,
                        'date' => $date,
                        'truck' =>  $truck->licenseNumber,
                        //'truck_id' => $truck_ids[$key],
                        'trips'  => $nooftrips[$key],
                        'time'  => $times[$key],
                        'driver_id'  => $driver[$key],
                        'createdBy' => $userId
                        
                    ])
                );

            }

        }

        }
               
     
                if($createplan){

                    return back()->with('success', 'Plan updated successfully!');
                }
                  return back()->with('error', 'Failed to update Plan!');
          
    }

    /**
     * Display the specified resource.
     */
    public function dates(Request $request)
    {
        $route = Route::where('id', $request->route_id)->first();

        $searchplan = Plan::where('name', $request->clientname)->where('route', $route->from .' to '. $route->to)->where('date', $request->date)->where('enddate', $request->enddate)->where('product',$request->product)->first();

       if($searchplan){

        return back()->with('warning', 'Plan with that route and date already exists!');

       }

        $enddates = $request->input('enddate');
        $enddate = Carbon::parse($enddates);
        $time = $request->time;
        $loading = $request->loading;
        $product = $request->product;
        $maxloads = $request->maxloads;
        $clientname = $request->clientname;
        $producttype = $request->producttype;

        
        $dateString = $request->input('date'); 
        $date = Carbon::parse($dateString);
        $drivers = Driver::all();

        $dates= $dateString;

        $trucks = Asset::with('drivers')->leftJoin('plandetails', function($join) use ($dates) {
            $join->on('assets.licenseNumber', '=', 'plandetails.truck')
                 ->where('plandetails.date', '=', $dates);
        })
        ->whereNull('plandetails.id') // Filter out those with assignments
        ->select('assets.*') // Select all columns from assets
        ->get();

        $drivers = Driver::all();

        foreach($drivers as $driver){


          //  dd($driver->licenseNumber.$driver->id);
 
            $createcode = Driver::where('id', $driver->id)->update([

                'checkcode' => $driver->licenseNumber.$driver->id,
            ]); 
        }
     
        return view('plan.viewplan', compact('route','date','trucks','drivers','enddate','time','loading','product','maxloads','clientname','producttype'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editplan(string $id)
    {

        $plan = Plan::where('id',$id)->first();
        $details = Plandetails::where('plan_id', $id)->groupBy('truck')->get();
        $drivers = Driver::all();
        $routes = Route::all();

        return view('plan.editplan', compact('details','plan','drivers','routes'));
    }

    public function filter(Request $request)
    {

       $query = Plandetailshistory::query();
         
        if ($request->filled('route')) {
            $query->where('route', 'like', '%' . $request->input('route') . '%');
        }

        if ($request->filled('startDate') && $request->filled('endDate')) {
            // If both start_date and end_date are provided
            $start_date = $request->input('startDate') ; // Start of the start_date
            $end_date = $request->input('endDate') ;
            $query->whereBetween('date', [$start_date,$end_date]);
        } elseif ($request->filled('startDate')) {
            // If only start_date is provided
            $start_date = $request->input('startDate');
            $query->where('date', '>=', $start_date);
        } elseif ($request->filled('endDate')) {
            // If only end_date is provided
            $end_date = $request->input('endDate');
            $query->where('date', '<=', $end_date);
        }

        $planDetails = $query->select('date', 'route', DB::raw('SUM(trips) as total_trips'), DB::raw('COUNT(DISTINCT truck) as total_trucks'))
        ->groupBy('date', 'route')
        ->get();

        
        $trucks = DB::table('plandetails')
        ->join('assets', 'plandetails.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetails.driver_id', '=', 'drivers.id') // 'assets' table has 'registration' field matching 'truck'
        ->select('plandetails.truck', 'assets.registration', 'assets.make', 'drivers.name' ,'drivers.checkcode','drivers.surname', 'assets.model', 'assets.licenseNumber','plandetails.date', 'plandetails.route', 'plandetails.trips')
        ->get();

        $routes = Route::all();

        return view('plan.summary', compact('planDetails','trucks','routes'));

    }



    public function activesummaryfilter(Request $request)
    {
      // dd($request->all());

       $query = Plandetails::query();
         
        if ($request->filled('route')) {
            $query->where('route', 'like', '%' . $request->input('route') . '%');
        }

        if ($request->filled('startDate') && $request->filled('endDate')) {
            // If both start_date and end_date are provided
            $start_date = $request->input('startDate') ; // Start of the start_date
            $end_date = $request->input('endDate') ;
            $query->whereBetween('date', [$start_date,$end_date]);
        } elseif ($request->filled('startDate')) {
            // If only start_date is provided
            $start_date = $request->input('startDate');
            $query->where('date', '>=', $start_date);
        } elseif ($request->filled('endDate')) {
            // If only end_date is provided
            $end_date = $request->input('endDate');
            $query->where('date', '<=', $end_date);
        }

        $planDetails = $query->select('date', 'route', DB::raw('SUM(trips) as total_trips'), DB::raw('COUNT(DISTINCT truck) as total_trucks'))
        ->where('date', '>=', now()->format('Y-m-d'))
        ->groupBy('date', 'route')
        ->get();

        
        $trucks = DB::table('plandetails')
        ->join('assets', 'plandetails.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetails.driver_id', '=', 'drivers.id') // 'assets' table has 'registration' field matching 'truck'
        ->select('plandetails.truck', 'assets.registration', 'assets.make', 'drivers.name','drivers.checkcode','drivers.surname', 'assets.model', 'assets.licenseNumber','plandetails.date', 'plandetails.route', 'plandetails.trips')
        ->get();

        $routes = Route::all();

        return view('plan.activesummary', compact('planDetails','trucks','routes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function setplan(Request $request)
    {
        set_time_limit(600);
        ini_set('memory_limit', '1G'); // Sets memory limit to 1 Gigabyte
       
        //timeout
            $startDate = Carbon::parse($request->date);
            $endDate = Carbon::parse($request->enddate);
              
            $dates = [];

            if ($startDate->eq($endDate)) {
                // If start and end dates are the same, add only one date to the array
                $dates[] = $startDate->format('Y-m-d');
            } else {
                
                $currentDate = $startDate->copy();
                while ($currentDate->lte($endDate)) {
                    $dates[] = $currentDate->format('Y-m-d'); // Add each date to the array
                    $currentDate->addDay(); // Increment by one day
                }
            }



        $userId = Auth::user()->id;
        $getroute = Route::where('id', $request->route)->first();

        $createplan = Plan::create([
            'date' => $request->date,
            'name' => $request->clientname,
            'enddate' => $request->enddate,
            'product' => $request->product,
            'producttype' => $request->producttype,
            'maxloads' => $request->maxloads,
            'loadingNumber' => $request->loading,
            'routeId' => $request->route,
            'route' => $getroute->from .' to '. $getroute->to ,
            'createdBy' => $userId
        ]);


        foreach ($dates as $date) {

            $truck_ids = $request->input('truck_ids');
            $nooftrips = $request->input('nooftrips');
            $driver = $request->input('driver');
           // $shifts = $request->input('shifts');
            $times = $request->input('times');
            $status = $request->input('status');

          //  dd($truck_ids); 

                foreach($truck_ids as $key => $n ) {

                    $truck = Asset::where('id', $n)->first();

                    $arrData[] = array(

                        $companyrole = Plandetails::create([

                            'plan_id' => $createplan->id,
                            'route' => $getroute->from .' to '. $getroute->to ,
                            'routeId' => $request->route,
                            'date' => $date,
                            'truck' =>  $truck->licenseNumber,
                            'truck_id' => $truck_ids[$key],
                            'trips'  => $nooftrips[$key], 
                            'time'  => $times[$key],
                            'driver_id'  => $driver[$key],
                            'createdBy' => $userId
                            
                        ]),

                        
                    $truckupdate = Asset::where('id', $n)->update([

                        'status'  => $status[$key],
                    ]),


                        $companyrole = Plandetailshistory::create([

                            'plan_id' => $createplan->id,
                            'plandetails_id' =>  $companyrole->id,
                            'route' => $getroute->from .' to '. $getroute->to ,
                            'routeId' => $request->route,
                            'date' => $date,
                            'truck' =>  $truck->licenseNumber,
                            'truck_id' => $truck_ids[$key],
                            'trips'  => $nooftrips[$key],
                            'time'  => $times[$key],
                            'driver_id'  => $driver[$key],
                            'createdBy' => $userId
                            
                        ])
                    );

                }

            }
                
     
                if($createplan){

                    return redirect()->route('plan.route')->with('success', 'Plan created successfully!');
                }
                  return redirect()->route('plan.route')->with('error', 'Failed to set Plan!');
                
    }

    public function changeassignment()
    {
        $assignments = Plandetails::where('date', '>=', now()->format('Y-m-d'))->orderBy('date', 'asc')->orderBy('truck', 'asc')->get();
        $routes = Route::all();

        return view('plan.changeassignment', compact('assignments','routes'));
    }


    public function summary()
    {
        set_time_limit(600);
        ini_set('memory_limit', '1G'); // Sets memory limit to 1 Gigabyte
       
        $planDetails = DB::table('plandetailshistories')
        ->join('plans', 'plandetailshistories.plan_id', '=', 'plans.id') 
        ->select('plandetailshistories.date', 'plandetailshistories.route', 'plans.product','plans.loadingNumber' ,DB::raw('SUM(trips) as total_trips'), DB::raw('COUNT(DISTINCT truck) as total_trucks'))
        ->orderByRaw('MAX(plandetailshistories.date) DESC')
        ->groupBy('plandetailshistories.date', 'plandetailshistories.route','plans.product','plans.loadingNumber')
        ->get();

        // dd( $planDetails);
            
        $trucks = DB::table('plandetailshistories')
        ->join('assets', 'plandetailshistories.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetailshistories.driver_id', '=', 'drivers.id')  // 'assets' table has 'registration' field matching 'truck'
        ->select('plandetailshistories.truck', 'assets.registration', 'assets.make' ,'drivers.checkcode', 'drivers.name','drivers.surname',  'assets.model', 'assets.licenseNumber','plandetailshistories.date', 'plandetailshistories.route', 'plandetailshistories.trips')
        ->get();

     $routes = Route::all();
         
        return view('plan.summary', compact('planDetails','trucks','routes'));
    }



    public function activesummary()
    {
        set_time_limit(600);
        ini_set('memory_limit', '1G'); // Sets memory limit to 1 Gigabyte
       
        $planDetails = DB::table('plandetails')
        ->where('plandetails.date', '>=', now()->format('Y-m-d'))
        ->join('plans', 'plandetails.plan_id', '=', 'plans.id') 
        ->select('plandetails.date', 'plandetails.plan_id', 'plandetails.id','plandetails.route', 'plans.product','plans.loadingNumber',DB::raw('SUM(trips) as total_trips'), DB::raw('COUNT(DISTINCT truck) as total_trucks'))
        ->groupBy('plandetails.date', 'plandetails.route','plans.product','plans.loadingNumber','plandetails.plan_id')
        ->get();

        $trucks = DB::table('plandetails')
        ->join('assets', 'plandetails.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetails.driver_id', '=', 'drivers.id') // 'assets' table has 'registration' field matching 'truck'
        ->select('plandetails.truck','assets.registration', 'assets.make', 'drivers.name','drivers.checkcode','drivers.surname', 'assets.model', 'assets.licenseNumber','plandetails.date', 'plandetails.route', 'plandetails.trips')
        ->get();

     $routes = Route::all();
         
        return view('plan.activesummary', compact('planDetails','trucks','routes'));
    }



    public function todaysummary()
    {
        set_time_limit(600);
        ini_set('memory_limit', '1G'); // Sets memory limit to 1 Gigabyte
       
        $planDetails = DB::table('plandetails')
        ->where('plandetails.date', '=', now()->format('Y-m-d'))
        ->join('plans', 'plandetails.plan_id', '=', 'plans.id') 
        ->select('plandetails.date', 'plandetails.route','plandetails.id','plandetails.plan_id', 'plans.product','plans.loadingNumber',DB::raw('SUM(trips) as total_trips'), DB::raw('COUNT(DISTINCT truck) as total_trucks'))
        ->groupBy('plandetails.date', 'plandetails.route','plans.product','plans.loadingNumber','plandetails.plan_id')
        ->get();

        $trucks = DB::table('plandetails')
        ->join('assets', 'plandetails.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetails.driver_id', '=', 'drivers.id') // 'assets' table has 'registration' field matching 'truck'
        ->select('plandetails.truck', 'assets.registration', 'assets.make', 'drivers.name','drivers.checkcode','drivers.surname', 'assets.model', 'assets.licenseNumber','plandetails.date', 'plandetails.route', 'plandetails.trips')
        ->get();

       $routes = Route::all();
         
        return view('plan.todaysummary', compact('planDetails','trucks','routes'));
    }



    public function downloadpdf($id)
    {
 
        $plan = Plan::where('id',$id)->first();
        $route = Route::where('id', $plan->routeId)->first();
        $user = User::where('id',$plan->createdBy)->first();


        $data = DB::table('plandetails')
        ->where('plan_id',$id)
        ->join('assets', 'plandetails.truck', '=', 'assets.licenseNumber')
        ->join('drivers', 'plandetails.driver_id', '=', 'drivers.id') 
        ->select('plandetails.truck', 'assets.registration','assets.regNumber1','assets.regNumber2', 'assets.make','drivers.checkcode', 'drivers.name', 'drivers.licenseNumber','drivers.surname', 'assets.model','plandetails.date', 'plandetails.route', 'plandetails.trips')
        ->groupby('plandetails.truck')
        ->get();


        $pdf = PDF::loadView('plan.pdf', ['data' => $data,'plan' => $plan,'route' => $route,'user' => $user])
                ->setPaper('a4', 'landscape');



        $startdate = $plan->date; // Example start date
        $enddate = $plan->enddate;   // Example end date
        $from = $plan->route;   // Example "from" location

        $filename = "{$startdate} - {$enddate} ({$from}).pdf";

        return $pdf->download($filename);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plandetails::where('id', $id)->first();

        $delete  = Plandetails::where('route', $plan->route)->where('date', $plan->date)->delete();

        if($delete){
  
            return back()->with('success', 'Plan deleted successfully!'); 
        }
    }

    public function deleteplan(string $id)
    {
        $plan = Plandetails::where('id', $id)->first();
        
        $plandelete = Plandetails::where('plan_id', $plan->plan_id)->where('route', $plan->route)->where('truck', $plan->truck)->delete();

        if($plandelete){
  
            return back()->with('success', 'Plan deleted successfully!'); 
        }
    }


    public function remove(string $id)
    {
        $plan = Plan::where('id', $id)->first();
  
        $delete  = Plandetails::where('plan_id', $plan->id)->delete();
        $plandelete = Plan::where('id', $id)->delete();

          return back()->with('success', 'Plan deleted successfully!'); 
    
    }

}
