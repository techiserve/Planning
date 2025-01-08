
@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Drivers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Your Profile</li>
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
                                    <form method="post"  action="{{ route('profile.update') }}" id="passwordForm" novalidate>
                                    @csrf
                                    @method('put')
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Update Profile Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                 <input class="form-control" id="grower_name" name="name" type="text" value="{{$user->name}}" required  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input class="form-control" id="grower_rep" name="email" type="email" value="{{$user->email}}" required >
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Current Password</label>
                                                                  <input class="form-control" id="current_password"  name="current_password" type="password" placeholder="********">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">New Password</label>
                                                            <input class="form-control" id="new_password" name="password" type="password"  placeholder="********">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                         
                                                            <label class="form-label">Confirm Password</label>
                                                            <input class="form-control" id="confirm_password" name="password_confirmation" type="password"  placeholder="********">
                                                            <div class="invalid-feedback">Passwords do not match.</div>                                                                                                                                                                                                                     
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                        
                                                    </div>
                                                    

                                                
                                                </div>
                                            </div>
                                        </div>
                                                                                                                        
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Save</button>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("passwordForm").addEventListener("submit", function (event) {       
        const newPassword = document.getElementById("new_password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmPassword) {
            event.preventDefault(); // Prevent form submission
            document.getElementById("confirm_password").classList.add("is-invalid");
        } else {
            document.getElementById("confirm_password").classList.remove("is-invalid");
        }
    });
});
</script>
