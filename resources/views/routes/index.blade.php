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
                                <li class="breadcrumb-item"><a href="#">Contract</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Commercial Agreement</li>
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
                            <th>Service Provider</th>
                            <th>Client</th>
                            <th>Distance</th>
                            <th>Source</th>
                            <th>Destination</th>                    
                     
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($routes as $asset)                                         
                        <tr>
                            <td class=""> 1 </td>
                            <td><span class="">Sobotshane</span></td>
                         
                            <td><span class=""> <p class="align-self-center mb-0 user-name">{{ $asset->contractId }}</p></span></td>
                            <td><span class=""> {{ $asset->distance }}</span></td>
                            <td> <span class="">{{ $asset->from }}</span> </td>                                              
                            <td>
                            <span class="">{{ $asset->to }}</span>
                           </td>  
                            <td>
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/routes/edit/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                
                                <a class="badge badge-light-danger text-start action-delete" href="/routes/delete/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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











