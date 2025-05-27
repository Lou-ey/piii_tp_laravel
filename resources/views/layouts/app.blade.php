<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'A Minha Aplicação')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--@vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>
<script>
    // Espera 3 segundos e depois remove os alertas
    setTimeout(() => {
        const successAlert = document.getElementsByClassName('alert-success')[0];
        const errorAlert = document.getElementsByClassName('alert-danger')[0];

        if (successAlert) {
            successAlert.classList.remove('show');
            successAlert.classList.add('fade');
            // Remove o alerta do DOM após a animação de fade
            setTimeout(() => {
                successAlert.remove();
            }, 450);
        }

        if (errorAlert) {
            errorAlert.classList.remove('show');
            errorAlert.classList.add('fade');
            // Remove o alerta do DOM após a animação de fade
            setTimeout(() => {
                errorAlert.remove();
            }, 450);
        }
    }, 3000);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
