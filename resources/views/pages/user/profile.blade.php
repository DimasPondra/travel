@extends('layouts.user')

@section('title', 'Dashboard - Profile')
@section('profilePage', 'active')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">

                            @include('pages.partial.message-bs-4')

                            <form action="{{ route('dashboard.profile-update') }}" method="POST">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="name" class="mb-2">
                                                Name
                                                <span class="required">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control @error('name')
                                                    is-invalid
                                                @enderror"
                                                id="name"
                                                name="name"
                                                value="{{ old('name', $user->name) }}"
                                            >
                                            @error('name')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="username" class="mb-2">
                                                Username
                                                <span class="required">*</span>
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control @error('username')
                                                    is-invalid
                                                @enderror"
                                                id="username"
                                                name="username"
                                                value="{{ old('username', $user->username) }}"
                                            >
                                            @error('username')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="email" class="mb-2">
                                                Email
                                                <span class="required">*</span>
                                            </label>
                                            <input
                                                type="email"
                                                class="form-control @error('email')
                                                    is-invalid
                                                @enderror"
                                                id="email"
                                                name="email"
                                                value="{{ old('email', $user->email) }}"
                                            >
                                            @error('email')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="nationality" class="mb-2">
                                                Nationality
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control @error('nationality')
                                                    is-invalid
                                                @enderror"
                                                id="nationality"
                                                name="nationality"
                                                value="{{ old('nationality', $user->profile->nationality) }}"
                                            >
                                            @error('nationality')
                                                <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img
                                    src="{{ asset('frontend/images/Testimonial-2.png') }}"
                                    class="member-image mr-1"
                                />
                                <img
                                    src="{{ asset('frontend/images/Testimonial-3.png') }}"
                                    class="member-image mr-1"
                                />
                                <img
                                    src="{{ asset('frontend/images/Testimonial-4.png') }}"
                                    class="member-image mr-1"
                                />
                                <img
                                    src="{{ asset('frontend/images/Testimonial-5.png') }}"
                                    class="member-image mr-1"
                                />
                                <img
                                    src="{{ asset('frontend/images/Testimonial-6.png') }}"
                                    class="member-image mr-1"
                                />
                            </div>
                            <hr />
                            <h2>Trip Informations</h2>
                        </div>
                        <div class="join-container">
                            <a
                                href="checkout.html"
                                class="btn btn-block btn-join-now mt-3 py-2"
                            >
                                Join Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('after-style')
    <style>
        .required {
            color: red;
        }
    </style>
@endpush
