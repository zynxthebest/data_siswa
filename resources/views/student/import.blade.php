<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data Mahasiswa</title>
</head>
<body>
    <h1>Import Data Mahasiswa</h1>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Menampilkan pesan error -->
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File Excel:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
