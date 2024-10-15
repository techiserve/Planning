@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                               <!-- BREADCRUMB -->
                               <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">routes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Details</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div class="row invoice layout-top-spacing layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                            <div class="doc-container">
    
                                <div class="row">
                                    <div class="col-xl-9">
    
                                        <div class="invoice-content">
    
                                            <div class="invoice-detail-body">
    
                                                <div class="invoice-detail-title">
    
                                                    <div class="invoice-logo">
                                                        <div class="profile-image">

                                                            <!-- // The classic file input element we'll enhance
                                                            // to a file pond, we moved the configuration
                                                            // properties to JavaScript -->
                                        
                                                            <div class="invoice-title">
                                                        <input type="text" class="form-control" placeholder="Invoice Label" value="Update Route Record">
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>Route Details:</h4>
    
                                                            <form method="post" action="">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">From</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="make" id="company-name" placeholder="" value="{{$route->from}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">To</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="registration" id="company-email" placeholder="" value="{{$route->to}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Activity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="routeType" id="company-address" placeholder="" value="{{$route->activity}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Distance</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="commodity" id="company-phone" placeholder="" value="{{$route->distance}}">
                                                                    </div>
                                                                </div>
                                                                    
                                                                
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($route->status == 1)
                                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                                        @elseif($route->status == 2)
                                                                        <span class="badge badge-light-danger inv-status">Not Available</span> 
                                                                        @else
                                                                        <span class="badge badge-light-info inv-status">Ongoing</span>  
                                                                        @endif
                                                                 
                                                                    </div>
                                                                </div>                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Total Quantity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="duration" id="client-name" placeholder="" value="{{$route->totalQuantity}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Estimated Monthly Quantity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="effectiveDate" id="client-email" placeholder="" value="{{$route->estimatedmonthQuantity}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">Unit</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="createdBy" id="client-address" placeholder="" value="{{$route->unit}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Route Type</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyQuantity" id="client-phone" placeholder="" value="{{$route->Type}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Rate</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyVolume" id="client-phone"  value="{{$route->rate}}">
                                                                    </div>
                                                                </div> 
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                                <div class="invoice-detail-terms">
    
                 
                                               
                                             
                                            </div>
                                            
                                        </div>
                                        
                                    </div></br>
    
                                    <div class="col-xl-3">
                                    

                                                    <div class="col-xl-12 col-md-4">
                                                        <button type="submit" class="btn btn-success btn-download">Update route Record</button>
                                                    </div>
                                                   </form>
                                                
                                        
                                    </div>
                                </div></br></br>
                                
                                

                                <!-- Escalation formulas  -->
                                           
                               


                            </div>
                            </div>
    
                        </div>


                    </div>

                </div>
                <div class="card">   
                                             <div class="row">
                                          
                                              <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                     
                                                        <th scope="col">Month </th>
                                                        <th scope="col">Foreast</th>
                                                        <th class="text-center" scope="col">Description</th>
                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($forecast as $forecast)    
                                                    <tr>
                                                        <td>{{$forecast->month}}</td>                           
                                                        <td>{{$forecast->forecastValue}}</td>
                                                        <td>{{$forecast->description}}</td>                                        
                                                                                         
                                                    </tr>
                                                                                               
                                                </tbody>
                                                @endforeach
                                            </table>

                                           
                                            </div>
                                            </div>

            </div>

            <!--  BEGIN FOOTER  -->
           
            <!--  END FOOTER  -->
        </div>
@endsection