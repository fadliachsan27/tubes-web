<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 380px;">
            <div class="card-header text-center">
                <h4>Login</h4>
            </div>

            <div class="card-body">
                <div id="alert"></div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form id="loginForm">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                👁️
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>Belum punya akun?</small><br>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        }

        document.getElementById('loginForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const response = await fetch("{{ url('/api/login') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    email: email.value,
                    password: password.value
                })
            });

            const result = await response.json();

            if (result.status) {
                await fetch("{{ url('/set-session') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(result.data)
                });

                window.location.href = "{{ route('dashboard') }}?login=success";
            } else {
                document.getElementById('alert').innerHTML =
                    `<div class="alert alert-danger">${result.message}</div>`;
            }
        });
    </script>

</body>

</html>