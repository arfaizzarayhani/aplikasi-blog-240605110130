<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Blog - Artikel Terbaru')</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 14px;
            color: #212529;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar-blog {
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .navbar-blog .navbar-brand {
            font-weight: 700;
            color: #2e7d32 !important;
            font-size: 18px;
        }

        .navbar-blog .btn-login {
            background-color: #2e7d32;
            color: #ffffff !important;
            font-size: 12px;
            font-weight: 500;
            border-radius: 20px;
            padding: 6px 16px !important;
            transition: background-color 0.2s;
        }

        .navbar-blog .btn-login:hover {
            background-color: #215d25;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 30px 0;
        }

        /* Footer Styling */
        .footer-blog {
            background-color: #2C3E50;
            color: #ffffff;
            padding: 30px 0;
            margin-top: auto;
            font-size: 13px;
            text-align: center;
        }

        .footer-blog p {
            margin: 8px 0;
        }

        .footer-blog .text-muted {
            color: #bbb !important;
        }

        /* Badge Kategori Style */
        .badge-cms {
            font-size: 11px;
            font-weight: 600;
            color: #212529;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
        }

        /* Tombol Hijau CMS */
        .btn-green-cms {
            background-color: #2e7d32;
            color: #ffffff !important;
            border: none;
            font-size: 12px;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.2s;
            display: inline-block;
        }

        .btn-green-cms:hover {
            background-color: #215d25;
            color: #ffffff !important;
        }

        /* Card Blog */
        .card-blog {
            border: none;
            border-radius: 8px;
            transition: box-shadow 0.2s;
        }

        .card-blog:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 0;
            }

            .navbar-blog .navbar-brand {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Bar Publik -->
    <nav class="navbar navbar-expand-lg navbar-blog">
        <div class="container">
            <a class="navbar-brand" href="/">📰 CMS Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/login" class="btn btn-login">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-blog">
        <div class="container">
            <p class="mb-1">© 2026 Proyek Aplikasi Blog - Hak Cipta Dilindungi.</p>
            <p class="text-muted mb-0">Dikembangkan menggunakan Laravel & Bootstrap 5</p>
        </div>
    </footer>

    <!-- Bootstrap 5.3 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
