<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita & Blog')</title>
    
    <!-- Bootstrap 5.3 CSS (Alamat Lengkap & Benar) -->
    <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; color: #212529; }
        .navbar-brand { font-weight: 700; color: #2e7d32 !important; }
        .footer { background-color: #2C3E50; color: #ffffff; padding: 20px 0; font-size: 13px; }
        .card-blog { border: none; border-radius: 12px; transition: transform 0.2s; }
        .card-blog:hover { transform: translateY(-3px); }
        .badge-category { background-color: #e8f5e9; color: #2e7d32; font-weight: 500; text-decoration: none; }
    </style>
</head>
<body>

    <!-- Navigation Bar Publik -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="/blog">📰 PORTAL BLOG</a>
            <div class="ms-auto">
                <a href="/login" class="btn btn-sm btn-outline-success fw-medium px-3" style="border-radius: 20px;">Login Admin</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mb-5" style="min-height: calc(100vh - 200px);">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-center mt-auto">
        <div class="container">
            <p class="mb-1">© 2026 Proyek Aplikasi Blog - Hak Cipta Dilindungi.</p>
            <p class="text-muted small mb-0">Dikembangkan menggunakan Laravel & Bootstrap 5</p>
        </div>
    </footer>

    <!-- Bootstrap 5.3 Bundle JS (Alamat Lengkap & Benar) -->
    <script src="https://jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
