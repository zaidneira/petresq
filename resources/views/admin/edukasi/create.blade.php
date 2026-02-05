@extends('layouts.main')

@section('content')
    <div class="admin-container">

        <div class="admin-form-card">

            <h1 class="admin-form-title">Tambah Edukasi</h1>

            @if ($errors->any())
                <div class="admin-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.edukasi.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf

                <div class="form-group">
                    <label>Judul Edukasi</label>
                    <input type="text" name="title" required>
                </div>

                <div class="form-group">
                    <label>Isi Edukasi</label>
                    <textarea name="content" rows="6" required></textarea>
                </div>

                <div class="form-group">
                    <label>Gambar Edukasi</label>
                    <input type="file" name="image" accept="image/png, image/jpeg">
                </div>

                <div class="form-group">
                    <label>Ukuran Gambar</label>
                    <select name="image_size">
                        <option value="small">Kecil</option>
                        <option value="medium" selected>Sedang</option>
                        <option value="large">Besar</option>
                    </select>
                </div>

                <div class="form-action">
                    <button type="submit" class="btn-save">Simpan Edukasi</button>
                    <a href="{{ route('admin.edukasi.index') }}" class="btn-cancel">Batal</a>
                </div>

            </form>

        </div>

    </div>
@endsection
