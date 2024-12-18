<?php

namespace App\Http\Controllers;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Assetdriver;
use App\Models\Driver;
use Alert;
use Auth;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Userrole::all();
        $assets = Asset::all();

        return view('assets.index', compact('assets','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        $userrole = new Asset();
        $userrole->make = $request->make;
        $userrole->registration = $request->registration;
        $userrole->registrationYear = $request->registrationYear;
        $userrole->model =  $request->model;
        $userrole->vinNumber = $request->vinNumber;
        $userrole->payloadCapacity = $request->payloadCapacity;
        $userrole->weight = $request->weight;
        $userrole->assetType = $request->assetType;
        $userrole->licenseNumber = $request->licenseNumber;
        $userrole->truckType = $request->truckType;
        $userrole->trailerType = $request->trailerType;
        $userrole->gearType = $request->gearType;
        $userrole->engineCapacity = $request->engineCapacity;
        $userrole->expectedFuelConsumption = $request->expectedFuelConsumption;
        $userrole->mileage = $request->mileage;
        $userrole->status = 1;
        $userrole->fueltype = $request->fueltype;

        $userrole->assetnumber1 = $request->assetnumber1;
        $userrole->regNumber1 = $request->regNumber1;
        $userrole->regexpdate1 = $request->regexpdate1;

        $userrole->assetnumber2 = $request->assetnumber2;
        $userrole->regNumber2 = $request->regNumber2;
        $userrole->regexpdate2 = $request->regexpdate2;

        $userrole->mileage = $request->mileage;
        $userrole->status = 1;
        $userrole->fueltype = $request->fueltype;

        $userrole->registrationExpireDate = $request->registrationExpireDate;
        $userrole->CreatedBy = $user->name;

        $userrole->save();

        if($userrole){
            return redirect()->route('assets.create')->with('success', 'Asset created successfully!');
        }
          return redirect()->route('assets.create')->with('error', 'Failed to create Asset!');
        
    }

    /**
     * Display the specified resource.
     */
    public function assignDrivers(request $request)
    {

        //dd($request->driver_ids);
        if(!$request->driver_ids){
          
            return back()->with('warning', 'You did not select a driver!');

        }

        
        $drivers = Driver::whereIn('id', $request->driver_ids)->get();     
        
       // $removeEverything = Assetdriver::where('asset_id', $request->asset)->delete();

        if($drivers){

        foreach ($drivers as $driver) {
             
            Assetdriver::create([

                'asset_id' => $request->asset,
                'driver_id' => $driver->id,
            ]);

        }

      }

      return redirect()->route('assets.index')->with('success', 'Driver Assigned successfully!');
       // return back()->with('success', 'Driver Assigned successfully!'); 
    }

    public function assigndriver(string $id)
    {
        $asset = Asset::findOrFail($id);
        $drivers = Driver::all();
       $assigned = Assetdriver::where('asset_id',$id)->get();

        return view('assets.assigndriver', compact('asset','drivers','assigned'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset = Asset::where('id', $id)->first();
      //  dd($asset);

        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //      dd($request->payloadCapacity);

        $assetUpdate = Asset::where('id',$id)->update([

            'make'               =>$request->make, 
            'registration'       =>$request->registration, 
            'assetDescription'    =>$request->assetDescription, 
            'vinNumber'           =>$request->vinNumber, 
            'assetType'           =>$request->assetType, 
            'weight'              =>$request->weight,    
            'statusReason'        =>$request->statusReason,     
            'licenseNumber'       =>$request->licenseNumber, 
            'payloadCapacity'    => $request->payloadCapacity, 
            'status'             =>$request->status, 
            'mileage'            =>$request->mileage, 
            'fueltype'           =>$request->fueltype, 
            'truckType'          =>$request->truckType,
            'trailerType'         =>$request->trailerType,
            'model'               =>$request->model,
            'registrationYear'    =>$request->registrationYear,

            'assetnumber1'    =>$request->asset1,
            'regNumber1'    =>$request->reg1,
            'regexpdate1'    =>$request->exp1,

            'assetnumber2'    =>$request->asset2,
            'regNumber2'    =>$request->reg2,
            'regexpdate2'    =>$request->exp2,

            'registrationExpireDate'    =>$request->registrationExpireDate, 
            'updatedBy'   =>Auth::user()->name,               

        ]);

        if($assetUpdate){

            return back()->with('success', 'Asset updated successfully!'); 
        }

        return back()->with('error', 'Failed to update Asset!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Asset::where('id', $id)->delete();

        if($delete){
  
            return back()->with('success', 'Asset deleted successfully!'); 
        }
    }
}
