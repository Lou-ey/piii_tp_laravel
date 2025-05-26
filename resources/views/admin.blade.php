@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Dashboard</h1>
            <p>Bem Vindo, {{ Auth::user()->name  }}!</p>
        </div>
        <button class="btn btn-secondary mb-3" onclick="window.location.href='{{ route('logout') }}'">Logout</button>
    </div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">Lista de Utilizadores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="create-user-tab" data-bs-toggle="tab" data-bs-target="#create-user" type="button" role="tab">Criar Utilizador Admin</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="add-product-tab" data-bs-toggle="tab" data-bs-target="#add-product" type="button" role="tab">Adicionar Produto</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mt-3">
        <!-- Lista de Utilizadores -->
        <div class="tab-pane fade show active" id="users" role="tabpanel">
            <h3>Utilizadores</h3>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">{{ $user->name }} @if($user->is_admin === true) (admin) @endif</li>
                @endforeach
            </ul>
        </div>

        <!-- Criar Utilizador -->
        <div class="tab-pane fade" id="create-user" role="tabpanel">
            <h3>Criar Utilizador Admin</h3>
            <form action="{{ route('admin.storeUser') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="adminSwitch" name="is_admin" value="1">
                    <label class="form-check-label" for="adminSwitch">Admin</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

        <!-- Adicionar Categoria -->
        <div class="tab-pane fade" id="add-category" role="tabpanel">
            <h3>Adicionar Categoria</h3>
            <form action="{{ route('admin.storeCategory') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nome da Categoria</label>
                    <input type="text" name="category_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>
        </div>

        <!-- Adicionar Produto -->
        <div class="tab-pane fade" id="add-product" role="tabpanel">
            <h3>Adicionar Produto</h3>
            <form action="{{ route('admin.storeProduct') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nome do Produto</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Categoria</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
