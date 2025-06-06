@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="nav-bar d-flex justify-content-between align-items-center mb-4 p-3">
        @if (Auth::check())
            <a href="{{ route('home') }}" class="decoration-none text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                </svg>
            </a>
            <div class="d-flex">
                <form method="GET" action="{{ route('searchProducts') }}" class="d-flex" role="search">
                    <input type="text" name="query" class="form-control me-2" placeholder="Search..." value="{{ request('query') }}" required>
                    <button type="submit" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397l3.85 3.85a1 1 0 0 0 1.414-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div>
                @if(Auth::user()->is_admin)
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm2.5 10.5a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4z"/>
                        </svg>
                        Admin
                    </button>
                @endif
                <button class="btn btn-danger" onclick="window.location.href='{{ route('logout') }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                        <path fill-rule="evenodd"
                              d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                    </svg>
                    Logout
                </button>
            </div>
        @else
            <a href="{{ route('home') }}" class="decoration-none text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                </svg>
            </a>
            <div class="d-flex">
                <form method="GET" action="{{ route('searchProducts') }}" class="d-flex" role="search">
                    <input type="text" name="query" class="form-control me-2" placeholder="Search..." value="{{ request('query') }}" required>
                    <button type="submit" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397l3.85 3.85a1 1 0 0 0 1.414-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div>
                <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login</button>
                <button class="btn btn-secondary" onclick="window.location.href='{{ route('register') }}'">Register</button>
            </div>

        @endif
    </div>
    <div class="container">
        <div class="row">
            @if(Auth::check())
                <div class="col-12 mb-4">
                    <h4>Olá, {{ Auth::user()->name }}!</h4>
                </div>
            @endif
            <h1 class="mb-3">Categorias</h1>
            <div class="col-md-4 col-sm-6 mb-4 d-flex justify-content-center align-items-center">
                <a href="{{ route('showProducts') }}"
                   class="text-decoration-none text-white">
                    <div class="prod-item border rounded-2 text-center p-3 shadow-sm d-flex justify-content-center align-items-center" style="width: 18rem; height: 18rem;">
                        <h5 class="card-title mb-3">Todas as Categorias</h5>
                    </div>
                </a>
            </div>
            @foreach($categories as $category)
                <div class="col-md-4 col-sm-6 mb-4 d-flex justify-content-center align-items-center">
                    <a href="{{ route('productsByCategory', $category->id) }}"
                       class="text-decoration-none text-white">
                        <div class="prod-item border rounded-2 text-center p-3 shadow-sm d-flex justify-content-center align-items-center" style="width: 18rem; height: 18rem;">
                            <h5 class="card-title mb-3">{{ $category->name }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
