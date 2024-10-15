@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Contract</li>
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
                                    <form action="/planning/reassignasset/{{$asset->assetId}}" method="post" >
                                    @method('put')
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Re-assign Asset</h6>                              
    

                                                    <div class="row mt-4">
                                                  
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Make</label>
                                                                <input type="text" name="make"    value="{{$asset->make}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration</label>
                                                                <input type="text"  name="registration"  value="{{$asset->registration}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Vin Number</label>                                              
                                                                <input type="text"  name="vinNumber"   value="{{$asset->vinNumber}}" class="form-control" readonly>
                                                                                                                      
                                                            </div>
                                                        </div>    
                                                        
                                                        <input type="text" name="routeplan"  value="{{$asset->routeplanId}}"  class="form-control" hidden>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Asset Type</label>
                                                                <input type="text" name="assetType"    value="{{$asset->assetType}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number</label>
                                                                <input type="text"  name="licenseNumber"   value="{{$asset->licenseNumber}}" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Route</label>                                              
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                                                                                
                                                                   <select name="route" id="select-beast"  placeholder="Select a Route..." class="form-select">                                                                  
                                                                    @foreach ( $routes as $route)
                                                                    <option value="">Select a Route...</option>
                                                                    <option value="{{$route->id}}">@foreach ($contracts as $contract)  @if($contract->id == $route->contractId)  {{ $contract->client }} @endif    @endforeach: {{$route->from}} -  {{$route->to}}</option>                                                                                                       
                                                                    @endforeach
                                                                                                                           
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                                                                                      
                                                            </div>
                                                        </div>     
                                                
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary  float-end mt-3">Re-assign Asset</button>

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