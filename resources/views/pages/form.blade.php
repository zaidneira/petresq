@extends('layouts.main')

@section('content')
    <div class="form-container">

        <h1 class="form-title">Form Pelaporan Hewan</h1>

        <div class="form-content">

            <!-- KIRI : UPLOAD GAMBAR -->


            @if ($errors->any())
                <div style="color:red; margin-bottom:15px;">
                    {{ $errors->first() }}
                </div>
            @endif
            <!-- KANAN : FORM INPUT -->
            <form class="report-form" method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="upload-box">
                    <label for="imageUpload" class="upload-area">
                        <div class="upload-icon">⬆️</div>
                        <p>Unggah gambar disini</p>
                        <span>Hanya format PNG dan JPG</span>
                    </label>
                    <input type="file" id="imageUpload" name="image" accept="image/png, image/jpeg" hidden required>
                </div>

                <label>Jenis Hewan</label>
                <input type="text" name="animal_type" required>

                <label>Alamat Ditemukan</label>
                <input type="text" name="location" required>

                <label>Nomor yang dapat dihubungi</label>
                <input type="text" name="phone" required>

                <label>Deskripsikan Kondisi Hewan</label>
                <textarea name="description" required></textarea>

                <label>Perlu Penanganan Medis?</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="condition" value="Perlu Penanganan" required>
                        Ya
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Tidak Perlu">
                        Tidak
                    </label>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const imageInput = document.getElementById("imageUpload");
            const uploadArea = document.querySelector(".upload-area");

            if (!imageInput || !uploadArea) return;

            imageInput.addEventListener("change", function() {
                const file = imageInput.files[0];
                if (!file) return;

                if (!file.type.startsWith("image/")) {
                    alert("Hanya file gambar yang diperbolehkan");
                    imageInput.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function() {
                    uploadArea.style.backgroundImage = `url(${reader.result})`;
                    uploadArea.style.backgroundSize = "cover";
                    uploadArea.style.backgroundPosition = "center";
                    uploadArea.innerHTML = "";
                };
                reader.readAsDataURL(file);
            });

        });
    </script>
@endpush
