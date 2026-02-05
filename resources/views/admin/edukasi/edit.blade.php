@extends('layouts.main')

@section('content')
    <div class="admin-container">

        <div class="admin-form-card">

            <h1 class="admin-form-title">Edit Edukasi</h1>

            <form action="{{ route('admin.edukasi.update', $education->id) }}" method="POST" enctype="multipart/form-data"
                class="admin-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Judul Edukasi</label>
                    <input type="text" name="title" value="{{ $education->title }}" required>
                </div>

                <div class="form-group">
                    <label>Isi Edukasi</label>
                    <textarea name="content" rows="6" required>{{ $education->content }}</textarea>
                </div>

                @if ($education->image)
                    <div class="form-group">
                        <label>Gambar Saat Ini</label>
                        <img src="{{ asset('storage/' . $education->image) }}" class="preview-image">
                    </div>
                @endif

                <div class="form-group">
                    <label>Ukuran Gambar</label>
                    <select name="image_size">
                        <option value="small" {{ $education->image_size == 'small' ? 'selected' : '' }}>Kecil</option>
                        <option value="medium" {{ $education->image_size == 'medium' ? 'selected' : '' }}>Sedang</option>
                        <option value="large" {{ $education->image_size == 'large' ? 'selected' : '' }}>Besar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ganti Gambar</label>
                    <input type="file" name="image">
                </div>

                <div class="form-action">
                    <button type="submit" class="btn-save">Update</button>
                    <a href="{{ route('admin.edukasi.index') }}" class="btn-cancel">Batal</a>
                </div>

            </form>

        </div>

    </div>
@endsection
