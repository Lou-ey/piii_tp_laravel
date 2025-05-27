@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center">
        <p>Esta é a página inicial da aplicação.</p>
        @if (Auth::check())
            <p>Olá, {{ Auth::user()->name }}!</p>
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('logout') }}'">Logout</button>
        @else
            <button class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">Login</button>
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('register') }}'">Register</button>
        @endif
    </div>
@endsection
