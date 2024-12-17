@extends('template.default')

@section('content')
 <div id="content" class="main-content">
            <div class="layout-px-spacing">
            @php
        use App\Models\Plan;
        use App\Models\Asset;
        use App\Models\Route;
        $plansCount = Plan::count(); // Count directly in the view
        $truckCount = Asset::count(); 
        $routeCount = Route::count(); 
        // Fetch all plans
    @endphp
                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">

                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-six">
                                <div class="widget-heading">
                                <h6 class="value" style="font-size: 18px;">Trucks</h6>
                                    <div class="task-action">
                                    <p class="w-stats" style="font-size:17px;">{{ $truckCount }}</p>
                                    </div>
                                </div>
                                <div class="logo-container" style="text-align: center; margin: -90px 0 10px 0;">
                                    <img alt="avatar" src="{!! asset('template/src/assets/img/truck.png') !!}" style="width: 100px; height: auto;">
                                </div>
                                <div class="w-chart">
                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-char">
                                            <div id="total-"></div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-cha">
                                            <div id="paid-"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-six">
                                <div class="widget-heading">
                                <h6 class="value" style="font-size: 18px;">Routes</h6>
                                    <div class="task-action">
                                    <p class="w-stats" style="font-size:17px;">{{ $routeCount }}</p>
                                    </div>
                                </div>
                                <div class="logo-container" style="text-align: center; margin: -90px 0 10px 0;">
                                    <img alt="avatar" src="{!! asset('template/src/assets/img/route.png') !!}" style="width: 180px; height: auto;">
                                </div>
                                <div class="w-chart">
                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-char">
                                            <div id="total-"></div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-cha">
                                            <div id="paid-"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
   

                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-six">
                                <div class="widget-heading">
                                <h6 class="value" style="font-size: 18px;">Plans</h6>
                                    <div class="task-action">
                                    <p class="w-stats" style="font-size:17px;">{{ $plansCount }}</p>
                                    </div>
                                </div>
                                <div class="logo-container" style="text-align: center; margin: -90px 0 10px 0;">
                                    <img alt="avatar" src="{!! asset('template/src/assets/img/plan.png') !!}" style="width: 180px; height: auto;">
                                </div>
                                <div class="w-chart">
                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-char">
                                            <div id="total-"></div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="w-detail">
                                            <p class="w-"></p>
                                            <p class="w-"></p>
                                        </div>
                                        <div class="w-cha">
                                            <div id="paid-"></div>
                                        </div>
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
                    <p ></p>
                </div>
                <div class="footer-section f-section-2">
                    <p class=""><a target="_blank" href="https://techiserve.com"><b>techiserve.ai</b></a></p>
                </div>

                
            </div>
            <!--  END FOOTER  -->
        </div>

        

            
        </div>
@endsection