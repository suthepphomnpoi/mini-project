<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('search.form') }}">Mini Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbar"
                aria-controls="guestNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="guestNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.users.login') }}">เข้าสู่ระบบผู้ใช้</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.drivers.login') }}">เข้าสู่ระบบพนักงานขับรถ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
