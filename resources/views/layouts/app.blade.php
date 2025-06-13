<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'A Minha Aplicação')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>
<script>
    setTimeout(() => {
        const successAlert = document.getElementsByClassName('alert-success')[0];
        const errorAlert = document.getElementsByClassName('alert-danger')[0];

        if (successAlert) {
            successAlert.classList.remove('show');
            successAlert.classList.add('fade');
            setTimeout(() => {
                successAlert.remove();
            }, 400);
        }

        if (errorAlert) {
            errorAlert.classList.remove('show');
            errorAlert.classList.add('fade');
            setTimeout(() => {
                errorAlert.remove();
            }, 400);
        }
    }, 3000);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
