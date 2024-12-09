@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                               <!-- BREADCRUMB -->
                               <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Assets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Status</li>
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
                                                        <input type="text" class="form-control" placeholder="Invoice Label" value="Update Asset Record">
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>Asset Details:</h4>
    
                                                            <form method="post" action="/assets/update/{{$asset->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Make</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="make" id="company-name" placeholder="" value="{{$asset->make}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Asset #</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="licenseNumber" id="company-email" placeholder="" value="{{$asset->licenseNumber}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Asset Type</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="model" id="company-address" placeholder="" value="{{$asset->model}}">
                                                                    </div>
                                                                </div>
    
                                                                    
                                                                
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($asset->status == 1)
                                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                                        @elseif($asset->status == 2)
                                                                        <span class="badge badge-light-danger inv-status">Not Available</span> 
                                                                        @else
                                                                        <span class="badge badge-light-info inv-status">Not Assigned</span>  
                                                                        @endif
                                                                 
                                                                    </div>
                                                                </div>                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Reg Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="registration" id="client-name" placeholder="" value="{{$asset->registration}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm"> License Exp Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" class="form-control form-control-sm" name="registrationExpireDate" id="client-email" placeholder="" value="{{$asset->registrationExpireDate}}">
                                                                    </div>
                                                                </div>
      
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Status Reason</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="statusReason" id="client-phone"  value="{{$asset->statusReason}}">
                                                                    </div>
                                                                </div> 
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                                <div class="invoice-detail-terms">
    
                                               
                                                <div class="row justify-content-between">
                                                <h6>Trailer 1 Details:</h6>
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="number">Asset Number</label>
                                                                <input type="text" class="form-control form-control-sm" name="asset1" id="number" placeholder="" value="{{$asset->assetnumber1}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="date">Registration Number </label>
                                                                <input type="text" class="form-control form-control-sm"  name="reg1" id="date" placeholder="" value="{{$asset->regNumber1}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Registration Expiration Date</label>
                                                                <input type="date" class="form-control form-control-sm"  name="exp1" id="due" placeholder="None" value="{{$asset->regexpdate1}}">
                                                            </div>       
                                                        </div> 
                                                    </div>  

                                                    <div class="row justify-content-between">
                                                    <h6>Trailer 2 Details:</h6>
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="number">Asset Number</label>
                                                                <input type="text" class="form-control form-control-sm" name="asset2" id="number"  value="{{$asset->assetnumber2}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="date">Registration Number </label>
                                                                <input type="text" class="form-control form-control-sm"  name="reg2" id="date"  value="{{$asset->regNumber2}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Registration Expiration Date</label>
                                                                <input type="date" class="form-control form-control-sm"  name="exp2" id="due" value="{{$asset->regexpdate2 }}">
                                                            </div>       
                                                        </div> 
                                                    </div>  
                                             
                                               
                                                    
                                                </div>

                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
    
                                    <div class="col-xl-3">
                                        
                                        <div class="invoice-actions">
    
                                            <div class="invoice-action-currency">
                                            
                                                <div class="form-group mb-0">
                                                    <label>Status</label>
                                                    <div class="dropdown selectable-dropdown invoice-select">                              
                                                                    <select name="status" class="form-select"  />
                                                                    <option value="{{ $asset->status}}">Choose...</option>
                                                                    <option value="1">Available</option>
                                                                    <option value="2">Not Available</option>                                                                                                                                                                                                              
                                                                   </select>                               
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            <div class="invoice-action-tax">
                                            
                                                <h5>Reason for Change</h5>
    
                                                <div class="invoice-action-tax-fields">
    
                                                    <div class="row">
                                                
                                                        <div class="col-12">
    
                                                            <div class="form-group mb-0">
                                                            
                                                                <div class="dropdown selectable-dropdown invoice-select">
                                                                 
                                                          
                                                                    <select name="statusReason" class="form-select"  />
                                                                    <option value="">Choose...</option>
                                                                    <option value="Broken down">Broken down</option>
                                                                    <option value="Under Maintenance">Under Maintenance</option>
                                                                    <option value="Involved in Accident">Involved in Accident</option> 
                                                                    <option value="Repaired">Repaired</option>                                                                                                                 
                                                                   </select>  
                                                                 
                                                                </div>
    
                                                            </div>
    
                                                        </div>
                                                   
                                                    </div>
                                                </div>
    
                                            </div> 
    
                                        </div>
    
                                        <div class="invoice-actions-btn">
    
                                            <div class="invoice-action-btn">
                                                
                                                <div class="row">
                                            
                                                    <div class="col-xl-12 col-md-4">
                                                        <button type="submit" class="btn btn-success btn-download">Update Asset Record</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
    
                        </div>
                    </div>

                </div>
                
            </div>

            <!--  BEGIN FOOTER  -->
           
            <!--  END FOOTER  -->
        </div>
@endsection