<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela Aspirasi Polindra</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        html {
            scroll-behavior: smooth; /* Enable smooth scrolling */
        }
        .navbar, .offcanvas {
            background: linear-gradient(#088DA0, #03333A);
            color: #fff;
        }

        .navbar a, .offcanvas a {
            color: #fff;
        }
        .btn-close {
            background-color: #fff;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .navbar .nav-link {
            color: #fff; /* Changes navbar link color to white for better visibility */
        }
        /* Back to Top Button Style */
        .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        color: red; /* Ubah warna teks menjadi merah */
        border: none;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
            background: none; /* Menghilangkan background */
        }

        .back-to-top .line {
            font-size: 1.5rem; /* Ukuran garis */
            margin: 0 10px; /* Jarak antara garis dan teks */
        }

        .back-to-top .left-line {
            transform: rotate(90deg); /* Garis kiri menghadap ke bawah */
        }

        .back-to-top .right-line {
            transform: rotate(-90deg); /* Garis kanan menghadap ke atas */
        }

        .back-to-top .vertical-text {
            display: block;
            writing-mode: vertical-lr; /* Teks vertikal dari bawah ke atas */
            transform: rotate(180deg); /* Membalikkan teks untuk membaca dari bawah ke atas */
            text-align: center;
            font-size: 1.2rem;
            color: red; /* Teks "Back to Top" berwarna merah */
        }

        .back-to-top:hover {
            text-decoration: underline; /* Menambahkan garis bawah saat hover */
        }
        .procedure-card {
            position: relative;
            background-color: #d7f3fe; /* Background biru muda */
            padding: 20px;
            border-radius: 8px;
            margin: 10px 0;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            min-height: 180px; /* Menetapkan tinggi minimum agar ukuran seragam */
        }

        /* Gaya untuk kotak teks */
        .card {
            border-radius: 8px;
            border: none;
            background-color: #d7f3fe; /* Light background for card */
        }
        .card-body {
            display: flex;
            align-items: center;
            padding: 20px;
            text-align: left;
        }
        .icon-pencil, .icon-hourglass, .icon-paper-plane, .icon-bell {
            font-size: 2rem;
            color: #088DA0; /* Adjust the icon color */
        }
        .card-body p {
            margin: 0;
            font-size: 1rem;
        }
        .mb-4 {
            margin-bottom: 1.5rem; /* Space between cards */
        }
        .text-box {
            background-color: #FFFFFF; /* Background putih untuk teks */
            padding: 15px;
            border-radius: 5px;
            margin-top: 30px; /* Memberi ruang untuk ikon di atas */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1); /* Bayangan dalam */
            min-height: 80px; /* Tinggi minimum agar semua kotak seragam */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-pencil {
            font-size: 24px; /* Ukuran ikon */
            color: red; /* Warna ikon menjadi merah */
            margin-bottom: 5px; /* Memberi ruang di bawah ikon */
        }
        /* Gaya untuk teks dalam kotak */
        .text-box p {
            margin: 0;
            color: #000000; /* Warna teks */
            text-align: left; /* Rata kiri */
        }
        .icon-hourglass {
            font-size: 24px; /* Ukuran ikon */
            color: navy; /* Warna navy */
        }
        .icon-paper-plane {
            font-size: 24px; /* Ukuran ikon */
            color: #228B22; /* Warna kuning kunyit */
        }
        .icon-bell {
            font-size: 24px; /* Ukuran ikon */
            color: #DDAA00; /* Warna biru */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background:linear-gradient(#08889b, #098a9e); color: #fff;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset(path: 'img/logo.png') }}" alt="Logo" style="width: 60px;">
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="color: #fff;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3s">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#" style="color: #fff;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tentang-kami" style="color: #fff;">Tentang Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}" style="color: #fff;">Masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}" style="color: #fff;">Daftar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background: linear-gradient(#088DA0, #03333A); color: #fff;">
  <div class="offcanvas-header">
    <a class="navbar-brand" href="#">
            <img src="{{ asset(path: 'img/logo.png') }}" alt="Logo" style="width: 60px;">
    </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="color: #fff;"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#" style="color: #fff;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tentang-kami" style="color: #fff;">Tentang Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}" style="color: #fff;">Masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}" style="color: #fff;">Daftar</a>
        </li>
    </ul>
  </div>
</div>


    <!-- Header Section -->
    <header class="header-section py-5" style="background: linear-gradient(#088DA0, #03333A); color: #fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text-left">
                    <h1>Jendela Aspirasi Polindra</h1>
                    <p>Sampaikan laporan masalah anda di sini, kami akan memprosesnya dengan cepat, aman dan nyaman.</p>
                    <a href="{{ auth()->check() ? url('/laporan') : url('/login') }}" 
                        class="btn btn-warning" 
                        onclick="return confirmRedirectToLogin()">Laporkan!
                    </a>
                    <a href="#procedure" class="btn btn-secondary">Tata Cara Pelaporan</a>
                </div>
                <div class="col-md-4 text-right">
                    <img src="{{ asset('img/laporan.png') }}" alt="Icon" style="width: 300px;"> <!-- Adjust width as needed -->
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="statistics-section py-5" id="tentang-kami" style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #000000;"><strong>Tentang Kami</strong></h2> <!-- Increased bottom margin for the main title -->
            <div class="row">
                <div class="col-md-6">
                    <h3 style="color: #000000; margin-bottom: 20px;">Jendela Aspirasi Polindra</h3> <!-- Added bottom margin -->
                    <p style="color: #000000; margin-bottom: 15px;">Jendela Aspirasi Polindra adalah platform untuk menampung suara mahasiswa, termasuk aspirasi, kritik, dan pengaduan terkait pelayanan kampus dan isu kekerasan seksual. Bergabunglah untuk bersama-sama menciptakan lingkungan kampus yang lebih baik dan aman!</p>
                </div>
                <div class="col-md-6">
                    <h3 style="color: #000000; margin-bottom: 20px;">Tujuan Website JAP</h3> <!-- Added bottom margin -->
                    <p style="color: #000000; margin-bottom: 15px;">
                        <i class="fas fa-check-circle" style="color: #000000; margin-right: 8px;"></i>
                        Memberikan informasi atau laporan yang jelas kepada pihak kampus agar bisa ditindaklanjuti.
                    </p>
                    <p style="color: #000000; margin-bottom: 15px;">
                        <i class="fas fa-check-circle" style="color: #000000; margin-right: 8px;"></i>
                        Memudahkan mahasiswa untuk menyampaikan laporan/pengaduan kepada pihak kampus.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics-section py-5" style="background-color: #CEEBFF;">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <div class="icon me-3">
                        <i class="fas fa-users fa-3x" style="color: #000000;"></i> <!-- Example icon -->
                    </div>
                    <div class="text-start">
                        <h2 style="color: #000000;"><strong>{{ $userCount }}</strong></h2>
                        <h5 style="color: #000000;">Pengguna</h5>
                        <p style="color: #000000;">Daftar pengguna website JAP</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="icon me-3">
                        <i class="fas fa-comments fa-3x" style="color: #000000;"></i> <!-- Example icon -->
                    </div>
                    <div class="text-start">
                        <h2 style="color: #000000;"><strong>150</strong></h2>
                        <h5 style="color: #000000;">Pengaduan</h5>
                        <p style="color: #000000;">Jumlah pengaduan yang dilaporkan</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="icon me-3">
                        <i class="fas fa-check-circle fa-3x" style="color: #000000;"></i> <!-- Example icon -->
                    </div>
                    <div class="text-start">
                        <h2 style="color: #000000;"><strong>100</strong></h2>
                        <h5 style="color: #000000;">Tanggapan</h5>
                        <p style="color: #000000;">Tanggapan yang diberikan kepada mahasiswa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Procedure Section -->
    <section id="procedure" class="procedure-section py-5" style="background-color: #FFFFFF;">
        <div class="container text-center">
            <h2 style="color: #000000;"><strong>Tata Cara Pelaporan</strong></h2>
            <p style="color: #000000;">Berikut adalah langkah-langkah pelaporan di website Jendela Aspirasi Polindra</p>
            <div class="row justify-content-center">
                <!-- Kolom 1 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-pencil-alt icon-pencil me-4" style="font-size: 2rem; color: #088DA0;"></i> <!-- me-4 untuk jarak lebih besar -->
                            <p class="m-0" style="color: #000000;">Tuliskan laporan dengan jelas dan baik</p>
                        </div>
                    </div>
                </div>
                <!-- Kolom 2 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-hourglass-half icon-hourglass me-4" style="font-size: 2rem; color: #088DA0;"></i> <!-- me-4 untuk jarak lebih besar -->
                            <p class="m-0" style="color: #000000;">Tunggu laporan diverifikasi oleh admin</p>
                        </div>
                    </div>
                </div>
                <!-- Kolom 3 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-paper-plane icon-paper-plane me-4" style="font-size: 2rem; color: #088DA0;"></i> <!-- me-4 untuk jarak lebih besar -->
                            <p class="m-0" style="color: #000000;">Laporan sedang diproses dan ditindaklanjuti</p>
                        </div>
                    </div>
                </div>
                <!-- Kolom 4 -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-bell icon-bell me-4" style="font-size: 2rem; color: #088DA0;"></i> <!-- me-4 untuk jarak lebih besar -->
                            <p class="m-0" style="color: #000000;">Dapatkan notifikasi tentang laporan anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4" style="background: linear-gradient(#088DA0, #03333A); color: #fff;">
            <div class="container text-center">
                <p>&copy; 2024 Jendela Aspirasi Polindra. All Rights Reserved.</p>
            </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <span class="vertical-text">----- Back to Top -----</span>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Show button when scrolling down
        window.onscroll = function() {
            const backToTopButton = document.getElementById('backToTop');
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        };

        // Smooth scroll to top when button is clicked
        document.getElementById('backToTop').onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        function confirmRedirectToLogin() {
            const isConfirmed = confirm("Anda harus login terlebih dahulu. Apakah Anda ingin login?");
            if (isConfirmed) {
                window.location.href = "{{ url('/login') }}"; // Redirect to login page
            }
            return false; // Prevent default link behavior
        }
    </script>
</body>
</html>
