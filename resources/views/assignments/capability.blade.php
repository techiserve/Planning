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
                                <li class="breadcrumb-item active" aria-current="page">Create an asset</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                         
                    <div class="account-settings-container layout-top-spacing">
    
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h2>Assignments</h2>

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
                                                                <input type="text" name="make" class="form-control add-billing-address-input" value="{{$totalTonCapacity}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Forecast Monthly Volume</label>
                                                                <input type="text" name="registration" class="form-control"  value="{{$totalrequiredMonthlyVolume}}" readonly>
                                                            </div>
                                                        </div>
                                             
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Required Monthly Quantity</label>
                                                                <input type="text"  name="vinNumber" class="form-control"   value="{{$totalforecastMonthlyVolume}}" disabled>
                                                            </div>
                                                        </div>
                                                                                                                                                          
                                                </div>
                                            </div>
                                        </div>
                                            </br>

                                        
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

  
@endsection
