@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Drivers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create A Driver</li>
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
                                    <form method="post"  id="assets" action="{{ route('drivers.store') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Driver Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" name="name" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Surname</label>
                                                                <input type="text" name="surname" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Group</label>
                                                                <input type="text" name="group"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date of birth</label>
                                                                <input type="date"  name="dob" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Gender</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="gender"  id="gender" class="form-select" >
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>                                                                                                                                                                
                                                                   </select>  
                                                                    </div>
                                                                </div>                                                                                                                                                                                                                         
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Route Type</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="routeType" class="form-select" >
                                                                   <option selected="">Choose...</option>
                                                                    <option value="short Haul">Short Haul</option>
                                                                    <option value="Medium Haul">Medium Haul</option>
                                                                    <option value="Long Haul">Long Haul</option>
                                                                    <option value="All">All</option>
                                                                                                                                                                     
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Expiration Date</label>
                                                                <input type="date"  name="licenseExpireDate"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number</label>
                                                                <input type="text" name="licenseNumber"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Vehicle Type</label>
                                                                <input type="text" name="vehicleType"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                
                                                </div>
                                            </div>
                                        </div>
                                                                                                                        
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Create Driver</button>
                                    </form>
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