<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-container">
        <div class="form-wrapper">
            <div class="form-box p-4 bg-white rounded shadow">
                <h2 class="text-center mb-4">📝 Create Account</h2>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('register.process') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Full Name" required>
                        <label for="nameInput">Full Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email" required>
                        <label for="emailInput">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password" required>
                        <label for="passwordInput">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                        <label for="confirmPassword">Confirm Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>

                    <div class="text-center mt-3">
                        <small>Already have an account? <a href="{{ route('login') }}">Login here</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
