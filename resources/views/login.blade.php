@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
<h1>Login</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('login') }}" class="justify-content-center align-items-center">
    @csrf
    <div class="mb-3 form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <label for="email" class="form-label">Email</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password" class="form-label">Password</label>
    </div>
    <div class="mb-3">
        <p>
            Não tem conta?
            <a href="{{ route('register') }}">Registe-se aqui</a>.
        </p>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
@endsection
