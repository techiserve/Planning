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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" disabled>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>

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

                <!-- Row 1: Route and Start Date -->
                <div class="row">
                    <div class="col-md-6">                       
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Client Name:</div>
                                <p class="sub-title mb-0">{{ $clientname }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <!-- Route Information -->
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold title">Route:</div>
                                <p class="sub-title mb-0">{{ $route->from }} to {{ $route->to }}</p>
                            </div>
                        </div>                  
                    </div>
                </div>

                <!-- Row 2: End Date and Loading Number -->
                <div class="row">
                    <div class="col-md-6">

                        <!-- Start Date -->
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Start Date:</div>
                                <p class="sub-title mb-0">{{ $date->format('d F Y') }}</p>
                            </div>
                        </div>
                   
                    </div>
                    <div class="col-md-6">

                         
                    @if($enddate)
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">End Date:</div>
                                <p class="sub-title mb-0">{{ $enddate->format('d F Y') }}</p>
                            </div>
                        </div>
                        @endif

                 
                    </div>
                </div>

                <!-- Row 3: Max Loads and Product -->
                <div class="row">
                    <div class="col-md-6">
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Loading Number:</div>
                                <p class="sub-title mb-0">{{ $loading }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Product:</div>
                                <p class="sub-title mb-0">{{ $product }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                       <!-- Row 3: Max Loads and Product -->
                       <div class="row">
                    <div class="col-md-6">
                    <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Prodcut Type:</div>
                                <p class="sub-title mb-0">{{ $producttype }}</p>
                            </div>
                        </div>
                    </div>

             
                 
                </div>


            </div>
        </div>
    </div>
</div>

                  

                          
                            <!--  -->

                            <div class="row">
                                    
                                    
                                    </div>
                                </div>
    
                            <!--  -->



                              <form action="/plan/setplan" method="POST">
                            @csrf

                            <div class="table-responsive">
       <table  id="assetsTable" class="table table-bordered ">
        <thead class="table-primary">
            <tr>
                <th class="text-center">
                    <div class="form-check form-check-primary me-0 mb-0">
                        <input class="driver-checkbox" id="select-all" type="checkbox">
                    </div>
                </th>
                <th>Make</th>
                <th>Asset Number</th>
                <th>Registration</th>
                <th>Number of Loads</th>
                <th>Time</th>
                <th>Status</th>
                <th>Driver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trucks as $truck)
                <tr>
                    <td class="text-center">
                        <div class="form-check form-check-primary me-0 mb-0">
                            <input class="asset driver-checkbox" name="truck_ids[]" value="{{ $truck->id }}" type="checkbox">
                        </div>
                    </td>
                    <td>
                        <p class="user-name">{{$truck->make}}</p>
                        <p class="user-work">{{$truck->model}}</p>
                    </td>
                    <td>
                        <p class="usr-email-addr">{{$truck->licenseNumber}}</p>
                    </td>
                    <td>
                        <p class="usr-location">{{$truck->registration}}</p>
                    </td>
                    <td>
                        <input class="form-control" name="nooftrips[]" type="number" id="nooftrips-{{ $truck->id }}" value="{{ $maxloads }}" disabled>
                    </td>
                    <td>
                        <input class="form-control" name="times[]" type="time" id="times-{{ $truck->id }}" value="{{ $time }}" disabled>
                    </td>
                    <td>
                        <select name="status[]" id="status-{{ $truck->id }}" class="form-select" disabled>
                            @if ($truck->status == 1)
                                <option value="1">Available</option>
                            @elseif ($truck->status == 2)
                                <option value="2">Unavailable</option>
                                <option value="1">Available</option>
                            @else
                                <option value="" selected>Choose Status</option>
                                <option value="1">Available</option>
                                <option value="2">Unavailable</option>
                            @endif
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="driver[]" id="driver-{{ $truck->id }}" disabled>
                            <option value="" disabled selected>Select Driver</option>
                            @foreach ($truck->drivers as $driver)
                                @foreach ($drivers as $dr)
                                    @if($dr->id == $driver->driver_id)
                                        <option value="{{ $dr->id }}">{{ $dr->name }} {{ $dr->surname}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </td>
                </tr>
                <input type="text" name="date" value="{{$date->format('Y-m-d') }}" style="display: none;">
                <input type="text" name="enddate" value="{{$enddate->format('Y-m-d')}}" style="display: none;">
                <input type="text" name="product" value="{{$product}}" style="display: none;">
                <input type="text" name="loading" value="{{$loading}}" style="display: none;">
                <input type="text" name="maxloads" value="{{$maxloads}}" style="display: none;">
                <input type="text" name="clientname" value="{{$clientname}}" style="display: none;">
                <input type="text" name="producttype" value="{{$producttype}}" style="display: none;">
                <input type="text" name="route" value="{{$route->id}}" style="display: none;">
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-sm-end justify-content-center">
    <button type="submit" class="btn btn-primary">Confirm Plan</button>
</div>

 </form>

                               
</div>
</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Select All checkbox functionality
    $('#select-all').on('change', function() {
        var isChecked = $(this).is(':checked');

        // Check/uncheck all individual checkboxes
        $('.driver-checkbox:not(#select-all)').prop('checked', isChecked);

        $('.driver-checkbox:not(#select-all)').each(function() {
            var $row = $(this).closest('tr');
            
            // Enable/disable form fields and ensure checkbox is checked/unchecked
            $row.find('input:not(.driver-checkbox), select').prop('disabled', !isChecked);
        });
    });

    // Individual checkbox change event
    $('.driver-checkbox:not(#select-all)').on('change', function() {
        var $row = $(this).closest('tr');
        var isChecked = $(this).is(':checked');

        // Disable/enable form fields in the row, excluding the checkbox
        $row.find('input:not(.driver-checkbox), select').prop('disabled', !isChecked);

        // Update "Select All" checkbox if not all rows are checked
        var allChecked = $('.driver-checkbox:not(#select-all)').length === 
                         $('.driver-checkbox:not(#select-all):checked').length;
        $('#select-all').prop('checked', allChecked);
    });
});

</script>


<script>
$(document).ready(function() {
    // Check if DataTables is available
    function initDataTables() {
        if ($.fn.DataTable) {
            $('#assetsTable').DataTable({
                "searching": true,
                "ordering": true,
                "info": true,
                "pageLength": 200,
                "processing": false,
                "deferRender": true
            });
        } else {
            console.warn('DataTables not loaded');
        }
    }

    // If DataTables script is already loaded
    if ($.fn.DataTable) {
        initDataTables();
    } else {
        // Dynamically load DataTables
        $('link[disabled]').prop('disabled', false);
        $.getScript('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', initDataTables);
    }
});
</script>







