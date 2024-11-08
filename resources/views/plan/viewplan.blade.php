@extends('template.default')
<style>
/* Apply this to the parent container */
.searchable-items.list {
    display: flex;
    flex-direction: column;
    max-height: 600px; /* Adjust the height as needed */
    overflow-y: auto;
    border: 1px solid #ddd; /* Optional: add a border around the scrollable area */
    border-radius: 10px;
}

/* Align the header and data rows uniformly */
.items-header-section, .items {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.items-header-section .item-content, .items .item-content {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}

.item-content > div {
    flex-basis: 14%; /* Adjust this percentage as per the required column width */
    text-align: left;
    padding: 5px;
}

/* Add margin to the .user-meta-info to create space between checkbox and text */
.user-profile {
    display: flex;
    align-items: center;
}

.user-meta-info {
    margin-left: 10px; /* Adjust this value as needed */
}

/* Make sure the columns inside the header and the rows line up */
.items-header-section h4, .items .user-meta-info p, .items .user-email p, .items .user-location p, .items .user-phone p, .items .action-btn input {
    margin: 0;
    padding: 0;
    text-align: left;
}

/* Specific width adjustments for each column */
.n-chk {
    flex-basis: 5%; /* Checkbox */
    text-align: center;
}

.user-profile, .user-email, .user-make ,.user-location, .user-phone, .action-btn, .user-status {
    flex-basis: 60%; /* Adjust the width of these columns as necessary */
}

.action-btn {
    flex-basis: 10%; /* Adjust for buttons if needed */
}

/* Styling for form inputs to match heights */
.items .form-control {
    height: 40px; /* Standardize the height */
    padding: 6px;
    font-size: 15px;
}
</style>
@section('content')
<div id="content" class="main-content ">

<div class="layout-px-spacing">
    <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Planning</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Plan</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                            <!-- BEGIN GLOBAL MANDATORY STYLES -->
                            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                        <div class="col-lg-12">
                            <div class="widget-content searchable-container list">
    
                           
                            <!--  -->
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="payment-history layout-spacing ">
                                <div class="widget-content widget-content-area">                             

                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="me-auto">
                                                <div class="fw-bold title">Route :</div>
                                                <p class="sub-title mb-0">{{$route->from}} to {{$route->to}}</p>
                                            </div>
                                            <span class="pay-pricing align-self-center me-3">{{$date->format('d F Y')}}</span>
                                            <div class="btn-group dropstart align-self-center" role="group">
                                               
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                            <!--  -->
                  

                          
                            <!--  -->

                            <div class="row">
                                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                                        <form class="form-inline my-2 my-lg-0">
                                            <div class="">
                                                <input type="text" class="form-control product-search" id="input-search" placeholder="Search Trucks...">
                                            </div>
                                        </form>
                                    </div>
    
                                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                                        <div class="d-flex justify-content-sm-end justify-content-center">
                                            <!-- <button type="submit" class="btn btn-primary" >Confirm Plan</button>  -->
                                         
                                        </div>
    
                                    
                                    </div>
                                </div>
    
                            <!--  -->



                            <form action="/plan/setplan" method="POST">
                            @csrf

                                <div class="searchable-items list">
                                    <div class="items items-header-section">
                                        <div class="item-content">
                                            <div class="d-inline-flex">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check form-check-primary me-0 mb-0">
                                                        <input class="form-check-input inbox-chkbox" id="contact-check-all" type="checkbox">
                                                    </div>
                                                </div>
                                                <h4 style="text-align: left; margin-left: 10;" >Make</h4>
                                            </div>
                                            
                                            <div class="user-email">
                                                <h4  style="text-align: left; margin-left: 3;">Asset Number</h4>
                                            </div>
                                            <div class="user-registration">
                                                <h4 style="margin-left: 0;">Registration</h4>
                                            </div>
                                            <div class="user-phone">
                                                <h4 style="margin-left: 3px;"># Trips Planned</h4>
                                            </div>                                        
                                            <div class="action-btn">
                                            <h4 style="margin-left: 3px;">Time</h4>
                                            </div>
                                            <div class="user-status">
                                            <h4 style="margin-left: 3px;">Status</h4>
                                        </div>
                                        </div>
                                    </div>
    
                                    @foreach($trucks as $truck)
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="user-profile">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check form-check-primary me-0 mb-0">
                                                        <input class="form-check-input inbox-chkbox contact-chkbox truck-checkbox" name="truck_ids[]" value="{{ $truck->id }}" type="checkbox">
                                                    </div>
                                                </div>
                                           
                                                
                                                <div class="user-meta-info">
                                                    <p class="user-name" data-name="Alan Green">{{$truck->make}}</p>
                                                    <p class="user-work" data-occupation="Web Developer">{{$truck->model}}</p>
                                                </div>
                                            </div>
                                            <div class="user-email">
                                                <p class="info-title">Email: </p>
                                                <p class="usr-email-addr" data-email="alan@mail.com">{{$truck->licenseNumber}}</p>
                                            </div>
                                            <div class="user-location">
                                                <p class="info-title">Registration: </p>
                                                <p class="usr-location" data-location="Boston, USA">{{$truck->registration}}</p>
                                            </div>
                                            <div class="user-phone">
                                                <p class="info-title">Phone: </p>
                                                <input class="form-control" name="nooftrips[]" type="number"  id="nooftrips-{{ $truck->id }}" disabled>
                                            </div>
                                           
                                            <div class="action-btn">
                                            <input class="form-control" name="times[]" type="text" id="times-{{ $truck->id }}" disabled>
                                            </div>
                                            <div class="user-status">
                                       
                                          <select name="status[]"  id="status-{{ $truck->id }}" class="form-select" disabled>

                                            @if ($truck->status == 1)
                                            <option value="1">Available</option> 
                                            @elseif ($truck->status == 2)
                                            <option value="2">Unavailable</option> 
                                            <option value="1">Available</option> 
                                            @else
                                            <option value="" selected>Choose Status</option>
                                            <option value="1">Available</option> 
                                            <option value="2">Unvailable</option>    
                                            @endif

                                                                                                                                                                                                                                                                                            
                                            </select>  
                                       
                                      
                                            </div>
                                            <input class="form-control" name="date" value="{{$date->format('Y-m-d') }}" type="hidden">
                                            <input class="form-control" name="route" value="{{$route->id }}" type="hidden">
                                            </div>
                                    </div>  
                                    @endforeach                                    
    
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-sm-end justify-content-center">
                                            <button type="submit" class="btn btn-primary" >Confirm Plan</button> 
                                         
                                        </div>
    
                    </form>

                               
</div>
</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>










