  <div class="sidebar-wrapper sidebar-theme" >
            
            <nav id="sidebar" >

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="#">
                                <img src="{!! asset('template/src/assets/img/sobo.png') !!}" class="img-fluid me-2" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="/dashboard" class="nav-link"> Sobotshane </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        
                    </div>
                </div>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                  
                <li class="menu menu-heading">
                    <div class="heading" style="background-color: #7E7B7F; border: 1px solid gray; padding: 10px;margin-left: 30px; display: inline-block; padding: 10px 85px 10px 10px;border-radius: 15px 15px 15px 15px;">
                        <span style="color: white;font-size:15px;">SIC Modules</span>
                    </div>
                </li>

                    
                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 2 || Auth::user()->userRole == 3)

                    <li class="menu">                  
                        <a href="#plan" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Planning</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="plan" data-bs-parent="#accordionExample">                       
                            <li>
                                <a href="/plan/route"> Create Plan </a>
                            </li>  
                            <li>
                                <a href="/plan/changeassignment"> Change Assignments </a>
                            </li>    
                            <li>
                                <a href="/plan/activesummary"> Summary </a>
                            </li>                  
                            <li>
                                <a href="/plan/planindex"> Plans </a>
                            </li> 
                            @if(Auth::user()->email == 'vincent@admin.com')  
                            <li>
                                <a href="/plan/import"> Import </a>
                            </li> 
                            @endif
                        </ul>
                    </li>

                    @endif


                 
                    <li class="menu">
                    <li class="menu menu-heading">
                    <div class="heading" style="background-color: #7E7B7F; border: 1px solid gray; padding: 10px;margin-left: 30px; display: inline-block; padding: 10px 50px 10px 10px;border-radius: 15px 15px 15px 15px;">
                        <span style="color: white;font-size:15px;">Enablers Modules</span>
                    </div>
                </li>
                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 2  || Auth::user()->userRole == 4)
                    <!-- Asset Management -->
                    <li class="menu">
                        <a href="#asset" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              
                                <span>Asset Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="asset" data-bs-parent="#accordionExample">
                        <li>
                                <a href="/assets/create"> Create Assets </a>
                            </li>
                            <li>
                                <a href="/assets/index"> Manage Assets </a>
                            </li>
                         
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 2  || Auth::user()->userRole == 4)
                   
                    <li class="menu">
                        <a href="#driver" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Driver Management </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="driver" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/drivers/create"> Create Driver</a>
                            </li>
                            <li>
                                <a href="/drivers/index"> Manage Drivers</a>
                            </li>
                           
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 2  || Auth::user()->userRole == 4)
                    <!-- Contract Management -->
                    <li class="menu">
                        <a href="#contract" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Route Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="contract" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/routes/create"> Create Route </a>
                            </li>
                            <li>
                                <a href="/routes/index"> Manage Routes </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    <!-- @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                  
                    <li class="menu">
                        <a href="#contract" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Contract Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="contract" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/contracts/create"> Create Contract </a>
                            </li>
                            <li>
                                <a href="/contracts/index"> Manage Contracts </a>
                            </li>
                            <li>
                                <a href="/contracts/parameters"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif -->

                    <!-- @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                   
                    <li class="menu">
                        <a href="#assignments" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Assignments</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="assignments" data-bs-parent="#accordionExample">
                            
                            <li>
                                <a href="/assignments/routesasset"> Routes and Assets </a>
                            </li>
                            <li>
                                <a href="/assignments/assetdriver"> Assets and Driver </a>
                            </li>
                            <li>
                                <a href="/assignments/index"> Manage Assignments </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif -->

                    @if(Auth::user()->userRole == 1 )
                    <li class="menu menu-heading">
                    <div class="heading" style="background-color: #7E7B7F; border: 1px solid gray; padding: 10px;margin-left: 30px; display: inline-block; padding: 10px 130px 10px 10px;border-radius: 15px 15px 15px 15px;">
                        <span style="color: white;font-size:15px;">Users</span>
                    </div>
                </li>
          
            
                    <li class="menu">
                        <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>User Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="users" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/users/create"> Create Users </a>
                            </li>
                            <li>
                                <a href="/users/index"> Manage Users </a>
                            </li>
                          
                        </ul>
                    </li> 
                    @endif

                    

                </ul>
                
            </nav>

        </div>