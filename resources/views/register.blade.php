<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
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
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
