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
                                <li class="breadcrumb-item"><a href="#">Scheduling</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Confirmed Schedule for  {{ now()->day }} {{ now()->format('F') }} {{ now()->year }}</li>
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
                          
                            <th>From</th>
                            <th>To</th>
                            <th>Activity</th>
                            <th>Type</th>
                            <th>Category</th>                    
                            <th>Rate</th>
                     
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($routes as $route)                                         
                        <tr>
                     
                            <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $route->from }}</span></a></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $route->to }}</p></span></td>
                            <td><span class="inv-email"> {{ $route->activity }}</span></td>
                            <td> {{$route->Type}}</td>                                                                     
                            <td>
                            <span class="inv-amount">{{ $route->routeCategory }}</span>
                           </td>  
                            <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $route->rate }}</span></td>                          
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
                                   
                                        <th>Make</th>
                                        <th>Registration</th>
                                        <th>License Number</th>
                                        <th>Description</th>
                                        <th>Vin # </th>
                                        <th>Type</th>                    
                                        <th>Capacity</th>
                                  
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($routeplanassets as $asset)                                         
                                    <tr>
                                     
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
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            
                </div>
            
   </div>

   <div class="row" id="cancel-row">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                       
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>D.O.B</th>
                                        <th>License #</th>
                                        <th>Vehicle Type</th>                    
                                        <th>Phone Number</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($routeplandrivers as $asset)                                         
                                    <tr>
                                       
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
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            
                </div>
                <div  class="far-right-div">
                <a href=""  class="shadow-none badge badge-success"  data-original-title="Edit"><span class="shadow-none badge badge-success">Print Schedule</span></a>
               </div>
             
   </div>

   




@endsection




