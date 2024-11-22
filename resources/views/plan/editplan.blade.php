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

.items-header-section {
    position: sticky;
    top: 0;
    background-color: #fff; /* Optional: background color to match page */
    z-index: 10; /* Ensure header stays above content */
    border-bottom: 2px solid #ddd; /* Optional: add a border under the header */
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
    
                            <div class="col-12">
    <div class="payment-history layout-spacing ">
        <div class="widget-content widget-content-area">
            <div class="list-group">

     

            </div>
        </div>
    </div>
</div>

                  
<div class="tab-content" id="animateLineContent-4">
                            
                            <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                <div class="row">
                                 <form action="/plan/planupdate/{{$plan->id}}" method="POST">
                                 @csrf 
                                 @method('put') 
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="section general-info payment-info">
                                            <div class="info">
                                                <h6 class="">Edit Plan Details</h6>                              

                                                <div class="row mt-4">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Client Name</label>
                                                            <input type="text" name="clientname" value="{{ $plan->name }}" class="form-control add-billing-address-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Route</label>  
                                                            <select class="form-select" id="inlineFormSelectPref" name="route">                                               
                                                            <option value="{{ $plan->routeId }}" selected>{{ $plan->route }}</option>
            
                                                            @foreach ($routes as $route)
                                                            <option value="{{$route->id}}">{{$route->from}} to {{$route->to}}</option>  
                                                            @endforeach
                                                        
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                              <label class="form-label">Start Date</label>
                                                              <input type="date"  name="date" value="{{ $plan->date }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date"  name="enddate"  value="{{ $plan->enddate }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                     
                                                        <label class="form-label">Loading Number</label>
                                                        <input type="text" name="loadingNumber"  value="{{ $plan->loadingNumber }}" maxlength="13" class="form-control add-payment-method-input">                                                                                                                                                                                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                     
                                                        <label class="form-label">Product</label>
                                                        <input type="text" name="product" value="{{ $plan->product }}"  maxlength="13" class="form-control add-payment-method-input">                                                                                                                                                                                                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                        <label class="form-label">Max Loads</label>
                                                        <input type="text" name="maxloads" value="{{ $plan->maxloads }}" class="form-control add-payment-method-input">  
                                                             
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    
                                                </div>
                                                

                                            
                                            </div>
                                        </div>
                                    </div>
                                                                                                                    
        
                       
                                </div>
                            </div>


                          
                            <!--  -->

                            <div class="row">
                                    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                                        <div class="form-inline my-2 my-lg-0">
                                            <div class="">
                                                <input type="text" class="form-control product-search" id="input-search" placeholder="Search Trucks...">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                                        <div class="d-flex justify-content-sm-end justify-content-center">
                                            <!-- <button type="submit" class="btn btn-primary" >Confirm Plan</button>  -->
                                         
                                        </div>
    
                                    
                                    </div>
                                </div>
    
                            <!--  -->



                           
                                <div class="searchable-items list">
                                    <div class="items items-header-section">
                                        <div class="item-content">
                                            <div class="d-inline-flex">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check form-check-primary me-0 mb-0">
     
                                                    </div>
                                                </div>
                                                <h4 style="text-align: left; margin-left: 10;" >Truck</h4>
                                            </div>                                                                 
                                            <div class="user-phone">
                                                <h4 style="margin-left: 30px;">Number of Loads</h4>
                                            </div>                                        
                                            <div class="action-btn">
                                            <h4 style="margin-left: 55px;">Time</h4>
                                            </div>    
                                        <div class="new-column">
                                            <h4 style="margin-left: 80px;">Driver</h4>
                                        </div>
                                        <div class="new-column">
                                            <h4 style="margin-left: 100px;">Action</h4>
                                        </div>
                                        </div>
                                    </div>
    
                                    @foreach($details as $truck)
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="user-profile">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check form-check-primary me-0 mb-0">
                                                        <input class="form-check-input inbox-chkbox contact-chkbox truck-checkbox" name="truck_ids[]" value="{{ $truck->truck }}" type="hidden">
                                                    </div>
                                                </div>
 
                                             <div class="user-meta-info">
                                                <p class="user-name" data-name="Alan Green">{{$truck->truck}}</p>                                  
                                                </div>
                                            </div>
                        
                                            <div class="user-phone">
                                                <p class="info-title">Phone: </p>
                                                <input class="form-control" name="nooftrips[]" type="number"  id="nooftrips-{{ $truck->id }}" value="{{ $truck->trips }}" >
                                            </div>
                                           
                                            <div class="action-btn">
                                            <input class="form-control" name="times[]" type="time" id="times-{{ $truck->id }}" value="{{ $truck->time }}" >
                                            </div>
                                       
                                            <div class="new-column">
                                            <select class="form-control" name="driver[]"  id="driver-{{ $truck->id }}" >
                                   
                                                    @foreach ($drivers as $dr)     
                                                    @if($dr->id == $truck->driver_id)
                                                    <option value="{{ $dr->id }}">{{ $dr->name }} {{ $dr->surname}}</option>     
                                                    @endif                                                                     
                                                    @endforeach

                                                    @foreach ($drivers as $dr)                                                      
                                                    <option value="{{ $dr->id }}">{{ $dr->name }} {{ $dr->surname}}</option>                                                                                     
                                                    @endforeach
                                            
                                            </select>
                                            </div>

                                
                                            <a href="/plan/deleteplan/{{$truck->id}}" class="btn btn-danger btn-md">Delete</a> 

                                            </div>
                                    </div>  
                                    @endforeach                                    
    
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-sm-end justify-content-center">
                                            <button type="submit" class="btn btn-primary" >Update Plan</button> 
                                         
                                        </div>
    
                    </form>

                               
</div>
</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript to toggle all checkboxes
    document.getElementById('contact-check-all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.truck-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('contact-check-all').checked;
        });
    });
</script>









