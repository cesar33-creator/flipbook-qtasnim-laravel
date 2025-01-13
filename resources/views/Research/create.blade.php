<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Upload Buku Research </title>

    <!-- Costume CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/InputFile.css') }}">
</head>
<body>
    <div class="container">
        <h1>Upload Buku Research</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/UploadResearch" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="nama_buku">Judul Buku:</label>
                <input type="text" id="nama_buku" name="nama_buku" value="{{ old('nama_buku') }}" required>
            </div>

            <div>
                <label for="file_buku">Pilih File:</label>
                <input type="file" id="file_buku" name="file_buku" accept=".pdf,.doc,.docx" required>
            </div>

            <div>
                <label for="image_buku">Masukkan Cover File:</label>
                <input type="file" id="image_buku" name="image_buku" accept=".pdf,.doc,.docx,.jpg,.png" required>
            </div>

            <div>
                <label for="deskripsi_buku">Deskripsi Buku:</label>
                <textarea id="deskripsi_buku" name="deskripsi_buku" required>{{ old('deskripsi_buku') }}</textarea>
            </div>

            <button type="submit">Upload</button>
            <a href="/Research">Kembali</a>
        </form>
    </div>
</body>
</html>