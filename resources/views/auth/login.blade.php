<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | PetResQ</title>

    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('petresq/css/style.css') }}">
</head>

<body class="daftar-page">

    <div class="daftar-wrapper">

        <div class="daftar-image">
            <!-- BACKGROUND LOGIN -->
            <img src="{{ asset('petresq/images/latarlogin.png') }}">

            <!-- TOMBOL KEMBALI -->
            <a href="{{ route('home') }}" class="back-btn">←</a>

            <!-- FORM OVERLAY -->
            <div class="daftar-form">

                <div class="logo-daftar">
                    <img src="{{ asset('petresq/images/logopetresq.png') }}">
                    <span>PetResQ</span>
                </div>

                <h2>Masuk ke Akun</h2>

                <!-- FORM LOGIN -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}"
                        required>

                    <div class="password-wrapper">
                        <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                        <span class="toggle-password" onclick="toggleLoginPassword()">👁️</span>
                    </div>

                    @if ($errors->any())
                        <p style="color:red; margin-top:10px;">
                            {{ $errors->first() }}
                        </p>
                    @endif

                    <button type="submit">Login</button>
                </form>

            </div>
        </div>

    </div>

    <script>
        function toggleLoginPassword() {
            const pass = document.getElementById("loginPassword");
            pass.type = pass.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>
