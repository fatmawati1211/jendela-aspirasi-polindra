<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        function toggleFields() {
            const roleUser = document.getElementById('user');
            const nimInput = document.getElementById('nim-nidn');
            const nimIcon = document.getElementById('nim-icon');

            if (roleUser.checked) {
                nimInput.placeholder = "NIM";   // Placeholder for NIM
                nimInput.name = "nim";          // Set input name to nim
                nimInput.required = true;       // Make it required
            } else {
                nimInput.placeholder = "NIDN";   // Placeholder for NIDN
                nimInput.name = "nidn";         // Set input name to nidn
                nimInput.required = true;       // Make it required
            }
        }
    </script>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <img src="{{ asset('img/login-register.jpg') }}" alt="Register Icon" class="register-icon">
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
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h2>Register</h2>
                <div class="input-group">
                    <i id="nim-icon" class="fas fa-user icon"></i> <!-- User icon -->
                    <input type="text" id="nim-nidn" name="nim" placeholder="NIM" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-redo icon"></i>
                    <input type="password" name="password_confirmation" placeholder="Re-password" required>
                </div>
                <div class="role-options">
                    <input type="radio" name="role" value="user" id="user" checked onclick="toggleFields()">
                    <label for="user">User</label>
                    <input type="radio" name="role" value="admin" id="admin" onclick="toggleFields()">
                    <label for="admin">Admin</label>
                </div>
                <button type="submit" class="btn-register-now">REGISTER NOW</button>
                <p class="login-link">Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
