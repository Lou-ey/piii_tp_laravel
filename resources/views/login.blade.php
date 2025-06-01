@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        {{-- Formulário de Login --}}
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

