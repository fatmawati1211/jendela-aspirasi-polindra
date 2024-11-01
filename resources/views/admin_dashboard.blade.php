<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            padding-top: 20px;
            color: #fff;
        }
        .sidebar a {
            color: #ddd;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            background-color: #6c757d;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center">Admin Dashboard</h2>
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="#"><i class="bi bi-people"></i> Kelola Pengguna</a>
        <a href="#"><i class="bi bi-bar-chart"></i> Laporan</a>
        <a href="#"><i class="bi bi-gear"></i> Pengaturan</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand ms-3" href="#">Admin Panel</a>
        </nav>

        <div class="container mt-4">
            <h1 class="mb-4">Selamat Datang, Admin</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pengguna</h5>
                            <p class="card-text">100</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Baru</h5>
                            <p class="card-text">50</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Komentar Terkini</h5>
                            <p class="card-text">200</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Aktivitas Terbaru</div>
                <div class="card-body">
                    <ul>
                        <li>Pengguna baru mendaftar.</li>
                        <li>Ada laporan baru.</li>
                        <li>Admin mengubah pengaturan sistem.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
