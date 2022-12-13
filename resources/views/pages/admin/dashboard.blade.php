@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('dashboardPage', 'active')

@section('content')
    <div class="col-12 col-xl-9">
        <div class="nav">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="{{ asset('backend/images/icons/burger.svg') }}" class="mb-2" alt="">
                    </button>
                    <h2 class="nav-title">Employees</h2>
                </div>
                <button class="btn-notif d-block d-md-none"><img src="{{ asset('backend/images/icons/bell.svg') }}" alt=""></button>
            </div>

            <div class="d-flex justify-content-between align-items-center nav-input-container">
                <div class="nav-input-group">
                    <input type="text" class="nav-input" placeholder="Search people, team, project">
                    <button class="btn-nav-input"><img src="{{ asset('backend/images/icons/search.svg') }}" alt=""></button>
                </div>

                <button class="btn-notif d-none d-md-block"><img src="{{ asset('backend/images/icons/bell.svg') }}" alt=""></button>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title">Statistics</h2>
                    <h5 class="content-desc mb-4">Your team powers</h5>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">In Total</h5>

                                <h3 class="statistics-value">425,000</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Active</h5>

                                <h3 class="statistics-value">205,399</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card simple">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-around align-items-start employee-stat">
                                <h5 class="content-desc">Inactive</h5>

                                <h3 class="statistics-value">142,593</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5 pb-5">
                <div class="col-12">
                    <h2 class="content-title">People</h2>
                    <h5 class="content-desc mb-4">The rangers</h5>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-6.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Andini Danna</h4>

                            <p class="employee-role">Product Designer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-2.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Ferrari Three</h4>

                            <p class="employee-role">Quality Manager</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-4.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Sapiire Muke</h4>

                            <p class="employee-role">iOS Engineer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status unverified">
                            <a href="#">Verify Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Mw Kemanna</h4>

                            <p class="employee-role">Website Developer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-7.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Onna Appa</h4>

                            <p class="employee-role">Product Designer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-3.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Hehe Nadiia</h4>

                            <p class="employee-role">Quality Manager</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-5.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Jamboel</h4>

                            <p class="employee-role">iOS Engineer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status unverified">
                            <a href="#">Verify Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="d-flex flex-column justify-content-between align-items-center employee-card w-100">
                        <img src="{{ asset('backend/images/user-photos/photo-1.png') }}" alt="" class="employee-img">

                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <h4 class="employee-name">Eksis Melita</h4>

                            <p class="employee-role">Website Developer</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center employee-status verified">
                            <div class="employee-status-image">
                                <img src="{{ asset('backend/images/icons/check.svg') }}" alt="">
                            </div>

                            <span>Verified</span>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
