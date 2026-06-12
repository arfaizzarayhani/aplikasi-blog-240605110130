<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CMS Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f4f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            animation: slideUp 0.5s ease-out;
            border-top: 4px solid #2C3E50;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header .logo {
            width: 60px;
            height: 60px;
            background-color: #2C3E50;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: white;
        }

        .login-header h1 {
            color: #2C3E50;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2C3E50;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            background-color: white;
            border-color: #2C3E50;
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #999;
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #e0e0e0;
            color: #2C3E50;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .input-group:focus-within .input-group-text {
            border-color: #2C3E50;
            background-color: rgba(44, 62, 80, 0.05);
        }

        .btn-login {
            background-color: #2C3E50;
            border: none;
            color: white;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(44, 62, 80, 0.3);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert-error {
            background-color: #fff0f0;
            border: 2px solid #f5c6c6;
            color: #c0392b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer p {
            color: #666;
            font-size: 13px;
            margin: 0;
        }

        .login-footer a {
            color: #2C3E50;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #1a252f;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
        }

        .remember-me input[type="checkbox"] {
            cursor: pointer;
            accent-color: #2C3E50;
        }

        .remember-me label {
            margin: 0;
            cursor: pointer;
            color: #666;
            font-size: 13px;
            font-weight: 400;
            text-transform: none;
            letter-spacing: normal;
        }

        .form-icon {
            position: relative;
        }

        .form-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #2C3E50;
            font-size: 16px;
            pointer-events: none;
        }

        .form-icon .form-control {
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo">
                    <i class="bi bi-newspaper"></i>
                </div>
                <h1>CMS Blog</h1>
                <p>Sistem Manajemen Konten Blog</p>
            </div>

            <!-- Alert Error -->
            @if(session('error'))
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Form Login -->
            <form method="POST" action="/login" class="login-form">
                @csrf

                <div class="form-group">
                    <label for="user_name">Username</label>
                    <div class="form-icon">
                        <i class="bi bi-person"></i>
                        <input 
                            type="text"
                            id="user_name"
                            name="user_name"
                            class="form-control"
                            placeholder="Masukkan username Anda"
                            required
                            autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="form-icon">
                        <i class="bi bi-lock"></i>
                        <input 
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password Anda"
                            required>
                    </div>
                </div>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" value="on">
                    <label for="remember">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </button>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <p>© 2026 CMS Blog - Hak Cipta Dilindungi</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>