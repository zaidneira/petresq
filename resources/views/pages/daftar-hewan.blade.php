@extends('layouts.main')

@section('content')
    <div class="daftar-hewan-page">

        <h1 class="daftar-hewan-title">Daftar Hewan Terlantar</h1>

        <div class="daftar-hewan-list">

            <form action="{{ route('reports.index') }}" method="GET" class="search-wrapper">

                <div class="search-box">
                    <span class="search-icon">🔍</span>

                    <input type="text" name="q" placeholder="Cari Hewan" value="{{ request('q') }}">

                    <button type="submit" class="search-btn">
                        Cari
                    </button>
                </div>

            </form>

            @forelse ($reports as $report)
                <a href="{{ route('reports.show', $report->id) }}" class="hewan-card">
                    <!-- FOTO -->
                    <div class="hewan-image">
                        @if ($report->images->first())
                            <img src="{{ asset('storage/' . $report->images->first()->image_path) }}">
                        @else
                            <img src="{{ asset('petresq/images/default-hewan.png') }}">
                        @endif
                    </div>

                    <!-- INFO -->
                    <div class="hewan-info">
                        <h2>{{ $report->animal_type }}</h2>
                        <p class="hewan-location">{{ $report->location }}</p>
                        <p class="hewan-desc">
                            {{ Str::limit($report->description, 80) }}
                        </p>
                    </div>

                </a>
            @empty
                <p>Belum ada laporan hewan.</p>
            @endforelse

        </div>

    </div>
@endsection
