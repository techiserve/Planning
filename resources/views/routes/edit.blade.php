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
                                <li class="breadcrumb-item active" aria-current="page">Update Contract Details</li>
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
    
                                                            <h4>Contract Details:</h4>
    
                                                            <form method="post" action="/contracts/update/{{$contract->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="make" id="company-name" placeholder="" value="{{$contract->number}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Provider</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="registration" id="company-email" placeholder="" value="{{$contract->provider}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Client</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="contractType" id="company-address" placeholder="" value="{{$contract->client}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Product</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="commodity" id="company-phone" placeholder="" value="{{$contract->commodity}}">
                                                                    </div>
                                                                </div>
                                                                    
                                                                
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($contract->status == 1)
                                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                                        @elseif($contract->status == 2)
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
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Duration</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="duration" id="client-name" placeholder="" value="{{$contract->duration}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Effective Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" class="form-control form-control-sm" name="effectiveDate" id="client-email" placeholder="" value="{{$contract->effectiveDate}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Distance</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="createdBy" id="client-address" placeholder="" value="{{$contract->requiredMonthlyDistance}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Quantity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyQuantity" id="client-phone" placeholder="" value="{{$contract->requiredMonthlyQuantity}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Volume</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyVolume" id="client-phone"  value="{{$contract->requiredMonthlyVolume}}">
                                                                    </div>
                                                                </div> 
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                                <div class="invoice-detail-terms">
                  
                                                <div class="row justify-content-between">
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="number">Forecast Monthly Volume</label>
                                                                <input type="text" class="form-control form-control-sm" name="mileage" id="number" placeholder="#0001" value="{{$contract->forecastMonthlyVolume}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="date">Forecast Weekly Volume</label>
                                                                <input type="text" class="form-control form-control-sm"  name="fueltype" id="date" placeholder="Add date picker" value="{{$contract->forecastWeeklyVolume}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Forecast Daily Volume</label>
                                                                <input type="text" class="form-control form-control-sm"  name="registrationExpireDate" id="due" placeholder="None" value="{{$contract->forecastDailyVolume}}">
                                                            </div>       
                                                        </div> 
                                                    </div>  

                                                    <div class="row justify-content-between">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group mb-4">
                                                            <label class="form-label">Upload Contract</label>                                              
                                                            <input type="file" id="contractImage" name="contractImage" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-4">
                                                        <a href="{{ url('/download-pdf/'. $contract->image) }}" class="btn btn-primary btn-send">Download Contract</a>
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
                                                        <button type="submit" class="btn btn-success btn-download">Update contract Record</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div></br>



                                
                                
                                

                                <!-- Escalation formulas  -->
                                             <div class="card">   
                                             <div class="row">
                                             <form action="/contracts/updateformula/{{$contract->id}}"   method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="_method" value="put">
                                              <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="checkbox-area" scope="col">
                                                            <div class="form-check form-check-primary">
                                                                <input class="form-check-input" id="hover_parent_all" type="checkbox">
                                                            </div>
                                                        </th>
                                                        <th scope="col">Component</th>
                                                        <th scope="col">Weightage(%)</th>
                                                        <th class="text-center" scope="col">End Indicies</th>
                                                        <th class="text-center" scope="col">End Date</th>
                                                        <th class="text-center" scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($escalationformulas as $formula)    
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-primary">
                                                            <input type="checkbox" id="select" name="formulaIds[]" value="{{ $formula->id }}"  >
                                                            </div>
                                                        </td>
                            
                                                        <td> <input type="text" class="form-control form-control-sm" name="costComponents[]" value="{{$formula->costComponent}}" readonly> </td>
                                                        <td>
                                    
                                                            <span class="table-inner-text">{{ $formula->weightage * 100}}</span>
                                                        </td>                                        
                                                        <td> <input type="text" class="form-control form-control-sm" name="endIndices[]" value="{{number_format($formula->baseIndices, 1)}}" > </td>
                                                        <td> <input type="date" class="form-control form-control-sm" name="endDates[]" value="{{$formula->endDate}}" > </td>
                                                        <td class="text-center">{{$formula->frequency}}</td>
                                                    </tr>
                                                                                               
                                                </tbody>
                                                @endforeach
                                            </table>

                                            <div class="modal-footer">                   
                                                <button type="submit" class="btn btn-primary">Update Parameter(s)</button>
                                            </div>
                                            </form>
                                            </div>
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
                
            </div>

            <!--  BEGIN FOOTER  -->
          
            <!--  END FOOTER  -->
        </div>
@endsection