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
                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                            <div class="row">
                                <form method="post" action="{{ route('users.store') }}">
                                    @csrf   

                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="section general-info payment-info">
                                            <div class="info">
                                                <h6>Add Personal Details</h6>                              

                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Surname</label>
                                                            <input type="text" name="surname" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email Address</label>
                                                            <input type="email" name="email"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div  class="mb-3">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" name="password"  class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">                                     
                                                    <div class="col-md-6">
                                                        <div  class="mb-3">
                                                            <label class="form-label">Position</label>
                                                            <select name="userole" class="form-select"> 
                                                                <option value="" disabled selected>Select Position</option>                                                  
                                                                <option value="1">Administrator</option> 
                                                                <option value="2">Supervisor</option> 
                                                                <option value="3">Planner</option> 
                                                                <option value="4">Enabler</option> 
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Module Access</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="modules[]" value="users" id="users">
                                                            <label class="form-check-label" for="users">Users</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="modules[]" value="planning" id="planning">
                                                            <label class="form-check-label" for="planning">Planning</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="modules[]" value="assets" id="assets">
                                                            <label class="form-check-label" for="assets">Assets</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="modules[]" value="drivers" id="drivers">
                                                            <label class="form-check-label" for="drivers">Drivers</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="modules[]" value="routes" id="routes">
                                                            <label class="form-check-label" for="routes">Routes</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-end mt-3">Create User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
