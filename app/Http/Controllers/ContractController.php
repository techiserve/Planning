<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Models\Userrole;
use App\Models\User;
use App\Models\MonthlyForecast;
use App\Models\Asset;
use App\Models\Contract;
use App\Models\Formula;
use App\Models\Escalationformula;
use App\Models\Route;
use App\Models\Routeratetracker;
use Carbon\Carbon;
use Alert;
use Auth;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'contractImage' => 'required|mimes:pdf,xlx,csv|max:10240',
        ]);

        $file = $request->file('contractImage');
        $fileName = time().'.'.$request->contractImage->extension();
        if ($file !== null) {
        $path = $request->file('contractImage')->store('public/contracts');  
       }

        $user = auth()->user();

        $userrole = new Contract();
        $userrole->number = $request->number;
        $userrole->provider = $request->provider;
        $userrole->client = $request->client;
        $userrole->duration =  $request->duration;
        $userrole->commodity = $request->commodity;
        $userrole->effectiveDate = $request->date;
        $userrole->contractValue = $request->contractValue;
        $userrole->forecastMonthlyVolume = $request->forecastMonthlyVolume;
        $userrole->forecastWeeklyVolume = $request->forecastWeeklyVolume;
        $userrole->forecastDailyVolume = $request->forecastDailyVolume;
        $userrole->requiredMonthlyDistance = $request->requiredMonthlyDistance;
        $userrole->requiredMonthlyQuantity = $request->requiredMonthlyDistance * $request->requiredMonthlyVolume;
        $userrole->requiredMonthlyVolume = $request->requiredMonthlyVolume;
        $userrole->image =$request->file('contractImage')->hashName();
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){
            return redirect()->route('contracts.create')->with('success', 'Contract created successfully!');
        }
          return redirect()->route('contracts.create')->with('error', 'Failed to create Contract!');
       
    }


    public function parameters()
    {
        $roles = Userrole::all();
        $routes = Route::all();
        $formulas = Formula::all();
        $contracts = Contract::all();

        return view('contracts.parameters', compact('roles', 'routes','formulas','contracts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }




    
    /**
     * Display the specified resource.
     */
    public function forecast(string $id)
    {
        $contract = Contract::where('id', $id)->first();
    
        return view('contracts.monthlyforecast', compact('contract'));
    }


    public function storeforecast(Request $request)
    {
        $user = auth()->user();
        $contract = Contract::where('id', $request->contract)->first();

        $checkMonth1 = MonthlyForecast::where('month', $request->month1)->where('contract', $contract->id)->count();
        $checkMonth2 = MonthlyForecast::where('month', $request->month2)->where('contract', $contract->id)->count();
        $checkMonth3 = MonthlyForecast::where('month', $request->month3)->where('contract', $contract->id)->count();

        if($checkMonth1 > 0){

            return back()->with('error', 'That month '.$request->month1.' already has a forecast set'); 

        }

        if($checkMonth2 > 0){

            return back()->with('error', 'That month '.$request->month2.' already has a forecast set'); 

        }

        if($checkMonth3 > 0){

            return back()->with('error', 'That month '.$request->month3.' already has a forecast set'); 

        }

        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Contract',   
            'contract' => $contract->id,
            'forecastValue' => $request->forecastValue1,
            'month' => $request->month1,
            'description' => $request->description1,
            'createdBy' => $user->name 

        ]);


        
        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Contract',   
            'contract' => $contract->id,
            'forecastValue' => $request->forecastValue2,
            'month' => $request->month2,
            'description' => $request->description2,
            'createdBy' => $user->name 

        ]);




        
        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Contract',   
            'contract' => $contract->id,
            'forecastValue' => $request->forecastValue3,
            'month' => $request->month3,
            'description' => $request->description3,
            'createdBy' => $user->name 

        ]);
       // dd($request->contract);
    
        if($forecastStore){

            return back()->with('success', ' 3 Month Forecast Saved Successfully'); 
        }
        return back()->with('error', 'Invalid Input!');
    }

      /**
     * Display the specified resource.
     */
    public function routeforecast(string $id)
    {
        $route = Route::where('id', $id)->first();
    
        return view('contracts.routemonthlyforecast', compact('route'));
    }

    
    public function storerouteforecast(Request $request)
    {
        $user = auth()->user();
        $route = Route::where('id', $request->route)->first();

        $checkMonth1 = MonthlyForecast::where('month', $request->month1)->where('contract', $route->id)->count();
        $checkMonth2 = MonthlyForecast::where('month', $request->month2)->where('contract', $route->id)->count();
        $checkMonth3 = MonthlyForecast::where('month', $request->month3)->where('contract', $route->id)->count();

        if($checkMonth1 > 0){

            return back()->with('error', 'That month '.$request->month1.' already has a forecast set'); 

        }

        if($checkMonth2 > 0){

            return back()->with('error', 'That month '.$request->month2.' already has a forecast set'); 

        }

        if($checkMonth3 > 0){

            return back()->with('error', 'That month '.$request->month3.' already has a forecast set'); 

        }

        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Route',   
            'route' => $route->id,
            'forecastValue' => $request->forecastValue1,
            'month' => $request->month1,
            'description' => $request->description1,
            'createdBy' => $user->name 

        ]);

       
        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Route',   
            'route' => $route->id,
            'forecastValue' => $request->forecastValue2,
            'month' => $request->month2,
            'description' => $request->description2,
            'createdBy' => $user->name 

        ]);


      
        $forecastStore = MonthlyForecast::create([

            'horizon' => 'Route',   
            'route' => $route->id,
            'forecastValue' => $request->forecastValue3,
            'month' => $request->month3,
            'description' => $request->description3,
            'createdBy' => $user->name 

        ]);
       // dd($request->contract);
    
        if($forecastStore){

            return back()->with('success', ' 3 Month Forecast Saved Successfully'); 
        }
        return back()->with('error', 'Invalid Input!');
    }


    public function formulaStore(Request $request)
    {
        $user = auth()->user();
        $expression = $request->formula;
        $result = $this->calculateResult($expression);
        if($result == null){

            return back()->with('warning', 'You make a mistake in your formula! Try again');
        }

        $userrole = new Formula();
        $userrole->formula = $request->formula;
        $userrole->equation = $request->equation;
        $userrole->route = $request->route;
        $userrole->result = $result;
        $userrole->createdBy = $request->createdBy;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return back()->with('success', 'Formula calculated and your rate is '.$result.'');
        }
          return back()->with('error', 'Failed to calculate formula!');
     
    }

    private function calculateResult($expression)
    {
        // Use a library or a safe method to evaluate the mathematical expression
        // For example, using the eval() function (be cautious with user input)
        try {
            $result = eval("return $expression;");
            return $result;
        } catch (\Throwable $e) {
            // Handle errors (e.g., invalid expressions)
            return null;
        }
    }


    public function routeStore(Request $request)
    {
        $user = auth()->user();

        $userrole = new Route();
        $userrole->from = $request->from;
        $userrole->to = $request->to;
        $userrole->activity = $request->activity;
        $userrole->distance =  $request->distance;
        $userrole->unit = $request->unit;
        $userrole->contractId = $request->contract;
        $userrole->rate = $request->rate;
        $userrole->totalQuantity = $request->totalQuantity;
        $userrole->estimatedmonthQuantity = $request->monthQuantity;
        $userrole->routeCategory = $request->routeCategory;
        $userrole->type = $request->type;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return redirect()->route('contracts.parameters')->with('success', 'Route created successfully!');
        }
          return redirect()->route('contracts.parameters')->with('error', 'Failed to create Route!');
       
    }


    public function formulaStores(Request $request)
    {
     
        $LabourIndexattheenddate = 10;
        $LabourIndexatthebasedate = 4;
        $FuelDieselIndexattheenddate = 30;

        $numbers = $request->input('numbers');
        $operations = $request->input('operations');

        foreach($numbers as $key => $number){

          //  $getnumber = Parameters::where( $number, '!=' , null )->first();
            $numbers[$key] = $LabourIndexattheenddate + $key;
         //   dd($numbers[$key]);

        }
      //  dd($numbers);

        if (count($numbers) < 2 || count($numbers) != count($operations) + 1) {
            // Handle validation or error as needed
            return back()->with('error', 'Invalid Input!');
        }

        $result = $numbers[0];

        for ($i = 0; $i < count($operations); $i++) {
            switch ($operations[$i]) {
                case 'add':
                    $result += $numbers[$i + 1];
                    break;
                case 'subtract':
                    $result -= $numbers[$i + 1];
                    break;
                case 'multiply':
                    $result *= $numbers[$i + 1];
                    break;
                case 'divide':
                    // Check if the divisor is not zero to avoid division by zero
                    $result = ($numbers[$i + 1] != 0) ? $result / $numbers[$i + 1] : 'Undefined (division by zero)';
                    break;
                default:
                    // Handle invalid operation
                    return back()->with('error', 'Failed to calculate formula!');
            }
        }

            return back()->with('success', 'Formula calculated and your rate is '.$result.'');
     
    }


    public function formulaStoress(Request $request)
    {
        $user = auth()->user();
        $route = $request->route;
        $contract = $request->contract;
        $routeDetails =  Route::where('contractId', '=' , $contract )->get();
      //  dd($routeDetails);
     //   $contract = $routeDetails->contractId;
        if($routeDetails == null){

            return back()->with('warning', 'There are no routes linked to this contract!');  
        }    
       

        foreach($routeDetails as $routedetail){

            $expression = $request->input('userInput');
            $explodedforumla =  $request->input('userInput');
            $storeFormula = json_encode($explodedforumla);
            $equationString =  implode($expression);
          // dd($equationString);
            $dummy = 10;
       // dd($routedetail);
        foreach($expression as $key => $number){

            //  $getnumber = Parameters::where( $number, '!=' , null )->first();
            if($expression[$key] != '+' &  $expression[$key] != '-' & $expression[$key] != '*' & $expression[$key] != '/'  & $expression[$key] != '('  & $expression[$key] != ')'){

                if($expression[$key] == 'OR'){
                    $rate = Route::where('id', '=' , $routedetail->id )->first();
                    $expression[$key] = $rate->rate;
                 //   dd($rate);
                }elseif($expression[$key] == 'L1'){

                    $LabourIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'L0'){

                    $LabourIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'F1'){

                    $FuelDieselIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                //   dd($FuelDieselIndexattheenddate);
                    $expression[$key] = number_format($FuelDieselIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'F0'){

                    $FuelDieselIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($FuelDieselIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'CC1'){

                    $CapitalCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalCostIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'CC0'){

                    $CapitalCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalCostIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'RM1'){

                    $RepairandMaintenanceIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairandMaintenanceIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'RM0'){

                    $RepairandMaintenanceIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairandMaintenanceIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'OC1'){

                    $OtherCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'OC0'){

                    $OtherCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'L(%)'){

                    $LabourWeightage = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'F(%)'){

                    $FuelWeightage = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($FuelWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'C(%)'){

                    $CapitalWeightage = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'R(%)'){

                    $RepairWeightage = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'O(%)'){

                    $OtherCostWeightage = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostWeightage->weightage, 2);
                    
                }else{

                    $expression[$key] = null;
                }

              //  $getnumber = Parameters::where( $number, '!=' , null )->first();             
            }            
             // dd($numbers[$key]);
          }

       //  dd($expression);

       $expression = implode($expression);
    //  dd($expression);
       // dd($text);
       $result = $this->calculateResult($expression);
       if($result == null){

        return back()->with('warning', 'You make a mistake in your formula! Try again');
    }
           
        $currentDateTime = Carbon::now();

        $userrole = new Formula();
        $userrole->formula = $expression;
        $userrole->equation = $storeFormula;
        $userrole->contract = $contract;
        $userrole->route = $routedetail->id;
        $userrole->result = $result;
        $userrole->equationString = $equationString;
        $userrole->createdBy = $user->name;
        $userrole->save();

        $routeratetracker = new Routeratetracker();
        $routeratetracker->route = $routedetail->id;
        $routeratetracker->rate =  $result ;
        $routeratetracker->previousRate = $routedetail->rate ;
        $routeratetracker->contract = $contract;
        $routeratetracker->formula =  $storeFormula;
        $routeratetracker->activeMonth = date('F')." ".date('Y');
        $routeratetracker->status = 1;
        $routeratetracker->createdBy = $user->name;
        $routeratetracker->save();


        $updateRouteRate = Route::where('id', $routedetail->id )->update([

            'rate' => $result,
        ]);

    }

       // dd($result);
     

        return back()->with('success', 'All routes for the selected contract have been assigned a new rate');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contract = Contract::where('id',$id)->first();
        $escalationformulas = Escalationformula::where('contract','=', $id)->get();
        $forecast = Monthlyforecast::where('contract', $id)->get();
      //  dd($routes);
        return view('contracts.edit', compact('contract','escalationformulas', 'forecast'));
    }


    public function updateformula(Request $request, $id)
    {
      
        $user = auth()->user();
        $endIndices = $request->input('endIndices');
        $costComponent = $request->input('costComponents');
        $endDates = $request->input('endDates');
      
        foreach ($costComponent as $key => $value) {

            $updateCostComponent = Escalationformula::where('contract','=',$id)->where('costComponent','=', $costComponent[$key])->update([

                'endIndices' => $endIndices[$key],
                'endDate' => $endDates[$key]
            ]);
        }

        // now adjust the rates for all routes assosiates with this contract
         $formulaYachos = Formula::where('contract', $id)->get();


         
         foreach($formulaYachos as $formulaYacho){
     //   dd($formulaYacho);
         $contract = $id;
         $equation = $formulaYacho->equation;
         $expression = json_decode($equation, true);
         $storeFormula = json_encode($expression);
         $equationString =  implode($expression);
         $theRate = Route::where('id', '=' , $formulaYacho->route )->first();
       // dd($equationString);
           foreach($expression as $key => $number){
            //  $getnumber = Parameters::where( $number, '!=' , null )->first();
            if($expression[$key] != '+' &  $expression[$key] != '-' & $expression[$key] != '*' & $expression[$key] != '/'  & $expression[$key] != '('  & $expression[$key] != ')'){

                if($expression[$key] == 'OR'){
                    $rate = Route::where('id', '=' , $formulaYacho->route )->first();
                    $expression[$key] = $rate->rate;
                 //   dd($rate);
                }elseif($expression[$key] == 'L1'){

                    $LabourIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'L0'){

                    $LabourIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'F1'){

                    $FuelDieselIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                //   dd($FuelDieselIndexattheenddate);
                    $expression[$key] = number_format($FuelDieselIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'F0'){

                    $FuelDieselIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($FuelDieselIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'CC1'){

                    $CapitalCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalCostIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'CC0'){

                    $CapitalCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalCostIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'RM1'){

                    $RepairandMaintenanceIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairandMaintenanceIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'RM0'){

                    $RepairandMaintenanceIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairandMaintenanceIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'OC1'){

                    $OtherCostIndexattheenddate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostIndexattheenddate->endIndices, 2);
                    
                }elseif($expression[$key] == 'OC0'){

                    $OtherCostIndexatthebasedate = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostIndexatthebasedate->baseIndices, 2);
                    
                }elseif($expression[$key] == 'L(%)'){

                    $LabourWeightage = Escalationformula::where('costComponent', '=' ,'Labour')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($LabourWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'F(%)'){

                    $FuelWeightage = Escalationformula::where('costComponent', '=' ,'Fuel (Diesel)')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($FuelWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'C(%)'){

                    $CapitalWeightage = Escalationformula::where('costComponent', '=' ,'Capital Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($CapitalWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'R(%)'){

                    $RepairWeightage = Escalationformula::where('costComponent', '=' ,'Repair & Maintenance')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($RepairWeightage->weightage, 2);
                    
                }elseif($expression[$key] == 'O(%)'){

                    $OtherCostWeightage = Escalationformula::where('costComponent', '=' ,'Other Cost')->where('contract','=', $contract)->first();
                  //  dd($LabourIndexatthebasedate);
                    $expression[$key] = number_format($OtherCostWeightage->weightage, 2);
                    
                }else{


                    $expression[$key] = null;
                }

              //  $getnumber = Parameters::where( $number, '!=' , null )->first();             
            }            
             // dd($numbers[$key]);
          }

            $expression = implode($expression);  
          //  dd($expression);  
            $result = $this->calculateResult($expression);
            
            if($result == null){
    
                return back()->with('warning', 'You make a mistake in your formula! Try again');
            }
           
            $userrole = new Formula();
            $userrole->formula = $expression;
            $userrole->equation = $storeFormula;
            $userrole->contract = $contract;
            $userrole->route = $formulaYacho->route;
            $userrole->result = $result;
            $userrole->equationString = $equationString;
            $userrole->createdBy = $user->name;
            $userrole->save();

            
            $routeratetracker = new Routeratetracker();
            $routeratetracker->route = $formulaYacho->route;
            $routeratetracker->rate =  $result ;
            $routeratetracker->previousRate = $theRate->rate;
            $routeratetracker->contract = $contract;
            $routeratetracker->formula =  $storeFormula;
            $routeratetracker->activeMonth = date('F')." ".date('Y');
            $routeratetracker->status = 1;
            $routeratetracker->createdBy = $user->name;
            $routeratetracker->save();


            $updateRoute = Route::where('id', $formulaYacho->route )->update([

                'rate' => $result,
            ]);

        }

            return back()->with('success', 'Parameters updated and new rate have been set');
    

    }


    public function pdf(string $id)
    {
       
        $path = public_path('storage/contracts/' . $id);
       // dd(file_exists($path));
        if (file_exists($path)) {
            return Response::download($path, $id, ['Content-Type' => 'application/pdf']);
        } else {
            return back()->with('error', 'Could not down contract!');
        }
    }


    public function escalationFormula(Request $request)
    {
       // dd($request->costComponent);
       $user = auth()->user();
        $userrole = new Escalationformula();
        $userrole->costComponent = $request->costComponent;
        $userrole->weightage = $request->weightage/100;
        $userrole->indexSourceTable = $request->indexSourceTable;
        $userrole->baseIndices = $request->baseIndices;
        $userrole->baseDate = $request->baseDate;
        $userrole->endIndices =  '190.4';
        $userrole->frequency = $request->frequency;
        $userrole->contract = $request->contract;
        $userrole->createdBy = $request->createdBy;
        $userrole->createdBy = $user->name;
        $userrole->save();

        if($userrole){

            return back()->with('success', 'Parameter created!');
        }
          return back()->with('error', 'Failed to create parameter!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function routeEdit(string $id)
    {
        $route = Route::where('id',$id)->first();
        $forecast = Monthlyforecast::where('route', $id)->get();
      //  dd($routes);
        return view('contracts.routeEdit', compact('route', 'forecast'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
