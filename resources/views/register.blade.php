@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="border rounded                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                shadow-sm p-4" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Criar Conta</h2>

            {{-- Mensagens de erro --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nome --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                    <label for="name">Nome</label>
                </div>

                {{-- Username --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>

                {{-- Email --}}
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>

                {{-- Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                {{-- Confirmar Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Password" required>
                    <label for="password_confirmation">Confirmar Password</label>
                </div>

                {{-- Link para login --}}
                <div class="mb-3 text-center">
                    <p class="mb-0">
                        Já tem conta? <a href="{{ route('login') }}">Faça login aqui</a>.
                    </p>
                </div>

                {{-- Botão --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

