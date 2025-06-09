@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4">
        <a href="{{ route('home') }}" class="decoration-none text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill"
                 viewBox="0 0 16 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
            </svg>
        </a>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="border rounded shadow-sm p-4 w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="mb-3 text-center">
                    <p class="mb-0">
                        Não tem conta? <a href="{{ route('register') }}">Registe-se aqui</a>.
                    </p>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

