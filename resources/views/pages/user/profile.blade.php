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
                        <div class="card card-details">
                            <img
                                src="{{ !empty($user->profile->file_id) ? $user->profile->file->show_file : asset('frontend/images/Image-1.jpg') }}"
                                class="img-thumbnail mx-auto"
                                alt="avatar"
                                style="width: 200px; height: 200px; object-fit: cover;"
                            >
                            <hr />
                            <form action="{{ route('dashboard.photo-profile-update') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            class="custom-file-input @error('file')
                                                is-invalid
                                            @enderror"
                                            id="file"
                                            name="file"
                                        >
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                                @error('file')
                                    <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror

                                <button type="submit" class="btn btn-sm btn-block btn-warning">Upload Avatar</button>
                            </form>
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
