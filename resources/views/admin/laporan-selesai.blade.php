@extends('layouts.selesai')

@section('content')
    <h2>Halaman Laporan Selesai</h2>
    
    <!-- Show success message if there is any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="text-center">
            <tr><th>No</th> <!-- Added numbering column -->
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
                    <td>{{ $loop->iteration }}</td> <!-- Displays the row number -->
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
                        <!-- Ubah status laporan -->
                        <!-- Ubah status laporan -->
                        <form action="{{ route('reports.updateStatus', ['id' => $report->id, 'newStatus' => 'Selesai']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Selesai</button>
                        </form>

                        <!-- Hapus laporan -->
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
