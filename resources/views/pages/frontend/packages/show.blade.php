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
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $package->name }}</h1>
                            <p>{{ $package->location }}</p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img
                                        src="{{ $package->first_image }}"
                                        class="xzoom"
                                        id="xzoom-default"
                                        xoriginal="{{ $package->first_image }}"
                                    />
                                </div>
                                <div class="xzoom-thumbs">
                                    @forelse ($package->images as $image)
                                        <a
                                            href="{{ $image->file->show_file }}"
                                        >
                                            <img
                                                src="{{ $image->file->show_file }}"
                                                class="xzoom-gallery"
                                                width="128"
                                                xpreview="{{ $image->file->show_file }}"
                                            />
                                        </a>
                                    @empty
                                        <a
                                            href="{{ $package->first_image }}"
                                        >
                                            <img
                                                src="{{ $package->first_image }}"
                                                class="xzoom-gallery"
                                                width="128"
                                                xpreview="{{ $package->first_image }}"
                                            />
                                        </a>
                                    @endforelse
                                </div>
                            </div>
                            <h2>Tentang Wisata</h2>
                            {!! $package->description !!}
                            <div class="features row">
                                <div class="col-md-4">
                                    <img
                                        src="{{ asset('frontend/images/Icon-Event.png') }}"
                                        alt=""
                                        class="features-image"
                                    />
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>{{ $package->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img
                                        src="{{ asset('frontend/images/Icon-Bahasa.png') }}"
                                        alt=""
                                        class="features-image"
                                    />
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $package->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img
                                        src="{{ asset('frontend/images/Icon-Foods.png') }}"
                                        alt=""
                                        class="features-image"
                                    />
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $package->foods }}</p>
                                    </div>
                                </div>
                            </div>
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
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Date of Departure</th>
                                    <td width="50%" class="text-right">
                                        {{ $package->format_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">
                                        {{ $package->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">
                                        {{ $package->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">
                                        Rp {{ $package->format_price }}
                                         {{-- / Person --}}
                                    </td>
                                </tr>
                            </table>
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

@push('before-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWidth: 500,
                title: false,
                tint: "#333",
                Xoffset: 15,
            });
        });
    </script>
@endpush
