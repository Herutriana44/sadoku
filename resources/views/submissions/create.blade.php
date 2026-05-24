<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengajuan Penelitian</title>
</head>
<body>
    <h1>Tambah Pengajuan</h1>
    <form action="{{ route('submissions.store') }}" method="POST">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="judul_penelitian" required><br>
        <label>Abstrak:</label><br>
        <textarea name="abstrak" required></textarea><br>
        <label>Berkas Path:</label><br>
        <input type="text" name="berkas_path" required><br>
        <input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">
        <input type="hidden" name="status" value="diajukan">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>