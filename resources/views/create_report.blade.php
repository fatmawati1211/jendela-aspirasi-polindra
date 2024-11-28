<!-- resources/views/create_report.blade.php -->
@extends('layouts.seluruh')

@section('content')
    <div class="container">
        <h2>Tambah Laporan</h2>
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal_laporan">Tanggal Laporan:</label>
                <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" required>
            </div>
            <div class="form-group">
                <label for="kategori_laporan">Kategori Laporan:</label>
                <input type="text" class="form-control" id="kategori_laporan" name="kategori_laporan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="file_terlampir">File Terlampir (Foto/Video):</label>
                <input type="file" class="form-control" id="file_terlampir" name="file_terlampir">
            </div>
            <div class="form-group">
                <label for="kategori_privasi">Kategori Privasi:</label>
                <select class="form-control" id="kategori_privasi" name="kategori_privasi" required>
                    <option value="Publik">Publik</option>
                    <option value="Privat">Privat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
