<!DOCTYPE html>
<html>
<head><title>Daftar Review</title></head>
<body>
    <h1>Daftar Review</h1>
    <table border="1">
        <tr><th>ID</th><th>Submission ID</th><th>Rekomendasi</th></tr>
        @foreach($reviews as $review)
        <tr><td>{{ $review->id }}</td><td>{{ $review->submission_id }}</td><td>{{ $review->rekomendasi_hasil }}</td></tr>
        @endforeach
    </table>
</body>
</html>