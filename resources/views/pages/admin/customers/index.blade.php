@extends('layouts.admin')

@section('title', 'Customer - Admin Panel')
@section('customerPage', 'active')

@section('content')
    <div class="col-12 col-xl-9">
        <div class="nav">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="{{ asset('backend/images/icons/burger.svg') }}" class="mb-2" alt="icon">
                    </button>
                    <h2 class="nav-title">
                        <a href="{{ route('admin.customers.index') }}">Customer</a>
                    </h2>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="content-title mb-4">List Customer</h2>
                </div>

                <div class="col-12 search-menu mb-4">
                    <form action="" method="GET">
                        <div class="row d-flex">
                            <div class="col-12 col-md-3 d-flex">
                                <input
                                    type="text"
                                    class="form-control border-0 shadow-sm"
                                    name="name"
                                    value="{{ request('name') }}"
                                    placeholder="Search name"
                                >
                            </div>
                            <div class="col-12 col-md-2 d-flex">
                                <button class="btn btn-sm btn-warning">
                                    <img src="{{ asset('backend/images/icons/search.svg') }}" alt="icon">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                @include('pages.partial.message')

                <div class="col-12">
                    <div class="statistics-card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->username }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td width="10%">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-outline-primary dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenu"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                    ></button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                                        {{-- <li>
                                                            <a
                                                                href="{{ route('admin.customers.edit', $customer) }}"
                                                                class="btn btn-sm btn-link w-100 text-start"
                                                            >Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.customers.delete', $customer) }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-link w-100 text-start">Delete</button>
                                                            </form>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex mt-4 justify-content-end">
                                {!! $customers->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
