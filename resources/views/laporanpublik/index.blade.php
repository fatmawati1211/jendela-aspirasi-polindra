<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Publik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar {
            background: linear-gradient(#088DA0, #03333A);
            color: #fff;
        }
        .navbar-brand {
            margin-left: 20px;
        }
        .content {
            margin-top: 20px;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }
        .post-header {
            display: flex;
            align-items: center;
        }
        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .post-body {
            margin-top: 10px;
            font-size: 1.2rem; /* Ukuran font yang diperbesar */
        }
        .post-body img {
            max-width: 100%;
            height: auto;
            max-height: 500px;
        }
        .trending-topics {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: #000;
            padding: 15px;
            margin-top: 30px; /* Adjusted margin */
            border-radius: 8px;
            background-color: #F3F6F8; /* Set background color */
        }
        .trending-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 2rem; /* Increase title font size */
            padding: 10px; /* Add padding for better appearance */
        }
        .trending-topics li {
            margin-bottom: 7px;
            list-style: none;
            font-size: 1.3rem; /* Increase list item font size */
            padding: 10px; /* Add padding for better appearance */
        }
        .trending-topics span {
            color: #555;
            padding: 10px; /* Add padding for better appearance */
        }
        .back-arrow {
            color: #666666; /* Light gray color */
            font-size: 1.7rem; /* Adjust icon size */
            margin: 20px 20px; /* Adjust margin for better positioning */
            display: block; /* Ensure it's a block element for spacing */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 150px;">
        </a>
    </nav>

    <!-- Back Arrow -->
    <a href="{{ route('admin.dashboard') }}" class="back-arrow">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Content -->
    <div class="container content">
        <div class="row">
            <!-- Left Side - Posts -->
            <div class="col-md-8">
                <!-- Post 1 - Bullying -->
                <div class="post">
                    <div class="post-header">
                        <img src="img/user-profil.png" alt="User Icon">
                        <div>
                            <span>Anonim</span>
                            <br>
                            <i class="bi bi-calendar"></i> 20 Oktober 2024, 08:16 PM
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Pengaduan mengenai kasus bullying yang terjadi di lingkungan sekolah. Memerlukan perhatian lebih dari pihak berwenang.</p>
                        <img src="img/bullying.jpg" alt="Bullying Image" class="img-fluid mt-2">
                    </div>
                </div>

                <!-- Post 2 - Pencemaran Nama Baik -->
                <div class="post">
                    <div class="post-header">
                        <img src="img/user-profil.png" alt="User Icon">
                        <div>
                            <span>Anonim</span>
                            <br>
                            <i class="bi bi-calendar"></i> 19 Oktober 2024, 05:12 PM
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Laporan pencemaran nama baik di media sosial yang menyebabkan kerugian besar bagi korban.</p>
                    </div>
                </div>

                <!-- Post 3 - Fasilitas Rusak -->
                <div class="post">
                    <div class="post-header">
                        <img src="img/user-profil.png" alt="User Icon">
                        <div>
                            <span>Anonim</span>
                            <br>
                            <i class="bi bi-calendar"></i> 18 Oktober 2024, 09:45 AM
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Fasilitas umum yang rusak, seperti toilet dan bangku taman, memerlukan perbaikan segera.</p>
                        <img src="img/fasilitas-rusak.jpg" alt="Damaged Facility Image" class="img-fluid mt-2">
                    </div>
                </div>

                <!-- Post 4 - Kekerasan Seksual -->
                <div class="post">
                    <div class="post-header">
                        <img src="img/user-profil.png" alt="User Icon">
                        <div>
                            <span>Anonim</span>
                            <br>
                            <i class="bi bi-calendar"></i> 17 Oktober 2024, 02:33 PM
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Laporan tentang kekerasan seksual yang terjadi di lingkungan kerja. Korban meminta bantuan dari lembaga yang berwenang.</p>
                    </div>
                </div>

                <!-- Post 5 - Kasus Lainnya -->
                <div class="post">
                    <div class="post-header">
                        <img src="img/user-profil.png" alt="User Icon">
                        <div>
                            <span>Anonim</span>
                            <br>
                            <i class="bi bi-calendar"></i> 16 Oktober 2024, 11:22 AM
                        </div>
                    </div>
                    <div class="post-body">
                        <p>Pengaduan lain terkait keluhan pelayanan publik yang kurang memuaskan.</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Trending Topics -->
            <div class="col-md-4">
                <div class="trending-topics">
                    <div class="trending-title">Trending Topics</div>
                    <ul class="list-unstyled">
                        <li>
                            <strong># Bullying</strong>
                            <br><span class="text-muted">(5.220 posts)</span>
                        </li>
                        <li>
                            <strong># UKTMahal</strong>
                            <br><span class="text-muted">(1.182 posts)</span>
                        </li>
                        <li>
                            <strong># PencemaranNamaBaik</strong>
                            <br><span class="text-muted">(231 ribu posts)</span>
                        </li>
                        <li>
                            <strong># Pelecehan</strong>
                            <br><span class="text-muted">(34,6 ribu posts)</span>
                        </li>
                        <li>
                            <strong># FasilitasRusak</strong>
                            <br><span class="text-muted">(20,7 ribu posts)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
