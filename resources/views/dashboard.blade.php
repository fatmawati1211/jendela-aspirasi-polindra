
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
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
        .profile-icon {
            font-size: 24px;
            margin-right: 8px;
        }
        .dropdown-menu {
            min-width: 200px;
        }
        .form-container {
            max-width: 3000px;
            margin: auto;
            background-color: rgba(211, 211, 211, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-container .row > .col {
            margin-bottom: 20px;
        }
        .form-container textarea {
            margin-bottom: 20px;
        }
        .btn-custom {
            width: 100%;
        }
        .modal-body {
            text-align: justify;
            padding: 20px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 150px;">
        </a>
        <div class="ms-auto d-flex align-items-center" style="margin-right: 20px;">
            <div class="btn-group">
                <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle profile-icon"></i>
                    <span class="username">User</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><div class="dropdown-item">user@gmail.com</div></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Laporan -->
    <div class="container mt-4">
        <div class="form-container p-4" style="background-color: rgba(217, 217, 217, 0.3); border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
            <h2 class="text-center mb-4">Form Laporan</h2>
            <form id="reportForm" action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="category" class="form-label">Kategori Laporan</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="bullying">Bullying</option>
                            <option value="pelecehan_seksual">Pelecehan Seksual</option>
                            <option value="kekerasan">Kekerasan</option>
                            <option value="pencemaran_nama_baik">Pencemaran Nama Baik</option>
                            <option value="fasilitas_kampus">Fasilitas Kampus</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="file" class="form-label">Lampirkan File</label>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="public" name="privacy" value="public" required>
                        <label class="form-check-label" for="public">Publik</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="private" name="privacy" value="private">
                        <label class="form-check-label" for="private">Private</label>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-danger btn-custom" id="submitButton" style="flex-grow: 1; text-align: center;">Laporkan</button>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-custom" style="flex-grow: 1; text-align: center;">Kembali ke Halaman Utama</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Pastikan laporan Anda ditulis dengan jelas dan lengkap</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/') }}" class="btn btn-primary me-2">Edit Laporan</a>
                        <button id="submitReport" class="btn btn-danger">Siap Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                </div>
                <div class="modal-body text-center">
                    <i class="bi bi-check-circle" style="font-size: 50px; color: green;"></i>
                    <p>Laporan terkirim</p>
                    <button id="homeButton" class="btn btn-primary">OKE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
    document.getElementById('submitButton').addEventListener('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        modal.show();
    });

    document.getElementById('submitReport').addEventListener('click', function () {
        // Menyembunyikan modal konfirmasi
        var modalConfirmation = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
        modalConfirmation.hide();

        // Menampilkan modal sukses
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });

    document.getElementById('homeButton').addEventListener('click', function () {
        // Menyimpan form
        var form = document.getElementById('reportForm');
        form.submit(); // Mengirim form

        // Arahkan ke halaman dashboard setelah sedikit delay untuk memastikan form terkirim
        setTimeout(function() {
            window.location.href = '{{ url("/dashboard") }}'; // Ganti URL ini jika berbeda
        }, 100); // Delay 100 ms
    });
</script>

</body>
</html>