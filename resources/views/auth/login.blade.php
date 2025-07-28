<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <!-- Your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="bg-image">
        <div class="form-box">
            <h2 class="mb-4 text-center">Sign In to Your Account</h2>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email" required>
                    <label for="emailInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password" required>
                    <label for="passwordInput">Password</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">🔓 Login</button>

                <div class="text-center mt-3">
                    <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
