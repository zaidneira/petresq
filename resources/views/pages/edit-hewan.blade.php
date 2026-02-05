@extends('layouts.main')

@section('content')
    <div class="form-container">

        <h1>Edit Laporan Hewan</h1>

        <form method="POST" action="{{ route('reports.update', $report->id) }}">
            @csrf
            @method('PUT')

            <label>Jenis Hewan</label>
            <input type="text" name="animal_type" value="{{ old('animal_type', $report->animal_type) }}" required>

            <label>Alamat Ditemukan</label>
            <input type="text" name="location" value="{{ old('location', $report->location) }}" required>

            <label>Nomor yang dapat dihubungi</label>
            <input type="text" name="phone" value="{{ old('phone', $report->phone) }}" required>

            <label>Deskripsi Kondisi Hewan</label>
            <textarea name="description" required>{{ old('description', $report->description) }}</textarea>

            <label>Perlu Penanganan Medis?</label>
            <select name="condition">
                <option value="Perlu Penanganan" {{ $report->condition == 'Perlu Penanganan' ? 'selected' : '' }}>
                    Ya
                </option>
                <option value="Tidak Perlu" {{ $report->condition == 'Tidak Perlu' ? 'selected' : '' }}>
                    Tidak
                </option>
            </select>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('reports.show', $report->id) }}">Batal</a>
        </form>

    </div>
@endsection
