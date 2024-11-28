@extends('layouts.verifikasi')

@section('content')
    <h2>Halaman Laporan Terverifikasi</h2>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th> <!-- Added numbering column -->
                <th>Tanggal Laporan</th>
                <th>Kategori Laporan</th>
                <th>Deskripsi</th>
                <th>File Terlampir</th>
                <th>Kategori Privasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
        @forelse($reports as $report)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $report->created_at->format('d-m-Y') }}</td>
        <td>{{ $report->kategori_laporan }}</td>
        <td>{{ Str::limit($report->deskripsi, 50) }}</td>
        <td>
            @if($report->file_terlampir)
                <a href="{{ asset('storage/' . $report->file_terlampir) }}" target="_blank">Lihat File</a>
            @else
                Tidak Ada File
            @endif
        </td>
        <td>{{ $report->kategori_privasi }}</td>
        <td>{{ $report->status }}</td>
        <td>
            <form action="{{ route('reports.updateStatus', ['id' => $report->id, 'newStatus' => 'Terverifikasi']) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-warning btn-sm">Verifikasi</button>
            </form>
            <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8">Tidak ada laporan menunggu verifikasi.</td>
    </tr>
@endforelse

        </tbody>
    </table>
@endsection
