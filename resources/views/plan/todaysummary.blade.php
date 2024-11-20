@extends('template.default')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                                <li class="breadcrumb-item active" aria-current="page">Summary</li>
                            </ol>
                        </nav>
                    </div></br>
                    <!-- /BREADCRUMB -->
                    <form class="row-6"  method="post"  action="{{ route('summary.filter') }}">
                    @csrf   
    
                    
                    <div class="row g-3">
                    <div class="col-sm-4">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref" name="route">
                        <option value="" selected>Choose Route</option>
                        @foreach ($routes as $route)
                        <option value="{{$route->from}} to {{$route->to}}">{{$route->from}} to {{$route->to}}</option>  
                        @endforeach
                       
                    </select>
                    </div>
                    <div class="col-sm-2">
                    <input type="date" class="form-control" id="rangeCalendarFlatpickr" placeholder="Start Date" name="startDate" aria-label="Start Date">
                    </div>
                    <div class="col-sm-2">
                    <input type="date" class="form-control" placeholder="End Date" name="endDate" aria-label="End Date">
                    </div>
                    <div class="col-sm">
                            <button type="submit" class="btn btn-success btn-lg">Filter</button>
                            <a href="/plan/activesummary" class="btn btn-primary btn-lg"> Active Summary</a>                    
                        </div>
                   </div>

                     
                    </form>
    
    <div class="row" id="cancel-row">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="style-3" class="table style-3 dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Route</th>
                            <th>Product</th>
                            <th>Loading Number</th>
                            <th>Total Trips</th>
                            <th>Total Trucks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($planDetails  as $details)   
                        
                        <tr>
                            <td><span class="inv-">{{ $details->date }}</span></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $details->route }}</p></span></td>
                            <td><span class="inv-email"> {{ $details->product }}</span></td>
                            <td><span class="in-status">{{ $details->loadingNumber }}</span></td> 
                            <td><span class="inv-email"> {{ $details->total_trips }}</span></td>
                            <td><span class="in-status">{{ $details->total_trucks }}</span></td>                                                                                                   
                            <td>
                            <a href="/plan/downloadpdf/{{$details->plan_id}}" class="btn btn-success btn-md">Download Plan</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#truckModal-{{ $loop->index }}">
                             View Trucks
                            </button>  
                            <a href="/plan/delete/{{$details->id}}" class="btn btn-danger btn-md">Delete</a> 
                            
                                       <!-- Modal -->
                    <div class="modal fade" id="truckModal-{{ $loop->index }}" tabindex="-1" aria-labelledby="truckModalLabel-{{ $loop->index }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="truckModalLabel-{{ $loop->index }}">Trucks for {{ $details->date }} ({{ $details->route }})</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Truck</th>
                                                <th>Make</th>
                                                <th>Model</th>
                                                <th>License Number</th>
                                                <th>Driver Name</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($trucks as $truck)
                                                @if($truck->date == $details->date && $truck->route == $details->route)
                                                <tr>
                                                    <td>{{ $truck->registration }}</td>
                                                    <td>{{ $truck->make }}</td>
                                                    <td>{{ $truck->model }}</td>
                                                    <td>{{ $truck->licenseNumber }}</td>
                                                    <td>{{ $truck->name }} {{ $truck->surname }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
    mode: "range"
});
</script>










