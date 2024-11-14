<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sobotshane SIC </title>
    <link rel="icon" type="image/x-icon" href="{!! asset('template/src/assets/img/logo.jpg  ') !!}"/>
    <!-- ENABLE LOADERS -->
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/loader.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/loader.css') !!}" rel="stylesheet" type="text/css" />
    <script src="{!! asset('template/layouts/modern-light-menu/loader.js') !!}"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{!! asset('template/src/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{!! asset('template/src/assets/css/light/elements/alert.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/src/assets/css/dark/elements/alert.css') !!}">
       <link href="{!! asset('template/src/plugins/src/apex/apexcharts.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('template/src/assets/css/light/dashboard/dash_1.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/dark/dashboard/dash_1.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('template/src/plugins/src/table/datatable/datatables.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/light/table/datatable/dt-global_style.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/light/table/datatable/custom_dt_custom.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/dark/table/datatable/dt-global_style.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/dark/table/datatable/custom_dt_custom.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/light/apps/invoice-list.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/dark/apps/invoice-list.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('template/src/assets/css/light/components/modal.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/dark/components/modal.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/light/apps/contacts.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('template/src/assets/css/light/users/account-setting.css') !!}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/dark/apps/invoice-edit.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('template/src/plugins/src/tomSelect/tom-select.default.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/light/tomSelect/custom-tomSelect.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/plugins/css/dark/tomSelect/custom-tomSelect.css') !!}" rel="stylesheet" type="text/css" />

    <link href="{!! asset('template/src/plugins/css/light/flatpickr/custom-flatpickr.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/light/apps/invoice-edit.css') !!}" rel="stylesheet" type="text/css" />
    

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>
    
</head>
<body class="layout-boxed" page="starter-pack">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
       @include('template.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

    @include('sweetalert::alert')

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
      @include('template.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
      @yield('content')
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{!! asset('template/src/plugins/src/global/vendors.min.js') !!}"></script>
    <script src="{!! asset('template/src/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') !!}"></script>
    <script src="{!! asset('template/layouts/modern-light-menu/app.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/waves/waves.min.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/mousetrap/mousetrap.min.js') !!}"></script>
    
    <script src="{!! asset('template/src/assets/js/custom.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/apex/apexcharts.min.js') !!}"></script>
    <script src="{!! asset('template/src/assets/js/dashboard/dash_1.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/table/datatable/datatables.js') !!}"></script>

    <script src="{!! asset('template/src/plugins/src/table/datatable/datatables.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('template/src/assets/js/apps/invoice-list.js') !!}"></script>


    <script src="{!! asset('template/src/assets/js/users/account-settings.js') !!}"></script>
    <script src="{!! asset('template/src/assets/css/light/components/tabs.css') !!}"></script>
    <script src="{!! asset('template/src/assets/css/light/forms/switches.css') !!}"></script>
    <script src="{!! asset('template/src/assets/css/light/components/list-group.css') !!}"></script>
    <script src="{!! asset('template/src/plugins/css/light/filepond/custom-filepond.css') !!}"></script>

    <script src="{!! asset('template/src/plugins/src/jquery-ui/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('template/src/assets/js/apps/contact.js') !!}"></script>


    <script src="{!! asset('template/src/assets/js/apps/invoice-edit.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script src="{!! asset('template/src/plugins/src/tomSelect/tom-select.base.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/tomSelect/custom-tom-select.js') !!}"></script>

    <script>
$(document).ready(function() {
    // Function to enable or disable fields based on checkbox status
    function toggleFields(truckId, isChecked) {
        $('#nooftrips-' + truckId).prop('disabled', !isChecked).attr('required', isChecked ? 'required' : false).val(isChecked ? $('#nooftrips-' + truckId).val() : '');
        $('#shifts-' + truckId).prop('disabled', !isChecked).attr('required', isChecked ? 'required' : false).val(isChecked ? $('#shifts-' + truckId).val() : '');
        $('#times-' + truckId).prop('disabled', !isChecked).attr('required', isChecked ? 'required' : false).val(isChecked ? $('#times-' + truckId).val() : '');
        $('#status-' + truckId).prop('disabled', !isChecked).attr('required', isChecked ? 'required' : false).val(isChecked ? $('#status-' + truckId).val() : '');
        $('#driver-' + truckId).prop('disabled', !isChecked).attr('required', isChecked ? 'required' : false).val(isChecked ? $('#driver-' + truckId).val() : '');

        // Initialize flatpickr time picker only when checkbox is checked
        if (isChecked) {
            flatpickr(document.getElementById('times-' + truckId), {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true // 24-hour format
            });
        }
    }

    // When a single checkbox is checked or unchecked
    $('.truck-checkbox').on('change', function() {
        var truckId = $(this).val();
        toggleFields(truckId, $(this).is(':checked'));
    });

    // Select All functionality
    $('#contact-check-all').on('change', function() {
        var isChecked = $(this).is(':checked');
        
        // Check or uncheck all individual checkboxes
        $('.truck-checkbox').prop('checked', isChecked).trigger('change');
    });

    // Initialize flatpickr for all time inputs by default (if needed)
    $('input[name="times[]"]').each(function() {
        flatpickr(this, {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true // 24-hour format
        });
    });
});
</script>


    <script type="text/javascript">
                                              function deleteConfirmation(id) {
                                              swal({
                                              title: "Confirm Grower Payment?",
                                              text: "Please ensure and then confirm!",
                                              type: "warning",
                                              showCancelButton: !0,
                                              confirmButtonText: "Yes, confirm it!",
                                              cancelButtonText: "No, cancel!",
                                              reverseButtons: !0
                                              }).then(function (e) {
                                              if (e.value === true) {
                                              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                              $.ajax({
                                              type: 'GET',
                                              url: "/intake/confirm/" + id,
                                              data: {_token: CSRF_TOKEN},
                                              dataType: 'JSON',
                                              success: swal("success","You have succesfully confirmed payment!", "success"),
                                              

                                              });

                                              $(document).ajaxStop(function(){
                                              setInterval(window.location.reload(),3000);
                                              });

                                              } else {
                                              e.dismiss;
                                              }
                                              }, function (dismiss) {
                                              return false;
                                              })
                                              }
                                              </script>
                                                         
    
<script>
        // var e;
        c1 = $('#style-1').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML=`
                <div class="form-check form-check-primary d-block">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>`
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return `
                    <div class="form-check form-check-primary d-block">
                        <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                    </div>`
                }
            }],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c1);

        c2 = $('#style-2').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML=`
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>`
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return `
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                    </div>`
                }
            }],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10 
        });

        multiCheck(c2);

        c3 = $('#style-3').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    "oLanguage": {
        "oPaginate": { 
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', 
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 20,
    "order": [[0, 'desc']]  // Add this line to order by the first column in descending order (0 = first column, desc = descending)
});

multiCheck(c3);


c3 = $('#style-3-1').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    "oLanguage": {
        "oPaginate": { 
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', 
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 20,
    "order": [[0, 'asc']]  // Add this line to order by the first column in descending order (0 = first column, desc = descending)
});

multiCheck(c3);

    </script>

    <script>
        new TomSelect("#select-beast",{
    create: true,
    sortField: {
        field: "text",
        direction: "asc"
    }
});
    </script>

    <!-- <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10 
        });
    </script> -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>