<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .sidebar {
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(#088DA0, #03333A);
        padding-top: 100px; /* Increased padding at the top for spacing */
        padding-left: 15px; /* Adjusted padding */
        padding-right: 15px; /* Optional: Add right padding */
        color: #fff;
    }
    .sidebar .profile {
        display: flex; /* Align items in a row */
        align-items: center; /* Center vertically */
        margin-bottom: 30px; /* Space below the profile */
    }
    .sidebar .profile img {
        border-radius: 50%; /* Round the profile image */
        margin-right: 10px; /* Space between the image and text */
        width: 50px; /* Set a specific width for the image */
        height: 50px; /* Set a specific height for the image */
    }
    .sidebar .profile-text h4 {
        margin: 0; /* Remove default margin */
        font-size: 1.5em; /* Increase font size */
    }
    .sidebar a {
        color: #fff;
        padding: 10px;
        display: block;
        text-decoration: none;
        margin-bottom: 15px; /* Increased space between features */
    }
    .sidebar a i {
        margin-right: 10px; /* Jarak antara ikon dan teks */
    }
    .sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    /* Main content styling */
    .content {
        margin-left: 250px;
        padding: 20px;
    }
    .navbar {
        background-color: #f8f9fa;
    }
    
    /* Align "Home / Dashboard" text to the right */
    .navbar .navbar-text {
        margin-left: auto;
        font-weight: bold;
    }
    
    /* Card styling */
    .card {
        text-align: center;
        color: #fff;
        cursor: pointer;
        position: relative;
    }
    .card .card-body {
        padding-bottom: 30px; /* Make room for the info overlay */
    }
    .card .info-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.2); /* Overlay color */
        padding: 10px 0;
        font-size: 0.9em;
        border-radius: 0 0 5px 5px;
        text-align: center;
    }
    
    /* Card background colors and overlay */
    .card.bg-cyan { background-color: #00C4CC; }
    .card.bg-cyan .info-overlay { background-color: rgba(59, 130, 134, 0.8); }
    .card.bg-red { background-color: #dc3545; }
    .card.bg-red .info-overlay { background-color: rgba(150, 0, 20, 0.8); }
    .card.bg-yellow { background-color: #ffc107; }
    .card.bg-yellow .info-overlay { background-color: rgba(180, 130, 0, 0.8); }
    .card.bg-green { background-color: #28a745; }
    .card.bg-green .info-overlay { background-color: rgba(20, 100, 35, 0.8); }

    /* Styling Kalender */
  .calendar {
            width: 50%; /* Lebar penuh */
            margin: 30px 0;
            background-color: #d3d3d3; /* Abu-abu semi */
            border-radius: 10px;
            padding: 20px;
            color: #333; /* Warna teks gelap */
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .calendar-header button {
            background: none;
            border: none;
            color: #333; /* Warna teks gelap */
            font-size: 1.5em;
            cursor: pointer;
        }
        .calendar-header button:hover {
            color: #000; /* Warna saat hover */
        }
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr); /* 7 kolom untuk hari Senin hingga Minggu */
            gap: 10px; /* Jarak antar kotak */
            text-align: center;
        }
        .day {
            padding: 15px;
            border-radius: 5px;
            background-color: rgba(128, 128, 128, 0.2); /* Abu-abu semi transparan */
            color: #333; /* Warna teks */
        }
        .day:hover {
            background-color: rgba(128, 128, 128, 0.5); /* Efek hover abu-abu lebih gelap */
        }
        .day.current-day {
            background-color: #808080; /* Abu-abu gelap */
            color: #fff; /* Warna teks putih */
        }
        .day-name {
            font-weight: bold;
            background-color: transparent;
            color: #555; /* Warna teks untuk nama hari */
        }
</style>

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('img/user-profil.png') }}" alt="Admin" class="img-fluid">
            <div class="profile-text">
                <h4>Admin</h4>
            </div>
        </div>
        <a href="{{ url('admin/dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="#laporanSubmenu" class="dropdown-toggle" data-bs-toggle="collapse"><i class="bi bi-envelope"></i> Seluruh Laporan</a>
        <div id="laporanSubmenu" class="collapse">
            <a href="{{ url('/laporanpublik') }}">Laporan Publik</a>
            <a href="{{ url('/laporan-privates') }}">Laporan Privat</a>
        </div>
        <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <span class="navbar-text">
                    Home / Dashboard
                </span>
            </div>
        </nav>

        <div class="container mt-4">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4"> <!-- Added row-cols-1 and row-cols-md-4 for responsive layout -->
            <div class="col">
                <div class="card bg-cyan mb-3">
                    <div class="card-body">
                        <h3><strong>{{ $totalReports }}</strong></h3>
                        <p>Seluruh Laporan</p>
                    </div>
                    <div class="info-overlay">
                        <a href="{{ url('/admin/seluruh-laporan') }}" class="text-white">More Info <i class="bi bi-info-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-red mb-3">
                    <div class="card-body">
                        <h3><strong>{{ $reportsInQueueCount }}</strong></h3> <!-- Display the reports in queue count -->
                        <p>Laporan Terverifikasi</p>
                    </div>
                    <div class="info-overlay">
                        <!-- Link to 'laporan-terverifikasi' page -->
                        <a href="{{ route('admin.laporan-terverifikasi') }}" class="text-white">More Info <i class="bi bi-info-circle"></i></a>
                    </div>
                </div>
            </div>
                <div class="col">
                    <div class="card bg-yellow mb-3">
                        <div class="card-body">
                        <h3><strong>{{ $verifiedReportsCount }}</strong></h3> <!-- Correct Blade syntax -->
                        <p>Laporan Diproses</p>
                        </div>
                        <div class="info-overlay">
                            <a href="{{ url('/laporan-diproses') }}" class="text-white">More Info <i class="bi bi-info-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-green mb-3">
                        <div class="card-body">
                            <h3><strong>{{ $inProgressCount }}</strong></h3> <!-- Display the dynamic count -->
                            <p>Laporan Selesai</p>
                        </div>
                        <div class="info-overlay">
                        <a href="{{ route('admin.laporan-selesai') }}" class="text-white">More Info <i class="bi bi-info-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kalender -->
        <div class="calendar">
        <div class="calendar-header">
            <button id="prev-month">&#8592;</button>
            <div id="month-year"></div>
            <button id="next-month">&#8594;</button>
        </div>
        <div class="calendar-days" id="days-container">
            <!-- Hari akan diisi secara dinamis melalui JavaScript -->
        </div>
    </div>

    <script>
        const calendar = document.querySelector('.calendar');
        const monthYear = document.getElementById('month-year');
        const daysContainer = document.getElementById('days-container');
        const prevMonth = document.getElementById('prev-month');
        const nextMonth = document.getElementById('next-month');

        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        function renderCalendar(month, year) {
            const firstDay = new Date(year, month, 1).getDay(); // Hari pertama dalam seminggu
            const lastDate = new Date(year, month + 1, 0).getDate(); // Total hari dalam bulan
            const monthNames = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            const dayNames = ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"];

            monthYear.textContent = `${monthNames[month]} ${year}`;
            daysContainer.innerHTML = "";

            // Menambahkan nama-nama hari
            for (const dayName of dayNames) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('day', 'day-name');
                dayElement.textContent = dayName;
                daysContainer.appendChild(dayElement);
            }

            // Mengisi dengan hari kosong sebelum tanggal 1
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.classList.add('day');
                daysContainer.appendChild(emptyDay);
            }

            // Menambahkan hari-hari dalam bulan
            for (let day = 1; day <= lastDate; day++) {
                const dayElement = document.createElement('div');
                dayElement.classList.add('day');
                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayElement.classList.add('current-day');
                }
                dayElement.textContent = day;
                daysContainer.appendChild(dayElement);
            }
        }

        prevMonth.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });

        nextMonth.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });

        renderCalendar(currentMonth, currentYear);
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
