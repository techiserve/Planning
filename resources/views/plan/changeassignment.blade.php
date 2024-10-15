@extends('template.default')
<style>
/* Apply this to the parent container */
.searchable-items.list {
    display: flex;
    flex-direction: column;
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
    flex-basis: 16%; /* Adjust this percentage as per the required column width */
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

/* Ensure input fields, select boxes, and buttons are uniform */
.items .form-control, .items .form-select {
    width: 100%; /* Set to 100% width of their parent div */
    height: 38px; /* Standard form-control height */
    padding: 5px;
    font-size: 14px;
    box-sizing: border-box; /* Ensure padding doesn't affect width */
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

.user-profile, .user-email, .user-location, .user-phone, .action-btn {
    flex-basis: 16%; /* Adjust the width of these columns if necessary */
}

.action-btn {
    flex-basis: 10%; /* Adjust for buttons if needed */
}

/* Styling for form inputs to match heights */
.items .form-control, .items .form-select {
    height: 38px; /* Standard height for form controls */
    font-size: 14px;
    padding: 5px;
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
                                <li class="breadcrumb-item active" aria-current="page">Change  Assignments</li>
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



                            <form action="/plan/updateplan" method="POST">
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
                                                <h4 style="text-align: left; margin-left: 10;">Date</h4>
                                            </div>
                                            <div class="user-email">
                                                <h4 style="text-align: left; margin-left: 3;">Truck</h4>
                                            </div>
                                            <div class="user-phone">
                                                <h4 style="margin-left: 3px;">Trips</h4>
                                            </div>
                                           
                                            <div class="user-phone">
                                                <h4 style="margin-left: 3px;">Route</h4>
                                            </div>
                                            <div class="user-phone">
                                                <h4 style="margin-left: 3px;">Time</h4>
                                            </div>
                                            <div class="user-registration">
                                                <h4 style="margin-left: 0;">New Route</h4>
                                            </div>
                                            <div class="action-btn">
                                            <h4 style="margin-left: 3px;">New Time</h4>
                                            </div>
                                            <div class="user-phone">
                                                <h4 style="margin-left: 3px;">New Trips</h4>
                                            </div>
                                        </div>
                                    </div>
    
                                    @foreach($assignments as $assignment)
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="user-profile">
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check form-check-primary me-0 mb-0">
                                                        <input class="form-check-input inbox-chkbox contact-chkbox truck-checkbox" name="plan_ids[]" value="{{ $assignment->id }}" type="checkbox">
                                                    </div>
                                                </div>
                                                
                                                <div class="user-meta-info">
                                                    <p class="user-name" data-name="Alan Green">{{$assignment->date}}</p>
                                    
                                                </div>
                                            </div>
                                            <div class="user-email">
                                                <p class="info-title">Email: </p>
                                                <p class="usr-email-addr" data-email="alan@mail.com">{{$assignment->truck}}</p>
                                            </div>
                                            <div class="user-phone">
                                                <p class="info-title">Phone: </p>
                                                <!-- <input class="form-control" name="nooftrips[]" type="text" value="{{$assignment->trips}}"  id="nooftrips-{{ $assignment->id }}" disabled> -->
                                                <p class="usr-email-addr" >{{$assignment->trips}}</p>
                                            </div> 
                                        

                                            <div class="user-phone">
                                                <p class="info-title">Phone: </p>
                                                <!-- <input class="form-control" name="nooftrips[]" type="text" value="{{$assignment->trips}}"  id="nooftrips-{{ $assignment->id }}" disabled> -->
                                                <p class="usr-email-addr" >{{$assignment->route}}</p>
                                            </div> 
                                            <div class="user-phone">
                                                <p class="info-title">S: </p>
                                                <p class="usr-email-addr" >{{$assignment->time}}</p> 
                                            </div>


                                            <div class="user-location">
                                                <p class="info-title">Registration: </p>
                                                <!-- <p class="usr-location" data-location="Boston, USA">{{$assignment->route}}</p> -->
                                           
                                                <select name="routes[]"  id="routes-{{ $assignment->id }}" class="form-select" disabled>
                                                                    <option value="{{$assignment->routeId}}">{{$assignment->route}}</option>
                                                                    @foreach ($routes as  $rout)
                                                                    <option value="{{$rout->id}}">{{$rout->from}} to {{$rout->to}}</option>   
                                                                    @endforeach                                                                                                                            
                                                                   </select>  
                                            </div>
                                                                                                                                         
                                            <div class="action-btn">
                                      
                                            <input class="form-control" name="times[]" type="text" value="{{$assignment->time}}"  id="times-{{ $assignment->id }}" disabled>
                                            </div>
                                            <div class="user-phone">
                                                <p class="info-title">S: </p>
                                                <input class="form-control" name="trips[]" type="text" value="{{$assignment->trips}}"  id="trips-{{ $assignment->id }}" disabled>
                                            </div>
                                        
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
$(document).ready(function() {
    // When a checkbox is checked or unchecked
    $('.truck-checkbox').on('change', function() {
        var truckId = $(this).val(); // Get the truck ID from the checkbox value

        // Enable or disable the corresponding input fields based on checkbox status
        if ($(this).is(':checked')) {
            $('#nooftrips-' + truckId).prop('disabled', false).attr('required', 'required');
            $('#trips-' + truckId).prop('disabled', false).attr('required', 'required');
            $('#times-' + truckId).prop('disabled', false).attr('required', 'required');
            $('#routes-' + truckId).prop('disabled', false).attr('required', 'required');
        } else {
            $('#nooftrips-' + truckId).prop('disabled', true).removeAttr('required').val(''); // Clear value when unchecked
            $('#trips-' + truckId).prop('disabled', true).removeAttr('required').val(''); // Clear value when unchecked
            $('#times-' + truckId).prop('disabled', true).removeAttr('required').val(''); // Clear value when unchecked
            $('#routes-' + truckId).prop('disabled', true).removeAttr('required').val(''); // Clear value when unchecked
        }
    });
});
</script>









