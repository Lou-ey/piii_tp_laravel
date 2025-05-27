@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h1>Register</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@error('password')
<div class="text-danger">{{ $message }}</div>
@enderror

@error('password_confirmation')
<div class="text-danger">{{ $message }}</div>
@enderror
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        <label for="name" class="form-label">Name</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        <label for="username" class="form-label">Username</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <label for="email" class="form-label">Email address</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Password</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        <label for="password_confirmation">Confirm Password</label>
    </div>
    <div class="mb-3">
        <p>
            Já tem conta?
            <a href="{{ route('login') }}">Faça login aqui.</a>
        </p>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection
