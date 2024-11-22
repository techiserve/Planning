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
                                <li class="breadcrumb-item active" aria-current="page">Plans</li>
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
                            <th>Client</th>
                            <th>Route</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Product</th>
                            <th>Max Loads</th>
                            <th>Loading Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($plans as $plan)                                         
                        <tr>
                            <td><span class="inv-">{{ $plan->name }}</span></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $plan->route }}</p></span></td>
                            <td><span class="inv-email"> {{ $plan->date }}</span></td>
                            <td><span class="in-status">{{ $plan->enddate }}</span></td>  
                            
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $plan->product }}</p></span></td>
                            <td><span class="inv-email"> {{ $plan->maxloads }}</span></td>
                            <td><span class="in-status">{{ $plan->loadingNumber }}</span></td>     

                            <td>
                            <a type="button" class="btn btn-primary"  
                                        href="/plan/editplan/{{ $plan->id }}">
                                    Edit
                            </a>                
                                
            
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











