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
            font-size: 1.2rem;
        }
        .post-body img {
            display: block;
            margin: 15px auto;
            max-width: 100%;
            height: auto;
            max-height: 500px;
        }
        .divider {
            border: 0;
            height: 3px; /* Increased thickness of the divider */
            background-color: #888; /* Darker gray color for better visibility */
            margin: 20px 0;
        }
        .back-arrow {
            color: #666666;
            font-size: 1.7rem;
            margin: 20px 20px;
            display: block;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="{{ asset(path: 'img/logo.png') }}" alt="Logo" style="width: 60px;">
        </a>
    </nav>

    <!-- Back Arrow -->
    <a href="{{ route('admin.dashboard') }}" class="back-arrow">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Content -->
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                @if($reports->isEmpty())
                    <p>No public reports available.</p>
                @else
                @foreach ($reports as $report)
                <div class="post">
                    <div class="post-header">
                        <img src="{{ asset('img/user-profil.png') }}" alt="User Icon">
                        <div>
                            <span>{{ $report->user_name ?? 'Anonim' }}</span>
                            <br>
                            <i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($report->created_at)->format('d F Y, h:i A') }}
                        </div>
                    </div>
                    <div class="post-body">
                        <p>{{ $report->deskripsi }}</p>

                        <!-- Check if there is an image file -->
                        @if ($report->file_terlampir)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $report->file_terlampir) }}" alt="File Terlampir" class="img-fluid mt-2">
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Garis Pembatas -->
                <hr class="divider">
                
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
