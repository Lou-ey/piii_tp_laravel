@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Dashboard</h1>
            <p>Bem Vindo, {{ Auth::user()->name  }}!</p>
        </div>
        <button class="btn btn-danger mb-3" onclick="window.location.href='{{ route('logout') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg> Logout
        </button>
    </div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">Lista de Utilizadores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="create-user-tab" data-bs-toggle="tab" data-bs-target="#create-user" type="button" role="tab">Criar Utilizador</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="add-category-tab" data-bs-toggle="tab" data-bs-target="#add-category" type="button" role="tab">Adicionar Categoria</button>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="add-product-tab" data-bs-toggle="tab" data-bs-target="#add-product" type="button" role="tab">Adicionar Produto Original</button>
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
            <h3>Criar Utilizador</h3>
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
                    <input class="form-check-input" type="checkbox" role="switch" id="adminSwitch" name="is_admin" value="true">
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
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>
        </div>

        <!-- Adicionar Produto -->
        <div class="tab-pane fade" id="add-product" role="tabpanel">
            <h3>Adicionar Produto</h3>
            <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nome do Produto</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Marca</label>
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
                <div class="mb-3">
                    <label>Descrição</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Preço</label>
                    <input type="number" name="price" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label>Imagem</label>
                    <input type="file" name="image_url" class="form-control" accept="image/*" required>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="premiumSwitch" name="is_premium" value="true">
                    <label class="form-check-label" for="premiumSwitch">Produto Original</label>
                </div>
                <!-- Campos só visíveis se NÃO for produto original -->
                <div id="alternative-fields">
                    <div class="mb-3">
                        <label for="original-product" class="form-label">Associar a Produto Original</label>
                        <select class="form-control" id="original-product" name="original_product_id">
                            @foreach($originalProducts as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>
        </div>
    </div>
    <!-- Script para mostrar/esconder campos -->
    <!--<script>
        const premiumSwitch = document.getElementById('premiumSwitch');
        const altFields = document.getElementById('alternative-fields');

        function toggleAlternativeFields() {
            altFields.style.display = premiumSwitch.checked ? 'none' : 'block';
            if (!premiumSwitch.checked) {
                document.getElementById('original-product').setAttribute('required', 'required');
            } else {
                document.getElementById('original-product').removeAttribute('required');
            }
        }

        premiumSwitch.addEventListener('change', toggleAlternativeFields);
        window.addEventListener('DOMContentLoaded', toggleAlternativeFields);
    </script>-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const premiumSwitch = document.getElementById('premiumSwitch');
            const fieldsToToggle = [
                'original-product',
            ];

            function toggleFields() {
                const disable = premiumSwitch.checked;
                fieldsToToggle.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.disabled = disable;
                });
            }

            toggleFields();

            premiumSwitch.addEventListener('change', toggleFields);
        });
    </script>
@endsection
