<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ibiza Trans Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <!-- Header -->
            <div class="login-header">
                <h1 class="login-brand">IBIZA TRANS</h1>
                <p class="login-subtitle">Admin Access Panel</p>
                <p class="login-description">Masuk untuk mengelola data website Ibiza Trans.</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-error">
                    @if ($errors->has('login'))
                        <p>{{ $errors->first('login') }}</p>
                    @else
                        <p>Terdapat kesalahan pada form. Silakan periksa kembali.</p>
                    @endif
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login.submit') }}" method="POST" class="login-form">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="admin@ibizatrans.com"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="toggle-password" id="toggle-password-btn">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group checkbox-group">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="form-checkbox"
                    >
                    <label for="remember" class="checkbox-label">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-login">Masuk</button>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <a href="/" class="back-link">← Kembali ke Website</a>
            </div>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-password-btn');
            const passwordInput = document.getElementById('password');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';

                    // Update icon
                    this.innerHTML = isPassword
                        ? '<i class="ri-eye-off-line"></i>'
                        : '<i class="ri-eye-line"></i>';
                });
            }
        });
    </script>
</body>
</html>
