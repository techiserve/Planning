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
                                <li class="breadcrumb-item active" aria-current="page">Update User Details</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div class="row invoice layout-top-spacing layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                            <div class="doc-container">
    
                                <div class="row">
                                    <div class="col-xl-9">
    
                                        <div class="invoice-content">
    
                                            <div class="invoice-detail-body">
    
                                                <div class="invoice-detail-title">
    
                                                    <div class="invoice-logo">
                                                        <div class="profile-image">

                                                            <!-- // The classic file input element we'll enhance
                                                            // to a file pond, we moved the configuration
                                                            // properties to JavaScript -->
                                        
                                                            <div class="invoice-title">
                                                       
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>Route Details:</h4>
    
                                                            <form method="post" action="/users/update/{{$user->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="" value="{{$user->name}}">
                                                                    </div>
                                                                </div>
    
                        
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="address" id="company-address" placeholder="" value="{{$user->address}}">
                                                                    </div>
                                                                </div>
                                                               
    
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="department" class="form-select">
                                                                    <option selected="{{$user->department}}">{{$user->department}}</option>
                                                                    <option value="IT">IT</option>
                                                                    <option value="Operations">Operations</option>
                                                                    <option value="Accounts">Accounts</option>
                                                                    <option value="Management">Management</option>
                                                                    <option value="Security">Security</option>
                                                                    <option value="HR">HR</option>                                                          
                                                                   </select> 
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="email" id="client-email" placeholder="" value="{{$user->email}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">User Role</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="userRole" class="form-select">
                                                                            @foreach($roles as $role)
                                                                            @if($role->id == $user->userRole)
                                                                            <option value="{{$role->id }}" >{{$role->Name}}</option>  
                                                                            @endif
                                                                            @endforeach

                                                                            @foreach($roles as $role)
                                                                                <option value="{{ $role->id }}"> {{ $role->Name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                    </div>
                                                                </div>
    
                                                              
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                          
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
    
                                    <div class="col-xl-3">
                                    
                                        <div class="invoice-actions-btn">
    
                                            <div class="invoice-action-btn">
                                                
                                                <div class="row">
                                            
                                                    <div class="col-xl-12 col-md-4">
                                                        <button type="submit" class="btn btn-success btn-download">Update User </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div></br>



                                
                                
                                

                                <!-- Escalation formulas  -->
                                
                            </div>
    
                           
                        </div>

                        
                    </div>

 
                
            </div>

            <!--  BEGIN FOOTER  -->
          
            <!--  END FOOTER  -->
        </div>
@endsection