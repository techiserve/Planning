@extends('template.default')

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
                                <li class="breadcrumb-item"><a href="#">Planning</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Route Plans</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

    
    <div class="row" id="cancel-row" style="width:110%">
                    
        <div class="col-xl-14 col-lg-14 col-sm-14 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" >
                    <thead>
                        <tr> 
                          <th></th>                       
                            <th>Contract</th>
                            <th>From</th>
                            <th>To</th>                       
                            <th>Distance</th>
                            <th>Type</th> 
                            <th>Rate</th>   
                            <th>Contract Vol</th> 
                            <th>Monthly Contract Vol</th> 
                            <th>Forecast Vol</th>    
                            <th>Possible Vol</th>                                         
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($allroutes as $route)                                         
                        <tr>
                             
                         <td>
                            <span>{{ $route->from }}</span>
                            </td>
                            <td>
                            @foreach ($contracts as $contract)  
                            @if($contract->id == $route->contractId)<span class="inv-amount"> {{ $contract->client }}</span> @endif  
                            @endforeach
                            </td> 
                           
                            <td>
                            <span>{{ $route->from }}</span>
                            </td> 
                            <td>
                            <span>{{ $route->to }}</span>
                           </td> 
                           <td>
                            <span>{{ number_format($route->distance, 2) }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->Type }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->rate }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->totalQuantity }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->totalforecast }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->monthlyforecast }}</span>
                           </td> 
                           <td>
                            <span>{{ $route->capacity }}</span>
                           </td> 
                            
                            <td>
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/planning/showrouteplan/{{$route->route}}">More Details</a>                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



   </div>

@endsection











