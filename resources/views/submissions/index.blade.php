<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengajuan Penelitian</title>
</head>
<body>
    <h1>Daftar Pengajuan Penelitian</h1>
    <a href="{{ route('submissions.create') }}">Tambah Pengajuan</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($submissions as $submission)
        <tr>
            <td>{{ $submission->id }}</td>
            <td>{{ $submission->judul_penelitian }}</td>
            <td>{{ $submission->status }}</td>
            <td>
                <a href="{{ route('submissions.show', $submission->id) }}">Lihat</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>