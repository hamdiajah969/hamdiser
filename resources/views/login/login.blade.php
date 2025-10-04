<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin Sekolah</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #0d47a1 0%, #002147 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 40px 30px;
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .login-container img {
            display: block;
            margin: 0 auto 20px auto;
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

        .login-container h2 {
            margin-bottom: 30px;
            font-weight: 700;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 18px;
        }

        .form-control {
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            padding-left: 45px;
            height: 45px;
            color: white;
            box-shadow: none;
            transition: none;
        }

        .form-control::placeholder {
            color: #e0e0e0;
        }

        .form-control:focus,
        .form-control:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            box-shadow: none;
            border: none;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: white;
            border-radius: 30px;
            font-weight: 600;
            padding: 10px 0;
            margin-top: 20px;
            width: 100%;
            border: none;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .forgot-link {
            display: inline-block;
            margin-top: 15px;
            color: white;
            text-decoration: underline;
            font-size: 0.9rem;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .login-container img {
                width: 90px;
                height: 90px;
            }

            .form-control {
                height: 40px;
                padding-left: 40px;
            }

            .input-icon i {
                font-size: 16px;
                left: 12px;
            }

            .btn-login {
                font-size: 0.95rem;
                padding: 8px 0;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('assets/foto/ded.png') }}" alt="Login Image" />
        <h2>Login</h2>
        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="mb-3 input-icon">
                <i class="fa-solid fa-user"></i>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Username"
                    required
                />
            </div>
            <div class="mb-3 input-icon">
                <i class="fa-solid fa-lock"></i>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required
                />
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <a href="/" class="forgot-link">Kembali Ke Beranda</a>
        </form>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
</body>
</html>
