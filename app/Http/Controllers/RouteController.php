<?php

namespace App\Http\Controllers;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use Alert;
use Auth;

use Illuminate\Http\Request;

class RouteController extends Controller
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
        return view('routes.create');
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
    public function show(string $id)
    {
        //
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
            'engineCapacity'    =>$request->engineCapacity,
            'expectedFuelConsumption'    =>$request->expectedFuelConsumption,
            'gearType'    =>$request->gearType,

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
        //
    }
}
