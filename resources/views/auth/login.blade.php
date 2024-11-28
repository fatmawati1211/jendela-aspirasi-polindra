<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .toggle-password {
            cursor: pointer;
            margin-left: -30px;
        }
        
        .reset-link {
            font-size: 12px; /* Adjust the size as needed */
            text-align: center;
            margin-top: 10px; /* Optional: Adds some space above the link */
        }

        .reset-link a {
            color: #007bff; /* Optional: Custom link color */
            text-decoration: none; /* Optional: Remove underline */
        }
    </style>
    <script>
        function togglePasswordVisibility(id, iconId) {
            const passwordField = document.getElementById(id);
            const icon = document.getElementById(iconId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <img src="{{ asset('img/login-register.jpg') }}" alt="Login Icon" class="register-icon">
        </div>
        <div class="register-right">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <div class="input-group">
                    <i class="fas fa-envelope icon"></i> <!-- Email icon -->
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock icon"></i> <!-- Password icon -->
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye icon toggle-password" id="toggle-password"
                       onclick="togglePasswordVisibility('password', 'toggle-password')"></i>
                </div>
                <button type="submit" class="btn-register-now">LOGIN</button>
                <p class="reset-link">
                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                </p>
                <p class="login-link">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
            </form>
        </div>
    </div>
</body>
</html>
