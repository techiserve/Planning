@extends('template.default')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                                <li class="breadcrumb-item"><a href="#">Assets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Assets</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->


<div class="container my-5">

    <!-- Asset Information Section -->
    <div class="card mb-4">
        <div class="card-header  text-white">
            <h5>Asset Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <strong>Make:</strong> {{ $asset->make }}
                </div>
                <div class="col-md-3">
                    <strong>Asset Number:</strong> {{ $asset->licenseNumber }}
                </div>
                <div class="col-md-3">
                    <strong>Registration Number:</strong> {{ $asset->registration }}
                </div>
                <div class="col-md-2">
                    <strong>Model:</strong> {{ $asset->model }}
                </div>
                <div class="col-md-2">
                    <strong>Capacity:</strong> {{ $asset->payloadCapacity }}
                </div>
            </div>
        </div>
    </div>

    <!-- Drivers Table Section -->
    <div class="card">
        <div class="card-header text-white">
            <h5>Driver List</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('assets.assignDrivers') }}" method="POST">
                @csrf
                <table id="driversTable"  class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 5%; text-align: center;">
                                <input type="checkbox" id="select-all">
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">License Number</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach ($drivers as $driver)
        <tr>
            <td style="text-align: center;">
                @php
                    $isChecked = $assigned->contains(function ($selected) use ($driver) {
                        return $driver->id == $selected->driver_id;
                    });
                @endphp
                <input type="checkbox" name="driver_ids[]" value="{{ $driver->id }}" class="driver-checkbox" {{ $isChecked ? 'checked' : '' }}>
            </td>
            <td>{{ $driver->name }}</td>
            <td>{{ $driver->surname }}</td>
            <td>{{ $driver->licenseNumber }}</td>
        </tr>
    @endforeach
</tbody>

                </table>
                <input type="hidden" name="asset" value="{{ $asset->id }}" class="driver-checkbox">
                <button type="submit" class="btn btn-success mt-3">Assign Selected Drivers</button>
            </form>
        </div>
    </div>
</div>

</div>
    </div>
</div>

<!-- JavaScript to handle "Select All" functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Toggle all checkboxes when "Select All" is clicked
    $('#select-all').on('click', function() {
        $('.driver-checkbox').prop('checked', this.checked);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#driversTable').DataTable({
            "paging": true,
            "pageLength": 25,
            "searching": true,
            "ordering": true,
            "info": true
        });

        // Toggle all checkboxes when "Select All" is clicked
        $('#select-all').on('click', function() {
            $('.driver-checkbox').prop('checked', this.checked);
        });
    });
</script>


@endsection
