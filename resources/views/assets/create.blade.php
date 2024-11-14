@extends('template.default')
<style>
        .hidden {
            display: none;
        }
    </style>
@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Assets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create An Asset</li>
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
                                    <form method="post"  id="assets" action="{{ route('assets.store') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Asset Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Make</label>
                                                                <input type="text" id="make" name="make"  value="{{ old('make') }}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Asset Number</label>
                                                                <input type="text" name="registration" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Model</label>
                                                                <input type="text" name="model"  class="form-control">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Expiration Date</label>
                                                                <input type="date"  name="registrationExpireDate"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Number</label>
                                                                <input type="text" name="licenseNumber"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                   
                                                    </div>
                                                    

                                                
                                                </div>
                                            </div>
                                        </div>
    
                                        
                                        <div class=""  id="" >
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Trailer 1</h6>                                     
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Asset Number</label>  
                                                                <input type="text"  name="assetnumber1" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Registration Number </label>  
                                                                <input type="text"  name="regNumber1" class="form-control">
                                                            </div>
                                                        </div>
                                                 
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Expiration Date</label>
                                                                <input type="date"  name="regexpdate1"  class="form-control">
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                           
                                        </div><br/>


                                                       
                                        <div class=""  id="" >
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Trailer 2</h6>                                     
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Asset Number</label>  
                                                                <input type="text"  name="assetnumber2" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Registration Number </label>  
                                                                <input type="text"  name="regNumber2" class="form-control">
                                                            </div>
                                                        </div>
                                                 
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Expiration Date</label>
                                                                <input type="date"  name="regexpdate2"  class="form-control">
                                                            </div>
                                                        </div>
                                            
                                            
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                           
                                        </div>


                                        <div class="hidden"  id="trailerform">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Trailer Details</h6>                                     
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Trailer Type</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="trailerType" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Dump">Dump</option>
                                                                    <option value="Tanker">Tanker</option>
                                                                    <option value="Intermodal">Intermodal</option>                                                                                                              
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                         <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Payload Capacity</label>
                                                                <input type="text" name="payloadCapacity"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                                                                      
                                                    </div>
    
                                                  
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Create Asset</button>
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

            <script>
                function toggleFields() {
                    var assetType = document.getElementById('assetType');
                    var truckform = document.getElementById('truckform');
                    var trailerform = document.getElementById('trailerform');
                 
                    // Reset all fields to hidden
                    truckform.classList.add('hidden');
                    trailerform.classList.add('hidden');
           

                    // Show the selected field based on the option
                    if (assetType.value === 'Horse') {
                        truckform.classList.remove('hidden');
                    } else  
                    {
                        trailerform.classList.remove('hidden');
                    }                     
                 
                }
            </script>
   

            <!--  BEGIN FOOTER  -->
           
            <!--  END FOOTER  -->
            
        </div>
@endsection