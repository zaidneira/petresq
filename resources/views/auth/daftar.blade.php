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
        <a href="/" class="back-btn">←</a>

        <!-- FORM OVERLAY -->
        <div class="daftar-form">

            <div class="logo-daftar">
                <img src="{{ asset('petresq/images/logopetresq.png') }}">
                <span>PetResQ</span>
            </div>

            <h2>Bergabung sekarang!</h2>

            <form id="formDaftar">
                <input type="text" placeholder="Nama Pengguna" required>
                <input type="email" placeholder="Email address" required>

                <div class="password-wrapper">
                    <input type="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>

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

document.getElementById("formDaftar").addEventListener("submit", function(e){
    e.preventDefault();
    alert("Pendaftaran berhasil!");
    window.location.href = "/";
});
</script>

</body>
</html>
