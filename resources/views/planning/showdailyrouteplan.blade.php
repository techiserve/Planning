@extends('template.default')
<style>
        .far-right-div {
            position: absolute;
            right: 90;
        }
    </style>
@section('content')

<div id="content" class="main-content ">

<div class="layout-px-spacing">
                        <div class="middle-content container-xxl p-0">
                            <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <!-- END GLOBAL MANDATORY STYLES -->
         
                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Planning</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Daily Plan for this Route for  {{ now()->day }} {{ now()->format('F') }} {{ now()->year }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

    
    <div class="row" id="cancel-row">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                <thead>
                        <tr>                        
                            <th>Contract</th>
                            <th>From</th>
                            <th>To</th>                       
                            <th>Distance</th>
                            <th>Type</th> 
                            <th>Rate</th>   
                            <th>Contract Vol</th> 
                            <th>Monthly Contract Vol</th> 
                            <th>Forecast Vol</th>    
                            <th>Possible Vol</th>                                         
                            <th>Variance</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($routes as $route)                                         
                        <tr>
                               
                           <td>
                            <span>{{ $route->Type }}</span>
                            </td> 
                           
                            <td>
                            <span>{{ $route->from }}</span>
                            </td> 
                            <td>
                            <span>{{ $route->to }}</span>
                           </td> 
                           <td>
                            <span>{{ number_format($route->distance, 2) }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->Type }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->rate }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->totalQuantity }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->totalforecast }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->monthlyforecast }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->capacity }}</span>
                           </td> 
                            
                            <td>
                                @if ($route->monthlyforecast == 0)
                                <span>{{$route->totalforecast -  $route->capacity }}</span>        
                                @else
                                <span>{{$route->monthlyforecast - $route->capacity }}</span>      
                                @endif                                       
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="row" id="cancel-row">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Make</th>
                                        <th>Registration</th>
                                        <th>License Number</th>
                                        <th>Description</th>
                                        <th>Vin # </th>
                                        <th>Type</th>                    
                                        <th>Capacity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($routeplanassets as $asset)                                         
                                    <tr>
                                        <td class="checkbox-column"> <input type="checkbox"  name="assetIds[]" value="{{ $asset->id }}"> </td>
                                        <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $asset->make }}</span></a></td>
                                     
                                        <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->registration }}</p></span></td>
                                        <td><span class="inv-email"> {{ $asset->licenseNumber }}</span></td>
                                        <td>
                                        <span class="badge badge-light-info inv-status">{{$asset->assetDescription}}</span>                                      
                                         </td>  
                                           
                                         <td>
                                        <span class="inv-amount">{{ $asset->vinNumber }}</span>
                                       </td> 
                                        <td>
                                        <span class="inv-amount">{{ $asset->assetType }}</span>
                                       </td>  
                                        <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $asset->payloadCapacity }}</span></td>
                                        <td>
                                        <a href="/planning/editroutemonthlyplanasset/{{$asset->id}}" class="btn btn-danger" data-confirm-delete="true">Remove Asset</a>
                                        <a href="/planning/reassignroutemonthlyplanasset/{{$asset->assetId}}" class="btn btn-info" >Re-assign Asset</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            
                </div>

                <div class="row" id="cancel-row">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>D.O.B</th>
                                        <th>License #</th>
                                        <th>Vehicle Type</th>                    
                                        <th>Phone Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($routeplandrivers as $asset)                                         
                                    <tr>
                                        <td class="checkbox-column"> <input type="checkbox"  name="assetIds[]" value="{{ $asset->id }}"></td>
                                        <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $asset->name }}</span></a></td>
                                     
                                        <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->surname }}</p></span></td>
                                        <td><span class="inv-email"> {{ $asset->dob }}</span></td>
                                        <td>
                                        <span class="badge badge-light-info inv-status">{{$asset->licenseNumber}}</span>                                         
                                         </td>  
                                                                                  
                                        <td>
                                        <span class="inv-amount">{{ $asset->vehicleType }}</span>
                                       </td>  
                                        <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $asset->phoneNumber }}</span></td>
                                        <td>
                                           
                                        <a href="/planning/editroutemonthlyplandriver/{{ $asset->id }}" class="btn btn-danger" data-confirm-delete="true">Remove Driver</a>
                                                                     
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            
                </div>
          
                <div  class="far-right-div">
                <a href="/planning/confirmplan/{{$routeplan->id}}"  class="shadow-none badge badge-success"  data-original-title="Edit"><span class="shadow-none badge badge-success">Confirm Final Plan</span></a>
               </div>
   </div>
            
   </div>

  

   




@endsection




