<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        .toggle-password {
            cursor: pointer;
            margin-left: -30px;
        }
    </style>
    <script>
        function toggleFields() {
            const roleUser = document.getElementById('user');
            const nimInput = document.getElementById('nim-nidn');

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
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye icon toggle-password" id="toggle-password"
                       onclick="togglePasswordVisibility('password', 'toggle-password')"></i>
                </div>
                <div class="input-group">
                    <i class="fas fa-redo icon"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-password" required>
                    <i class="fas fa-eye icon toggle-password" id="toggle-password-confirmation"
                       onclick="togglePasswordVisibility('password_confirmation', 'toggle-password-confirmation')"></i>
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
