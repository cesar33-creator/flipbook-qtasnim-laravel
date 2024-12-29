<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rak Buku</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    @include('Navbar._parts._nav_search')

    <button class="btn btn-outline-danger back-btn position-absolute" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <h2 class="bookshelf-title">Daftar Buku General</h2>
    <div class="bookshelf">
        <div class="shelves">
            <div class="shelf has-books">
                <img src="{{ asset('assets/Rak buku.png') }}" alt="Rak Buku">
                <div class="covers">
                    @foreach ($data as $item)
                    <div class="thumb book-3" data-name="{{ $item->nama_buku }}">
                        <a href="/BukuKaryawan/{{ $item->id }}">
                            <img src="{{ asset('storage/' . $item->image_buku) }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="UploadGeneral/create" class="btn-upload" id="uploadBtn">
        <button class="upload-btn">+ Upload File</button>
        </a>
    </div>
</body>
</html>
