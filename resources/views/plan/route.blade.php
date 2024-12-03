@extends('template.default')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <li class="breadcrumb-item active" aria-current="page">Routes</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

    
    <div class="row" id="cancel-row">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="style-3" class="table style-3 dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Activity</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($routesWithDates as $asset)                                         
                        <tr>
                            <td><span class="inv-">{{ $asset->from }}</span></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->to }}</p></span></td>
                            <td><span class="inv-email"> {{ $asset->activity }}</span></td>
                            <td><span class="in-status">{{ $asset->Type }}</span></td>                                                                                                   
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectDateModal" 
                                        data-route-id="{{ $asset->id }}">
                                    Select Date for Plan
                            </button>                
                                
            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<!-- Modal HTML -->
<div class="modal fade" id="selectDateModal" tabindex="-1" role="dialog" aria-labelledby="selectDateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectDateModalLabel">Make Your Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to submit route ID and selected date -->
                <form id="dateSelectionForm" action="{{ route('plan.dates') }}" method="POST">
                    @csrf
                    <input type="hidden" name="route_id" id="route-id">
                    <label for="product" class="mt-3">Client Name:</label>
                    <input type="text" name="clientname" id="clientname" class="form-control">

                    <label for="date">Choose Start Date:</label>
                    <select name="date" id="date" class="form-control"></select>

                    <label for="enddate" class="mt-3">Choose End Date:</label>
                    <select name="enddate" id="enddate" class="form-control"></select>
                  
                     <!-- Time Field -->
                    <label for="time" class="mt-3">Choose Start Time:</label>
                    <input type="time" name="time" id="time" class="form-control">

                    <label for="product" class="mt-3">Loading Number:</label>
                    <input type="text" name="loading" id="loading" class="form-control">

                    <!-- Product Text Field -->
                    <label for="product" class="mt-3">Product:</label>
                    <input type="text" name="product" id="product" class="form-control">

                    <label for="product" class="mt-3">Product Type:</label>
                    <input type="text" name="producttype" id="producttype" class="form-control">

                    <label for="product" class="mt-3">Max Loads:</label>
                    <input type="text" name="maxloads" id="loads" class="form-control">

                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


   </div>


   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $('#selectDateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var routeId = button.data('route-id'); // Extract route ID from data-* attribute
        var modal = $(this);

        // Set the hidden input value for route ID
        modal.find('#route-id').val(routeId);

        // Populate the date and enddate select boxes
        var dates = @json($dates); // Using the $dates array passed from the controller

        var dateSelect = modal.find('#date');
        var endDateSelect = modal.find('#enddate');
        
        dateSelect.empty(); // Clear previous options in date field
        endDateSelect.empty(); // Clear previous options in enddate field

        // Append available dates as options to both fields
        dates.forEach(function(date) {
            dateSelect.append(new Option(date, date));
            endDateSelect.append(new Option(date, date));
        });
    });
</script>
<script>
$(document).ready(function() {
    function getNextSevenDays(startDate) {
        const dates = [];
        const start = new Date(startDate);
        
        // Add the next 7 days including the start date
        for(let i = 0; i < 8; i++) {
            const currentDate = new Date(start);
            currentDate.setDate(start.getDate() + i);
            
            // Format date as YYYY-MM-DD
            const formattedDate = currentDate.toISOString().split('T')[0];
            dates.push(formattedDate);
        }
        
        return dates;
    }

    // Modify the existing modal show event handler
    $('#selectDateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var routeId = button.data('route-id');
        var modal = $(this);

        // Set the route ID
        modal.find('#route-id').val(routeId);

        // Get the dates from Laravel
        var dates = @json($dates);

        var dateSelect = modal.find('#date');
        var endDateSelect = modal.find('#enddate');
        
        // Clear previous options
        dateSelect.empty();
        endDateSelect.empty();

        // Populate start date dropdown with all available dates
        dates.forEach(function(date) {
            dateSelect.append(new Option(date, date));
        });

        // Initial population of end date based on first start date
        if (dates.length > 0) {
            const nextDates = getNextSevenDays(dates[0]);
            nextDates.forEach(function(date) {
                endDateSelect.append(new Option(date, date));
            });
        }
    });

    // Add change event handler for start date
    $('#date').on('change', function() {
        var selectedDate = $(this).val();
        var endDateSelect = $('#enddate');
        
        // Clear previous end date options
        endDateSelect.empty();
        
        // Get and populate new date range
        const nextDates = getNextSevenDays(selectedDate);
        nextDates.forEach(function(date) {
            endDateSelect.append(new Option(date, date));
        });
    });
});
</script>

@endsection











