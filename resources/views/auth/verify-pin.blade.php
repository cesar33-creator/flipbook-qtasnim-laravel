<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi PIN</title>
</head>
<body>
    <h1>Masukkan PIN Anda</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('verify.pin.submit') }}" method="POST">
        @csrf
        <input type="password" name="pin" placeholder="Masukkan PIN" required>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>
