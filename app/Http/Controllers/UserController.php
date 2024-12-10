<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Userrole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Alert;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Userrole::all();
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $roles = Userrole::all();
        return view('users.create', compact('roles'));
    }


    public function fetchData()
    {

           $start_timestamp = "2023-12-12 17:30:00";
           $end_timestamp = "2023-12-12 19:00:00";
           $truck = "SL235 KST829MP";
           $truck = str_replace(' ', '-', $truck);
         //  dd($truck);
       
           $endpoint1 = 'https://fleetapi-za.cartrack.com/rest/fuel/consumed/'.urlencode($truck);
           $endpoint2 = 'https://fleetapi-za.cartrack.com/rest/vehicles/'.urlencode($truck).'/odometer'; // Change this to your second endpoint
       
           $url1 = $endpoint1 . '?start_timestamp=' . urlencode($start_timestamp) . '&end_timestamp=' . urlencode($end_timestamp);
           $url2 = $endpoint2 . '?start_timestamp=' . urlencode($start_timestamp) . '&end_timestamp=' . urlencode($end_timestamp);
       
           $token = "TUFOVDAwMjI2OmFiODQ5YTNjMDVlZmYzOWM2ZDgzMDkzMTNhNWRhYWFhYjNjOWQ2NzMyYWQ4MTkxYjI5NmQ3OWRhY2FmZGQ3NTE=";
       
           // First cURL request
           $ch1 = curl_init($url1);
           curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch1, CURLOPT_HTTPHEADER, [
               'Authorization: Basic ' . $token,
               'Content-Type: application/json'
           ]);
           $response1 = curl_exec($ch1);
           curl_close($ch1);
       
           // Second cURL request
           $ch2 = curl_init($url2);
           curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch2, CURLOPT_HTTPHEADER, [
               'Authorization: Basic ' . $token,
               'Content-Type: application/json'
           ]);
           $response2 = curl_exec($ch2);
           curl_close($ch2);
       
           $data1 = json_decode($response1);
           $data2 = json_decode($response2);
       
           // Process $data1 and $data2 as needed

          dd($data1->data->fuel_consumed,$data2);
        
        return $data; // Or return a view with the data, etc.
    }

        /**
     * Show the form for creating a new resource.
     */
    public function parameters()
    {
        $roles = Userrole::all();
        return view('users.parameters', compact('roles'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $checkuser = User::where('email', $request->email)->first();

        if($checkuser){
          
            return redirect()->route('users.create')->with('warning', 'User already exisits!');
          
        }

        $userrole = new User();
        $userrole->name = $request->name;
        $userrole->userName = $request->userName;
        $userrole->createdBy =  $user->name;;
        $userrole->address = $request->address;
        $userrole->email = $request->email;
        $userrole->city = $request->city;
        $userrole->country = $request->country;
        $userrole->age = $request->age;
       // $userrole->phoneNumber = $request->phoneNumber;
        $userrole->department = $request->department;
        $userrole->userRole = $request->userole;
        $userrole->employeeNumber = $request->employeeNumber;
        $userrole->password = Hash::make($request->password);
        $userrole->save();


        //Alert::success('Success Title', 'Success Message');

        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }



    public function userRole(Request $request) 
    {
        $user = auth()->user();

        $userrole = new Userrole();
        $userrole->Name = $request->Name;
        $userrole->Description = $request->Description;
        $userrole->CreatedBy = $user->name;
        $userrole->save();

        return redirect()->route('users.parameters')->with('success', ' User Role created successfully!');
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
        $user = User::where('id',$id)->first();
        $roles = Userrole::all();

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //  dd($id,$request->status,$request->statusReason);

        $userUpdate = User::where('id',$id)->update([

            'name'    =>$request->name, 
            'address'    =>$request->address, 
            'department'    =>$request->department, 
            'email'    =>$request->email, 
            'userRole'    =>$request->userRole,             

        ]);

        if($userUpdate){

            return back()->with('success', 'User updated successfully!'); 
        }

        return back()->with('error', 'Failed to update User!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::where('id', $id)->delete();

        if($delete){
  
            return back()->with('success', 'User deleted successfully!'); 
        }
    }
}
