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
        body {
            background: linear-gradient(to bottom, #ff7f50, #ffa07a);
            height: 100vh;
            display: flex;
        }
        .login-container {
            display: flex;
            width: 100%;
            height: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-left {
            flex: 1;
            background: #ffa990 #ff9d3d #ffa07a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .login-left p {
            font-size: 20px;
            text-align: center;
        }
        .login-right {
            flex: 1;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .login-control {
            width: 100%;
            max-width: 400px;
            align-content: start;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
        <img src="{{URL::to('/assets/logo-qtasnim-kecil-tp.png')}}" alt="Logo Qtasnim" style="width: 220px;">
            <h1>Hey There!</h1>
            <p>Welcome back. <br> You are just one step away to your feed.</p>
            <p></p>
        </div>
        <div class="login-right">
            <div class="login-control">
            @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <h2 class="text-center mb-4">User Login</h2>
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Login</button>
                    <button type="button" class="btn btn-outline-warning w-100 mt-2">← Back</button>
                    <p class="text-center mt-3">Don't have an account? <a href="/register" class="text-warning">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>