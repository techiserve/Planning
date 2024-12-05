<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Models\Userrole;
use App\Models\User;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Route;
use App\Models\Driver;
use Alert;
use Auth;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $user = auth()->user();
        $userrole = new Driver();
        $userrole->name = $request->name;
        $userrole->surname = $request->surname;
        $userrole->group = $request->group;
        $userrole->dob =  $request->dob;
        $userrole->gender = $request->gender;
        $userrole->routeType = $request->routeType;
        $userrole->licenseExpireDate = $request->licenseExpireDate;
        $userrole->licenseNumber =  $request->licenseNumber;
        $userrole->vehicleType = $request->vehicleType;
        $userrole->checkcode = $request->checkcode;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return redirect()->route('drivers.create')->with('success', 'Driver created successfully!');
        }
          return redirect()->route('drivers.create')->with('error', 'Failed to create Driver!');
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
        $driver = Driver::where('id',$id)->first();

        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //  dd($id,$request->status,$request->statusReason);

        $driverUpdate = Driver::where('id',$id)->update([

            'name'    =>$request->name, 
            'surname'    =>$request->surname, 
            'group'    =>$request->group, 
            'gender'    =>$request->gender, 
            'routeType'    =>$request->routeType, 
            'licenseNumber'    =>$request->licenseNumber,    
            'statusReason'    =>$request->statusReason,     
            'vehicleType'    =>$request->vehicleType, 
            'licenseExpireDate'    =>$request->licenseExpireDate, 
            'status'    =>$request->status, 
            'updatedBy'   =>Auth::user()->name,               

        ]);

        if($driverUpdate){

            return back()->with('success', 'Driver updated successfully!'); 
        }

        return back()->with('error', 'Failed to update Driver!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Driver::where('id', $id)->delete();

        if($delete){
  
            return back()->with('success', 'Driver deleted successfully!'); 
        }
    }
}
