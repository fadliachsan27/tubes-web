<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Dashboard</span>
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        @if(request('login') == 'success')
            <div class="alert alert-success alert-dismissible fade show">
                Login berhasil! Selamat datang 👋
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="alert alert-success">
            <h4>Selamat Datang, {{ session('user.name') }}</h4>
            <p>Email: {{ session('user.email') }}</p>
        </div>
    </div>

</body>

</html>