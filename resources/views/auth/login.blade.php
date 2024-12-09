@extends('template.guest')
<style>
        /* Optional CSS styles for styling the image */
        body {
            text-align: center;
        }
        img {
            max-width: 2000%;
            height: auto;
            margin: 30px;
            width: 600px;
        }
        .logo-image {
        margin-top: -80px; /* Adjust the negative value as needed */
    }
    </style>
@section('content')
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>


   <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
           
            <div class="row">
    
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                        
                    <div class="auth-cover">
    
                        <div class="position-relative">
    
                        </div>
                        
                    </div>

                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                          <form method="POST" action="{{ route('login') }}">
                           @csrf

                            <div class="row">
                                <div class="col-md-12 mb-3">

                                <img src="{!! asset('template/src/assets/img/logo2.png') !!}" alt="Description of the image" class="logo-image">
    </br>   </br>    </br>    </br>    </br>    </br>    </br>                                     
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email"  name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input  type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" name="remember" type="checkbox" id="form-check-default">
                                            <label class="form-check-label" for="form-check-default">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-secondary w-100">SIGN IN</button>
                                    </div>
                                </div>                                              
                                                                                      
                            </div>
                               </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
@endsection

