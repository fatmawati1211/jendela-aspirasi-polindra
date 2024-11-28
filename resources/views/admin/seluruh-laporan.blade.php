@extends('layouts.seluruh')

@section('content')
    <h2>Seluruh Laporan</h2>

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
            @foreach($reports as $report)
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
                        <!-- Lihat laporan -->
                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info btn-sm">Lihat</a>

                        <!-- Ubah status laporan -->
                        <form action="{{ route('reports.updateStatus', ['id' => $report->id, 'newStatus' => 'Dalam Antrian']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH') <!-- Use PATCH for updating -->
                            <button type="submit" class="btn btn-warning btn-sm">Ubah Status</button>
                        </form>

                        <!-- Hapus laporan -->
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
