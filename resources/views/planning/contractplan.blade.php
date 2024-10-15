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
                                <li class="breadcrumb-item"><a href="#">Planning</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contract Plans</li>
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
                            <th>Product</th>
                            <th>status</th>
                            <th>Duration</th>                    
                            <th>Effective Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($contracts as $asset)                                         
                        <tr>
                            <td class="checkbox-column"> 1 </td>
                            <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $asset->provider }}</span></a></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $asset->client }}</p></span></td>
                            <td><span class="inv-email"> {{ $asset->commodity }}</span></td>
                            <td>@if ($asset->activity == 1)
                           <span class="badge badge-light-success inv-status">Available</span> 
                            @elseif ($asset->activity == 2)
                            <span class="badge badge-light-danger inv-status">Not Available</span>   
                            @else
                            <span class="badge badge-light-info inv-status">Ongoing</span>   
                            @endif
                             </td>  
                                                                      
                            <td>
                            <span class="inv-amount">{{ $asset->duration }}</span>
                           </td>  
                            <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $asset->effectiveDate }}</span></td>
                            <td>
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/planning/showcontractplan/{{$asset->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>                           
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











