<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        form p {
            margin-bottom: 20px; /* Adjust the value as needed for the desired space */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <img src="{{ asset('img/login-register.jpg') }}" alt="Reset Password Icon" class="register-icon">
        </div>
        <div class="register-right">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <h2>Reset Password</h2>
                <p>Masukkan alamat email Anda untuk menerima tautan reset password.</p>
                <div class="input-group">
                    <i class="fas fa-envelope icon" aria-hidden="true"></i> <!-- Email icon -->
                    <input type="email" name="email" placeholder="E-mail" required aria-label="Email Address">
                </div>
                <button type="submit" class="btn-register-now">KIRIM TAUTAN RESET</button>
                <p class="login-link">Kembali ke halaman <a href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
