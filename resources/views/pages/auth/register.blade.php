@extends('layouts.auth')

@section('title', 'Register - Travel')

@section('content')
    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mb-4">
                        We explore the new <br />
                        life much better
                    </h1>
                    <img
                        src="{{ asset('frontend/images/Login-Images.png') }}"
                        alt=""
                        class="w-75 d-none d-sm-flex"
                    />
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('home-page') }}">
                                    <img
                                        src="{{ asset('frontend/images/Logo.png') }}"
                                        alt=""
                                        class="w-50 mb-4"
                                    />
                                </a>
                            </div>
                            <form action="{{ route('auth.register-process') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="username"
                                        name="username"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword"
                                        >Confirm Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="confirmPassword"
                                        name="password_confirmation"
                                    />
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-login btn-block"
                                >
                                    Register Now
                                </button>
                                <p class="text-center mt-4">
                                    Sudah punya akun ?
                                    <a
                                        href="{{ route('auth.login-page') }}"
                                        style="color: #071c4d"
                                    >
                                        Sign In
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
