<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
            margin-bottom: 15px;
        }
        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .post-info {
            display: flex;
            flex-direction: column;
        }
        .post-meta {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .post-meta span {
            display: flex;
            align-items: center;
        }
        .post-meta i {
            margin-right: 7px;
        }
        .post-body {
            margin-top: 10px;
            font-size: 1.2rem;
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
            margin-top: 30px;
            border-radius: 8px;
            background-color: #F3F6F8;
        }
        .trending-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 2rem;
            padding: 10px;
        }
        .trending-topics li {
            margin-bottom: 7px;
            list-style: none;
            font-size: 1.3rem;
            padding: 10px;
        }
        .trending-topics span {
            color: #555;
            padding: 10px;
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
    <a href="/" class="back-arrow">
        <i class="bi bi-arrow-left"></i>
    </a>

    <!-- Content -->
    <div class="container content">
        <div class="row">
            <!-- Left Column - Reports -->
            <div class="col-md-8">
                <div class="row">
                    @if($reports->isEmpty())
                        <p>No public reports available.</p>
                    @else
                        @foreach ($reports as $report)
                            @if ($report->status == 'Selesai')  <!-- Only show reports with 'Selesai' status -->
                                <div class="col-md-12">
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
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Right Column - Trending Topics -->
            <div class="col-md-4">
                <div class="trending-topics">
                    <div class="trending-title">Trending Topics</div>
                    <ul class="list-unstyled">
                        @foreach($trendingTopics as $topic)
                            <li>
                                <strong># {{ $topic->kategori_laporan }}</strong>
                                <br><span class="text-muted">({{ number_format($topic->count) }} posts)</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
