@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Assignments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contracts and Assignment Summary</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                         
                    <div class="account-settings-container layout-top-spacing">
    
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                 

                                </div>
                            </div>
    
                            <div class="tab-content" id="animateLineContent-4">
                            
                                <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                    <div class="row">
                                    <form method="post"  id="assets" action="">
                                      @csrf   
               
    
                                      <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Contract Tonnage Capability</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Capable Tonnage</label>
                                                                <input type="text" name="make" class="form-control add-billing-address-input" value="{{$capability}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Forecast Monthly Volume</label>
                                                                <input type="text" name="registration" class="form-control"  value="{{$totalmothlyforecast}}" readonly>
                                                            </div>
                                                        </div>
                                             
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Required Monthly Quantity</label>
                                                                <input type="text"  name="vinNumber" class="form-control"   value="{{$contract->requiredMonthlyVolume}}" disabled>
                                                            </div>
                                                        </div>
                                                                                                                                                          
                                                </div>
                                            </div>
                                        </div>
                                            </br>




                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Contract Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Service Provider</label>
                                                                <input type="text" name="make" value="{{$contract->provider}}" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Client</label>
                                                                <input type="text" name="registration" value="{{$contract->client}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contract Value</label>
                                                                <input type="text" name="model"  value="{{$contract->contractValue}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Duration</label>
                                                                <input type="text"  name="vinNumber" value="{{$contract->duration}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Commodity</label>
                                                            <input type="text"  name="vinNumber" value="{{$contract->commodity}}" class="form-control">
                                                                </div>                                                                                                                                                                                                                         
                                                            </div>
                                                        </div>



                                                     
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                           
                                  <!-- Routes -->
                         
                                       
                                   <h6 class="">Routes</h6>                                     
    
                        <div class="col-lg-12" id="routes" >
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-2" class="table style-2 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column dt-no-sorting"> Record Id </th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Activity</th>
                                                <th>Distance(Km)</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Status</th>                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($routes as $route)

                                            <tr>
                                                <td class="text-center">
                                               <input type="checkbox" name="routesIds[]" value="{{ $route->id }}">
                                               </td>
                                                <td>{{$route->from}}</td>
                                                <td>{{$route->to}}</td>
                                                <td>{{$route->activity}}</td>
                                                <td>{{number_format($route->distance, 2)}}</td>
                                                <td>{{$route->Type}}</td>
                                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                            </tr>
                                          
                                            @endforeach
                                    
                                        
                                                                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                   
                    


                    <!-- Assets -->
                                    
                                    <h6 class="">Assets</h6>                                     
                    
                    <div class="col-lg-12" id="assets" >
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="style-1" class="table style-2 dt-table-hover">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column dt-no-sorting"> Record Id </th>
                                            <th>Make</th>
                                            <th class="text-center">Model</th>
                                            <th>Registration</th>
                                            <th>Type</th>
                                            <th>Capacity</th>                          
                                            <th class="text-center">Status</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $assets as $asset)
                                        <tr>
                                            <td class="text-center">
                                            <input type="checkbox"  name="assetIds[]" value="{{ $asset->id }}">
                                            </td>
                                            <td class="text-center">{{$asset->make}}</td>
                                            <td class="text-center">{{$asset->model}}</td>
                                            <td class="text-center">{{$asset->registration}}</td>
                                            <td class="text-center">{{$asset->assetType}}</td>
                                            <td class="text-center">{{$asset->payloadCapacity}}</td>
                                            <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                        </tr> 
                                        @endforeach                                                                                                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              
                                          
                                    
                                       
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

  
@endsection
