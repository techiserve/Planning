@extends('template.default')

@section('content')
 <div id="content" class="main-content">


 
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Parameters</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->



                    <div class="row layout-top-spacing">
                    
                    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Roles</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">                                                
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">View All Roles</a>      
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormModal">Create User Role</a>                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                   

                                   
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank" href="https://https://techiserve.com">TechIServe</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Powered by <a target="_blank" href="https://techiserve.com"><b>TechIServe</b></a></p>
                </div>

                
            </div>
            <!--  END FOOTER  -->
        </div>        
        </div>


          

                                   
                                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bd-example-modal-lg"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row layout-top-spacing">
                    
                                                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                        <div class="widget-content widget-content-area br-8">
                                                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Role Name</th>
                                                                        <th>Description</th>
                                                                        <th>Created By</th>
                                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($roles as $user) 
                                                                    <tr>
                                                                        <td>{{ $user->Name }}</td>
                                                                        <td>{{ $user->Description }}</td>
                                                                        <td>{{ $user->CreatedBy }}</td>
                                                                    
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




                                    <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">Create a <b>User Role</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">
                                                <form  method="post" action="{{ route('users.userRole') }}"class="mt-0">
                                                @csrf  
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                                                    <polyline points="3 7 12 13 21 7"></polyline>
                                                                </svg>
                                                            </span>
                                                            <input type="text"  name="Name" class="form-control" placeholder="name" aria-label="name    ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                                                    <circle cx="12" cy="16" r="1"></circle>
                                                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                                                </svg>
                                                            </span>
                                                            <input type="text" name="Description" class="form-control" placeholder="description" aria-label="password">
                                                        </div>
                                                    </div>                                                                                                                                   
  
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Create Role</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
@endsection