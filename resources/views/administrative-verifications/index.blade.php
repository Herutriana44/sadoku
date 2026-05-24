<!DOCTYPE html>
<html>
<head><title>Verifikasi Administrasi</title></head>
<body>
    <h1>Daftar Verifikasi Administrasi</h1>
    <table border="1">
        <tr><th>ID</th><th>Submission ID</th><th>Is Lengkap</th></tr>
        @foreach($verifications as $av)
        <tr><td>{{ $av->id }}</td><td>{{ $av->submission_id }}</td><td>{{ $av->is_lengkap ? 'Ya' : 'Tidak' }}</td></tr>
        @endforeach
    </table>
</body>
</html>