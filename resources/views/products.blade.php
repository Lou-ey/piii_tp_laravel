@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="nav-bar d-flex justify-content-between align-items-center mb-4 p-3">
        @if (Auth::check())
            <a href="{{ route('home') }}" class="decoration-none text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </a>
            <div class="d-flex">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
                <button class="btn btn-secondary" onclick="window.location.href='{{ route('searchProducts') }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397l3.85 3.85a1 1 0 0 0 1.414-1.414l-3.85-3.85zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
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
            <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login</button>
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('register') }}'">Register</button>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4">
                    @if (isset($category))
                        Produtos da Categoria: {{ $category->name }}
                    @else
                        Todas as Categorias
                    @endif
                </h2>
            </div>
            @forelse($products as $product)
                <div class="col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                    <a href="{{ route('productDetails', ['id' => $product->id]) }}"
                       class="text-decoration-none text-white">
                        <div class="prod-item border rounded-2 text-center p-3 shadow-sm" style="width: 18rem;">
                            <img src="{{ Storage::url($product->img_url) }}" class="card-img-top mx-auto"
                                 alt="{{ $product->name }}"
                                 style="max-height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->brand }}</p>
                                <span class="badge bg-primary">{{ number_format($product->price, 2) }} €</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nenhum produto encontrado nesta categoria.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
