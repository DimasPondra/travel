@extends('layouts.admin')

@section('title', 'Edit Package')
@section('packagePage', 'active')

@section('content')
    <div class="col-12 col-xl-9">
        <div class="nav">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="{{ asset('backend/images/icons/burger.svg') }}" class="mb-2" alt="icon">
                    </button>
                    <h2 class="nav-title">
                        <a href="{{ route('admin.packages.index') }}">Package</a>
                    </h2>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title mb-4">Edit Package</h2>
                </div>

                @include('pages.partial.message')

                <div class="col-12 statistics-card">
                    <form action="{{ route('admin.packages.update', $package) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        @include('pages.admin.packages.form', $package)
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
