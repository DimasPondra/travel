@extends('layouts.admin')

@section('title', 'Package')
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
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="content-title mb-4">Detail Package</h2>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                        <form action="{{ route('admin.packages.delete', $package) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

                @include('pages.partial.message')

                <div class="col-12">
                    <div class="statistics-card mb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{ $package->name }}</h5>
                        </div>
                        <div class="row">
                            <div class="col-6 px-1">
                                <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                    <tbody>
                                        <tr>
                                            <td width=35%>
                                                <h6 class="card-subtitle text-muted">Location</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->location }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Featured Event</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->featured_event }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Language</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->language }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Foods</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->foods }}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6 px-1">
                                <table class="table table-borderless table-responsive border-0 mb-0 mt-3">
                                    <tbody>
                                        <tr>
                                            <td width=35%>
                                                <h6 class="card-subtitle text-muted">Departure Date</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->format_date }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Duration</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->duration }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Type</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: {{ $package->type }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="card-subtitle text-muted">Price</h6>
                                            </td>
                                            <td>
                                                <h6 class="card-subtitle text-muted">: Rp {{ $package->format_price }}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <h2 class="content-title mb-3">Description Package</h2>
                </div>

                <div class="col-12">
                    <div class="statistics-card mb-0">
                        <div class="row">
                            {!! $package->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
                    <h2 class="content-title">Package Images</h2>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.packages.add-image', $package) }}" class="btn btn-sm btn-primary">Upload Image</a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="statistics-card mb-3">
                        <div class="row justify-content-start">
                            @forelse ($package->images as $image)
                                <div class="col-12 col-md-3">
                                    <div class="card w-100">
                                        <img
                                            src="{{ asset($image->file->show_file) }}"
                                            class="thumbnail-image rounded-top"
                                            alt="package-image"
                                        >
                                        <div class="card-body p-0">
                                            <form
                                                action="{{ route('admin.packages.delete-image', [$package, $image]) }}"
                                                method="POST"
                                            >
                                                @method('DELETE')
                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger w-100 rounded-0 rounded-bottom"
                                                >Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="mb-0">No Image</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
