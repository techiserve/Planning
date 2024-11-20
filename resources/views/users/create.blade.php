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
                                <li class="breadcrumb-item active" aria-current="page">Create New User</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                        
                    <div class="account-settings-container layout-top-spacing">
    
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                
                                </div>
                            </div>
    
                            <div class="tab-content" id="animateLineContent-4">
                            
                                <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                    <div class="row">
                                    <form method="post" action="{{ route('users.store') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Personal Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" name="name" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Surname</label>
                                                                <input type="text" name="surname" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address</label>
                                                                <input type="text" name="address"  class="form-control">
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
    
                                      
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Department</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="department" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="IT">IT</option>
                                                                    <option value="Operations">Operations</option>
                                                                    <option value="Accounts">Accounts</option>
                                                                    <option value="Management">Management</option>
                                                                    <option value="Security">Security</option>
                                                                    <option value="HR">HR</option>                                                          
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                         <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email Address</label>
                                                                <input type="email" name="email"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-md-6">
                                                            <div  class="mb-3">
                                                            <label class="form-label">User Role</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="userRole" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    @foreach ($roles as $role)  
                                                                    <option value="{{ $role->id }}">{{$role->Name}}</option>
                                                                    @endforeach                                                   
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                  
                                                </div>
                                                
                                            </div>
                                            <button type="submit" class="btn btn-primary  float-end mt-3">Create User</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

            <!--  BEGIN FOOTER  -->
           
            <!--  END FOOTER  -->
            
        </div>
@endsection