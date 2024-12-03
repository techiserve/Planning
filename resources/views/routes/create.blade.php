@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Routes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Route</li>
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
                                    <form action="{{ route('contracts.routeStore') }}" method="post" enctype="multipart/form-data">
                                    @method('POST')
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Route Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">From</label>
                                                                <input type="text" id="from"  name="from" value="{{ old('from') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">To</label>
                                                                <input type="text"  id="to" name="to"  value="{{ old('to') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Activity</label>
                                                                <input type="text"  id="activity" name="activity"  value="{{ old('activity') }}"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Distance</label>
                                                                <input type="text"  id="distance" name="distance" value="{{ old('distance') }}"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Rate</label>                                              
                                                                <input type="text"  id="rate"  name="rate" value="{{ old('rate') }}"  class="form-control">
                                                                                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Fuel Consumption</label>                                              
                                                                <input type="text"  id="consumption"  name="consumption" value="{{ old('consumption') }}"  class="form-control">
                                                                                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Category</label>
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
                                                       

                                                    <div class="row mt-4">
                                                  
                                                       

                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Create Route</button>

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
