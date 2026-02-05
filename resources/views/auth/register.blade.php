<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar | PetResQ</title>

    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('petresq/css/style.css') }}">
</head>

<body class="daftar-page">

    <div class="daftar-wrapper">

        <div class="daftar-image">
            <img src="{{ asset('petresq/images/latardaftar.png') }}">

            <!-- TOMBOL KEMBALI -->
            <a href="{{ route('home') }}" class="back-btn">←</a>

            <!-- FORM OVERLAY -->
            <div class="daftar-form">

                <div class="logo-daftar">
                    <img src="{{ asset('petresq/images/logopetresq.png') }}">
                    <span>PetResQ</span>
                </div>

                <h2>Bergabung sekarang!</h2>

                <!-- ⬇️ PENTING: HUBUNGKAN KE LARAVEL -->
                <form id="formDaftar" method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="text" name="name" placeholder="Nama Pengguna" value="{{ old('name') }}"
                        required>

                    <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}"
                        required>

                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    </div>

                    <!-- password confirmation WAJIB -->
                    <div class="password-wrapper">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>

                    @if ($errors->any())
                        <p style="color:red; margin-top:10px;">
                            {{ $errors->first() }}
                        </p>
                    @endif

                    <button type="submit">Daftar akun baru</button>
                </form>

            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>
