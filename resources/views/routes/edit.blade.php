@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                               <!-- BREADCRUMB -->
                               <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Contracts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Route Details</li>
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
                                                       
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>Route Details:</h4>
    
                                                            <form method="post" action="/routes/update/{{$contract->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">From</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="from" id="company-name" placeholder="" value="{{$contract->from}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Activity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="activity" id="company-email" placeholder="" value="{{$contract->activity}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Distance</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="distance" id="company-address" placeholder="" value="{{$contract->distance}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Fuel Consumption</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="consumption" id="company-address" placeholder="" value="{{$contract->consumption}}">
                                                                    </div>
                                                                </div>
    
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">To</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="to" id="client-name" placeholder="" value="{{$contract->to}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Type</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="type" id="client-email" placeholder="" value="{{$contract->Type}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">Rate</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="rate" id="client-address" placeholder="" value="{{$contract->rate}}">
                                                                    </div>
                                                                </div>
    
                                                             
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                          
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
    
                                    <div class="col-xl-3">
                                    
                                        <div class="invoice-actions-btn">
    
                                            <div class="invoice-action-btn">
                                                
                                                <div class="row">
                                            
                                                    <div class="col-xl-12 col-md-4">
                                                        <button type="submit" class="btn btn-success btn-download">Update Route </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div></br>



                                
                                
                                

                                <!-- Escalation formulas  -->
                                
                            </div>
    
                           
                        </div>

                        
                    </div>

 
                
            </div>

            <!--  BEGIN FOOTER  -->
          
            <!--  END FOOTER  -->
        </div>
@endsection