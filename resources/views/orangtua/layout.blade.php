<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Orang Tua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand">Aplikasi Wali Kelas</span>
        <div>
            <form method="POST" action="{{ route('orangtua.logout') }}">
                @csrf
                <button class="btn btn-light btn-sm" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
