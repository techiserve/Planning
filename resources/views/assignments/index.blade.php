@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Manage Assignments</a></li>
            <li class="breadcrumb-item active" aria-current="page">View All Contract Assignments</li>
        </ol>
    </nav>
</div></br>

<div>
    <a href="/assignments/capability/"  class="shadow-none badge badge-primary" data-original-title="Edit"><span class="shadow-none badge badge-primary">View Total Capability</span></a>
</div>
    </br>                                        
<!-- /BREADCRUMB -->
<div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-3" class="table style-3 dt-table-hover">
                                        <thead>
                                            <tr>
                                           
                                                <th class="text-center">Service Provider</th>
                                                <th>Client</th>
                                                <th>Contract #</th>
                                                <th>Duration(months)</th>
                                                <th>Product</th>
                                                <th>Contract Value</th>
                                               
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contracts as $contract)                                                                                            
                                            <tr>
                                               
                                                <td class="text-center">
                                                  {{$contract->provider}}
                                                </td>
                                                <td>  {{$contract->client}}</td>
                                                <td>  {{$contract->number}}</td>
                                                <td>  {{$contract->duration}}</td>
                                                <td>  {{$contract->commodity}}</td>
                                                <td>  {{$contract->contractValue}}</td>
                                               
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="/assignments/show/{{$contract->id}}"  class="shadow-none badge badge-primary" data-original-title="Edit"><span class="shadow-none badge badge-primary">View Assignment</span></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                
            </div>
@endsection