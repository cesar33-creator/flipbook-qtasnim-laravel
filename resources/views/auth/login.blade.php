<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Login Qtasnim</title>

    <!-- Costume CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/Login.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            border: 1px solid #c0392b;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #c0392b;
            font-size: 2em;
            text-align: center;
        }

        label {
            color: #c0392b;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        .btn-login {
            margin-top: 10px;
            width: 100%;
            padding: 5px;
            border: 2px solid #e74c3c;
            background-color: transparent;
            color: #e74c3c;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-back {
            margin-top: 10px;
            width: 50%;
            padding: 5px;
            border: 2px solid #e74c3c;
            background-color: transparent;
            color: #e74c3c;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            /* Jarak antara ikon dan teks */
        }

        .button-wrapper {
            display: flex;
            justify-content: center;
            /* Pusatkan secara horizontal */
        }

        .btn-back:hover,
        .btn-login:hover {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center">Login Qtasnim</h2>

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login btn-block">Login</button>
            </form>

            <!-- Wrapper untuk pusatkan tombol Back -->
            <div class="button-wrapper">
                <button id="backButton" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Tunggu hingga seluruh elemen halaman siap
        document.addEventListener('DOMContentLoaded', function() {
            const backButton = document.getElementById('backButton');

            // Event listener untuk tombol Back
            backButton.addEventListener('click', function() {
                if (history.length > 1) {
                    history.back(); // Kembali ke halaman sebelumnya
                } else {
                    alert('Tidak ada halaman sebelumnya.');
                }
            });
        });
    </script>
</body>

</html>