@extends('layouts.app')

@section('title', 'Product Details')

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
        <div class="row mb-5 prod-details rounded p-4 shadow-sm">
            {{-- Detalhes do Produto --}}
            <div class="col-md-6">
                <img src="{{ Storage::url($product->img_url) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p><strong>Marca:</strong> {{ $product->brand }}</p>
                <p><strong>Preço:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
                <p><strong>Descriçao:</strong> {{ $product->description }}</p>
            </div>
        </div>

        @if ($alternatives->count())
            <h3 class="mb-4">Produtos Alternativos</h3>
            <div class="row">
                @foreach ($alternatives as $alt)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('productDetails', $alt->id) }}" class="text-decoration-none text-dark">
                            <div class="border rounded p-3 text-center shadow-sm h-100">
                                <img src="{{ Storage::url($alt->img_url) }}" class="img-fluid mb-2"
                                     style="max-height: 150px; object-fit: contain;" alt="{{ $alt->name }}">
                                <h6 class="text-white">{{ $alt->name }}</h6>
                                <p class="mb-0 text-white">{{ number_format($alt->price, 2) }} €</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <hr>
        <h3 class="mt-5">Reviews</h3>
        <div class="reviews-section p-3 rounded mb-4 shadow-sm">
            @auth
                @if ($userReviewed)
                    <div class="alert alert-info">Já deixaste uma review para este produto:</div>
                    <div class="border p-3 mb-4">
                        <strong>{{ $userReviewed->user->name }}</strong>
                        <p class="mb-0">{{ $userReviewed->comment }}</p>
                    </div>
                @else
                    <form action="{{ route('product.review', $product->id) }}" method="POST" class="mb-4">
                        @csrf

                        {{-- Rating de 1 a 5 --}}
                        <div class="mb-3">
                            <label for="rating" class="form-label">Classificação:</label>
                            <select name="rating" id="rating" class="form-select" required>
                                <option value="" disabled selected>Seleciona uma classificação</option>
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}">{{ $i }} estrelas</option>
                                @endfor
                            </select>
                        </div>

                        {{-- Comentário --}}
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comentário:</label>
                            <textarea name="comment" id="comment" class="form-control" maxlength="1000" placeholder="Escreve um comentario..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submeter</button>
                    </form>

                @endif
            @else
                <div class="alert alert-warning">Faz <a href="{{ route('login') }}">login</a> para deixar uma review.</div>
            @endauth

            {{-- Lista de Review --}}
                @forelse ($reviews as $review)
                    <div class="border-bottom py-2">
                        <strong>{{ $review->user->name }}</strong>
                        <p class="mb-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-warning">
                                @if ($i <= $review->rating)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.174 6.765c-.33-.314-.16-.888.283-.95l4.898-.696L7.538.792a.513.513 0 0 1 .927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path
                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                        </svg>
                                    @endif
                                </span>
                            @endfor
                        </p>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @empty
                <p>Sem reviews ainda.</p>
            @endforelse
        </div>
    </div>
@endsection

