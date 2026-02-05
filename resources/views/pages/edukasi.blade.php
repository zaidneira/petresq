@extends('layouts.main')

@section('content')
    <div class="edukasi-page">
        <a href="{{ route('home') }}" class="back-home">
            ← Kembali ke Beranda
        </a>
        <h1 class="edukasi-title">Edukasi Hewan</h1>

        <div class="edukasi-list">
            @forelse ($educations as $edu)
                <div class="edukasi-card">

                    @if ($edu->image)
                        <img src="{{ asset('storage/' . $edu->image) }}" alt="{{ $edu->title }}">
                    @endif

                    <h3>{{ $edu->title }}</h3>
                    <p>{{ $edu->excerpt }}</p>

                    <a href="{{ route('edukasi.detail', $edu->slug) }}">
                        Baca Selengkapnya →
                    </a>

                </div>
            @empty
                <p>Belum ada edukasi.</p>
            @endforelse
        </div>

    </div>
@endsection
