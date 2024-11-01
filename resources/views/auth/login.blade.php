<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-register-now">LOGIN</button>
                <p class="login-link">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
            </form>
        </div>
    </div>
</body>
</html>
