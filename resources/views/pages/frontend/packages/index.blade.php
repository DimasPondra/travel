@extends('layouts.app')

@section('title', 'Package - Travel')
@section('packagePage', 'active')

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
                                    Paket Travel
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg pl-lg-0 pr-lg-0">
                        <div class="card card-details">
                            <div class="text-center hero-title">
                                <h1>Destinasi Indonesia</h1>
                            </div>
                            <div class="travel-packages">
                                <div class="row">
                                    @forelse ($packages as $package)
                                        <div
                                            class="col-lg-6 d-flex justify-content-center mb-4"
                                        >
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img
                                                            src="{{ $package->first_image }}"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <div class="col details">
                                                        <ul>
                                                            <li>
                                                                <h2>
                                                                    {{ $package->name }}
                                                                </h2>
                                                            </li>
                                                            <li
                                                                class="description"
                                                            >
                                                                {{ $package->type }}
                                                            </li>
                                                            <li>{{ $package->duration }}</li>
                                                            <li>
                                                                {{ $package->departure_date }}
                                                            </li>
                                                            <li
                                                                class="price d-none d-sm-flex"
                                                            >
                                                                Rp {{ $package->format_price }}
                                                                {{-- <span>/Person</span> --}}
                                                            </li>
                                                        </ul>
                                                        <div
                                                            class="travel-button"
                                                        >
                                                            <a
                                                                href="{{ route('detail-package-page', $package) }}"
                                                                class="btn btn-travel-details btn-block"
                                                                >View Details</a
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        No Data
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
