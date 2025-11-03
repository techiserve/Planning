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
                                                    <div class="invoice-title"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-detail-header">
                                            <div class="row justify-content-between">
                                                <div class="col-xl-5 invoice-address-company">
                                                

                                                    <form method="post" action="/users/update/{{ $user->id }}">
                                                        @csrf 
                                                        @method('put')

                                                        <div class="invoice-address-company-fields">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" name="name" value="{{ $user->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="col-xl-5 invoice-address-client">
                                                    <div class="invoice-address-client-fields">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm" name="email" value="{{ $user->email }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        <!-- ✅ MODULE ACCESS SECTION -->
                                        <div class="row mt-4 mb-4">
                                            <div class="col-xl-12">
                                                <label class="form-label fw-bold">Module Access</label>

                                                @php
                                                    $userModules = json_decode($user->user_access, true) ?? [];
                                                @endphp

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="modules[]" value="users" id="users"
                                                        {{ in_array('users', $userModules) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="users">Users</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="modules[]" value="planning" id="planning"
                                                        {{ in_array('planning', $userModules) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="planning">Planning</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="modules[]" value="assets" id="assets"
                                                        {{ in_array('assets', $userModules) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="assets">Assets</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="modules[]" value="drivers" id="drivers"
                                                        {{ in_array('drivers', $userModules) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="drivers">Drivers</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="modules[]" value="routes" id="routes"
                                                        {{ in_array('routes', $userModules) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="routes">Routes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ✅ END MODULE ACCESS SECTION -->

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="invoice-actions-btn">
                                    <div class="invoice-action-btn">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-4">
                                                <button type="submit" class="btn btn-success btn-download w-100">
                                                    Update User
                                                </button>
                                            </div>
                                        </div>
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
</div>
@endsection
