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

    
    <div class="row" id="cancel-row">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="checkbox-column"> Record no. </th>
                            <th>Asset Number</th>
                            <th>Registration</th>
                            <th>Make</th>
                            <th>Asset Type</th>
                            <th>Status</th>                
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($assets as $asset)                                         
                        <tr>
                            <td class="checkbox-column"> 1 </td>
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->licenseNumber }}</p></span></td>
                            <td><span class="ir">{{ $asset->registration }}</span></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->make }}</p></span></td>
                            <td><span class="inv-email"> {{ $asset->model }}</span></td>
                            <td>@if ($asset->status == 1)
                           <span class="badge badge-light-success inv-status">Available</span> 
                            @elseif ($asset->status == 2)
                            <span class="badge badge-light-danger inv-status">Not Available</span>   
                            @else
                            <span class="badge badge-light-info inv-status">No Status</span>   
                            @endif
                             </td>                                           
                            
                            <td>
                                <a  href="/assets/edit/{{$asset->id}}" class="btn btn-success" >  Edit </a>   
                                <a  href="/assets/assign/{{$asset->id}}" class="btn btn-primary" >  Assign driver </a> 
                                <a  href="/assets/delete/{{$asset->id}}" class="btn btn-danger" >  Delete </a> 
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