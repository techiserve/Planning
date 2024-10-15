@extends('template.default')

@section('content')
 <div id="content" class="main-content">


 
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Contract</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Parameters</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->



                    <div class="row layout-top-spacing">
                    
                        
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Routes</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                    <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormModal">Create a Route</a>
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputroutetableModal">View all Routes </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>  
                  
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Escalation Formula</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                    <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addparameter">Add a Parameter</a>
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#allparameters">View all Parameters </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>                

                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Formulas</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">                                                
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#allformulas">View All Formula</a>      
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormulaModal">Create a Formula</a>                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                   

                                   
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank" href="https://https://techiserve.com">TechIServe</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Powered by <a target="_blank" href="https://techiserve.com"><b>TechIServe</b></a></p>
                </div>         
            </div>
            <!--  END FOOTER  -->
        </div>        
        </div>
                        
        

                                    <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">Create a <b>Route</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">
                                                <form  method="post" action="{{ route('contracts.routeStore') }}"class="mt-0">
                                                @csrf  
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                           
                                                            </span>
                                                            <input type="text"  name="from" class="form-control" placeholder="From" aria-label="name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="to" class="form-control" placeholder="To" aria-label="password">
                                                        </div>
                                                    </div>   
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                   
                                                            </span>
                                                            <input type="text" name="activity" class="form-control" placeholder="Activity" aria-label="password">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="distance" class="form-control" placeholder="Distance" aria-label="password">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="rate" class="form-control" placeholder="Rate" aria-label="password">
                                                        </div>
                                                    </div> 
                                              

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">                                         
                                                            </span>
                                                            <input type="text" name="totalQuantity" class="form-control" placeholder="Total Forecast Quantity" aria-label="password">
                                                        </div>
                                                    </div> 

                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">                                            
                                                            </span>
                                                            <input type="text" name="monthQuantity" class="form-control" placeholder="Forecast monthly Quantity" aria-label="password">
                                                        </div>
                                                    </div>                                      
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="contract" class="form-select">
                                                                    <option selected="">Choose Contract</option>
                                                                    @foreach ($contracts as $contract)  
                                                                    <option value="{{ $contract->id }}">{{$contract->provider}} - {{$contract->client}} - {{ $contract->number}} </option>
                                                                    @endforeach                                                                                                                                                                             
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="routeCategory" class="form-select">
                                                                    <option selected="">Choose Type</option>
                                                                    <option value="Standard">Standard</option>
                                                                    <option value="Adhoc">Adhoc</option>
                                                                                                                                                                            
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="type" class="form-select">
                                                                    <option selected="">Choose Category</option>
                                                                    <option value="Less than 1km">Less than 1km</option>
                                                                    <option value="Short Haul">Short Haul</option>
                                                                    <option value="Medium Haul">Medium Haul</option>  
                                                                    <option value="Long Haul">Long Haul</option>                                                                                                                  
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div>
  
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Create Route</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>


                                    <div class="modal fade inputForm-modal" id="addparameter" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="addparameter">
                                                <h5 class="modal-title">Create a <b>Parameter</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">
                                                <form  method="post" action="{{ route('contracts.escalationFormula') }}"class="mt-0">
                                                @csrf  
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                        <div class="input-group mb-3">                                                           
                                                           <select name="costComponent" class="form-select">
                                                           <option selected="">Choose Cost Component</option>
                                                           <option value="Labour">Labour</option>
                                                           <option value="Fuel (Diesel)">Fuel (Diesel)</option>  
                                                           <option value="Capital Cost">Capital Cost</option>
                                                           <option value="Repair & Maintenance">Repair & Maintenance </option>    
                                                           <option value="Other Cost ">Other Cost </option>
                                                           <option value="Fixed">Fixed</option>                                                                                                                                                                   
                                                          </select>  
                                                         
                                                       </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="weightage" class="form-control" placeholder="Weightage (%)" aria-label="password">
                                                        </div>
                                                    </div>   
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                   
                                                            </span>
                                                            <input type="text" name="indexSourceTable" class="form-control" placeholder="Index Source Table" aria-label="password">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="baseIndices" class="form-control" placeholder="Base Indices" aria-label="password">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="date" name="baseDate" class="form-control" placeholder="Base Date" aria-label="password">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                    <div class="input-group mb-3">                                                           
                                                           <select name="frequency" class="form-select">
                                                           <option selected="">Choose Frequency</option>
                                                           <option value="Monthly">Monthly</option>
                                                           <option value="Annually">Annually</option>                                                                                                                                                                 
                                                          </select>  
                                                         
                                                       </div>
                                                    </div> 
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="contract" class="form-select">
                                                                    <option selected="">Choose Contract</option>
                                                                    @foreach ($contracts as $contract)  
                                                                    <option value="{{ $contract->id }}">{{$contract->provider}} - {{$contract->client}} - {{ $contract->number}} </option>
                                                                    @endforeach                                                                                                                                                                             
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div> 
                                                                                     
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Create Parameter</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                                 
                                    <!-- <div class="modal fade bd-example-modal-lg"  id="inputFormulaModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" id="inputFormModalLabel">



                                                <h5 class="modal-title">Create a <b>Formula</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">



                                            <h2>Complex Calculator</h2>

                                                <form action="{{ route('contracts.formulaStores') }}" method="post">
                                                    @csrf

                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                            <div id="operands-container">
                                                        <div class="operand">
                                                            <label for="numbers[]">Number:</label>
                                                            <select name="numbers[]"  class="form-control" required>
                                                                <option value="Old Rate">Old Rate</option>
                                                                <option value="LabourIndexattheenddate">Labour Index at the end date</option>
                                                                <option value="LabourIndexatthebasedate">Labour Index at the base date</option>
                                                                <option value=" FuelDieselIndexattheenddate"> Fuel (Diesel) Index at the end date</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-6">                                                            
                                                          
                                                    <div id="operations-container">
                                                        <div class="operation">
                                                            <label for="operations[]">Operation:</label>
                                                            <select name="operations[]"   class="form-control"  required>
                                                                <option value="add">Addition (+)</option>
                                                                <option value="subtract">Subtraction (-)</option>
                                                                <option value="multiply">Multiplication (*)</option>
                                                                <option value="divide">Division (/)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                 
                                              
                                                    </div>
                                                    
                                           
                                                    <button type="button" onclick="addOperand()">Add Operand</button>
                                                    <button type="button" onclick="addOperation()">Add Operation</button>

                                                    <button type="submit">Calculate</button>
                                                </form>

                                                <script>
                                                    function addOperand() {
                                                        var container = document.getElementById('operands-container');
                                                        var newOperand = document.createElement('div');
                                                        newOperand.innerHTML = '  <label for="numbers[]">Number:</label><select name="numbers[]"  class="form-control" required><option value="Old Rate">Old Rate</option> <option value="LabourIndexattheenddate">Labour Index at the end date</option> <option value="LabourIndexatthebasedate">Labour Index at the base date</option> <option value=" FuelDieselIndexattheenddate"> Fuel (Diesel) Index at the end date</option> </select>';
                                                        container.appendChild(newOperand);
                                                    }

                                                    function addOperation() {
                                                        var container = document.getElementById('operations-container');
                                                        var newOperation = document.createElement('div');
                                                        newOperation.innerHTML = '<label for="operations[]">Operation:</label><select name="operations[]"  class="form-control" required><option value="add">Addition (+)</option><option value="subtract">Subtraction (-)</option><option value="multiply">Multiplication (*)</option><option value="divide">Division (/)</option></select>';
                                                        container.appendChild(newOperation);
                                                    }
                                                </script>

                                      
                                          </div>
                                        </div>
                                    </div> -->
                         
                                    
                                    <div class="modal fade bd-example-modal-xl" tabindex="-1"  id="allformulas" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" id="allformulas">
                                                <h5 class="modal-title" id="allformulas">All Formulas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">                                                                       
                                            <div class="widget-content widget-content-area br-8">
                                                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="checkbox-column"> Record no. </th>
                                                            <th>Equation</th>
                                                            <th>Formula</th>
                                                            <th>Result</th>
                                                            <th>Route</th>                                            
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        @foreach ($formulas as $asset)                                         
                                                        <tr>
                                                            <td class="checkbox-column"> 1 </td>
                                                            <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $asset->equationString }}</span></a></td>
                                                        
                                                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->formula }}</p></span></td>
                                                            <td><span class="inv-email"> {{ number_format( $asset->result , 2) }}</span></td>
                                                            <td>
                                                            @foreach ($routes as $role)  
                                                             @if($role->id == $asset->route)<span class="inv-amount"> {{ $role->from }} - {{$role->to}}</span> @endif  
                                                             @endforeach
                                                            </td>                                                                                                  
                                                            <td>
                                                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/contracts/edit/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                                                <a class="badge badge-light-danger text-start action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>   
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    
                                    <div class="modal fade bd-example-modal-xl" tabindex="-1"  id="inputroutetableModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myExtraLargeModalLabel">All Routes</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">                                                                       
                                            <div class="widget-content widget-content-area br-8">
                                                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Source</th>
                                                            <th>Destination</th>
                                                            <th>Product</th>
                                                            <th>Status</th>
                                                            <th>Distance</th> 
                                                            <th>Contract</th>                                                           
                                                            <th>Rate</th>                 
                                                            <th>Category</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        @foreach ($routes as $asset)                                         
                                                        <tr>
                                
                                                            <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $asset->from }}</span></a></td>
                                                        
                                                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->to }}</p></span></td>
                                                            <td><span class="inv-email"> {{ $asset->activity }}</span></td>
                                                            <td>@if ($asset->activity == 1)
                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                            @elseif ($asset->activity == 2)
                                                            <span class="badge badge-light-danger inv-status">Not Available</span>   
                                                            @else
                                                            <span class="badge badge-light-success inv-status">Active</span>   
                                                            @endif
                                                            </td>                                           
                                                            <td>
                                                            <span class="inv-amount">{{ number_format($asset->distance, 2) }}</span>
                                                        </td>
                                                        <td>
                                                           @foreach ($contracts as $role)  
                                                           @if($role->id == $asset->contractId)<span class="inv-amount">{{ $role->client}}</span> @endif  
                                                           @endforeach
                                                        </td>

                                                        <td><span class="inv-date">{{  number_format($asset->rate, 2) }}</span></td>  
                                                            <td><span class="inv-date">{{ $asset->routeCategory }}</span></td>
                                                            <td>
                                                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/parameters/routeEdit/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/contracts/routeforecast/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                                                <a class="badge badge-light-danger text-start action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>   
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>


                                    <!-- This is for testing -->                                                    
                                     <div class="modal fade bd-example-modal-lg"  id="inputFormulaModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" id="inputFormModalLabel">
                                                <div class="modal-body">
                                                <h2>Commercial Formula</h2></br>

                                                    <form id="calculatorForm" action="{{ route('contracts.formulaStoress') }}" method="post">
                                                        @csrf

                                                        <div class="card" >
                                                        <div class="card-body" id="inputContainer">
                                                            <!-- Display the user input here -->
                                                            </div>
                                                        </div><br/>

                                                        <div class="card" style="width: 500px; height: 300px;  text-align: left; margin: auto;">
                                                        <div class="card-body" >
                                                        <button  class="btn btn-outline-primary mb-2 me-6 rounded bs-tooltip"  title="Old Rate" style="width:74px;" type="button" onclick="addToInput('OR')">OR  </button>
                                                        <button  class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Labour Index at the end date" type="button" style="width:74px;"onclick="addToInput('L1')">L1</button>
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Labour Index at the base date" type="button" style="width:74px;"onclick="addToInput('L0')">L0</button>
                                                       
                                                        <button  class="btn btn-outline-primary mb-2 me-  rounded bs-tooltip" title="Repair and Maintenance Index at the end date" type="button" onclick="addToInput('RM1')">RM1</button></br>
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Fuel Diesel Index at the base date"type="button" style="width:78px;" onclick="addToInput('F0')">F0</button>
                                                        <button  class="btn btn-outline-primary mb-2 me-  rounded bs-tooltip"  title="Capital Cost Index at the end date" type="button" onclick="addToInput('CC1')">CC1</button>
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Capital Cost Index at the base date" type="button" onclick="addToInput('CC0')">CC0</button>
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Fuel (Diesel) Index at the end date" type="button" style="width:78px;" onclick="addToInput('F1')">F1</button></br>
                                                     
                                                        <button  class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Repair and Maintenance Index at the base date" type="button"style="width:76px;" onclick="addToInput('RM0')">RM0</button>
                                                        <button class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Other Cost Index at the end date" type="button" style="width:76px;" onclick="addToInput('OC1')">OC1</button>
                                                        <button class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Other Cost Index at the base date" type="button" onclick="addToInput('OC0')">OC0</button>
                                                        <button class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Labour Weightage (%)" type="button" onclick="addToInput('L(%)')">L(%)</button></br>
             
                                                        <button  class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Fuel Weightage (%)" type="button" onclick="addToInput('F(%)')">F(%)</button>
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip"  title="Capital Weightage (%)"type="button" onclick="addToInput('C(%)')">C(%)</button> 
                                                        <button   class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Repair Weightage (%)" type="button" onclick="addToInput('R(%)')">R(%)</button>
                                                        <button  class="btn btn-outline-primary mb-2 me- rounded bs-tooltip" title="Other Cost Weightage (%)" type="button" onclick="addToInput('O(%)')">O(%)</button> </br>
                                                        <button class="btn btn-outline-dark mb-2 me-" type="button" onclick="addToInput('(')">(</button>                                         
                                                        <button  class="btn btn-outline-dark mb-2 me-"type="button" onclick="addToInput(')')">)</button>                                                     
                                                        <button  class="btn btn-outline-dark mb-2 me-"type="button" onclick="addToInput('/')">/</button>
                                                        <button  class="btn btn-outline-dark mb-2 me-"type="button" onclick="addToInput('*')">*</button>
                                                        <button  class="btn btn-outline-dark mb-2 me-"type="button" onclick="addToInput('-')">-</button>                                        
                                                        <button class="btn btn-outline-dark mb-2 me-" type="button" onclick="addToInput('+')">+</button>
                                                        </div>
                                                        </div>

                                                          </br>
                                                          </br>

                                                              <div class="form-group">
                                                                 <div class="input-group mb-3">                                                       
                                                                    <select name="contract" class="form-select" required>
                                                                    <option selected="">Choose Contract</option>
                                                                    @foreach ($contracts as $contract)  
                                                                    <option value="{{ $contract->id }}">{{$contract->provider}} - {{$contract->client}} - {{ $contract->number}} </option>
                                                                    @endforeach                                                                                                                                                                             
                                                                   </select>                                                                   
                                                                 </div>
                                                              </div> 

                                                        <button class="btn btn-outline-success mb-2 me-4" type="submit">Calculate</button>
                                                    </form>

                                            </div>
                                                                                       
                                        




                                          </div>
                                        </div>
                                    </div>


                                    
                                                    <script>
                                                        function addToInput(value) {
                                                            var inputContainer = document.getElementById('inputContainer');
                                                            var currentInput = document.createElement('span');
                                                            currentInput.textContent = value;
                                                            inputContainer.appendChild(currentInput);

                                                            // Also, update a hidden input field to send the values to the controller
                                                            var hiddenInput = document.createElement('input');
                                                            hiddenInput.type = 'hidden';
                                                            hiddenInput.name = 'userInput[]';
                                                            hiddenInput.value = value;
                                                            document.getElementById('calculatorForm').appendChild(hiddenInput);
                                                        }
                                                    </script>
@endsection