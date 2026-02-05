@extends('layouts.main')

@section('content')
    <div class="edukasi-detail-container">

        <a href="{{ route('edukasi.index') }}" class="edukasi-back">← Kembali</a>

        <div class="edukasi-detail-card">

            @if ($education->image)
                <div class="edukasi-image-wrapper">
                    <img src="{{ asset('storage/' . $education->image) }}" class="edukasi-image {{ $education->image_size }}"
                        alt="{{ $education->title }}">
                </div>
            @endif

            <div class="edukasi-body">
                <h1 class="edukasi-title">{{ $education->title }}</h1>

                <p class="edukasi-date">
                    {{ $education->created_at->format('d M Y') }}
                </p>

                <div class="edukasi-content">
                    {!! nl2br(e($education->content)) !!}
                </div>
            </div>

        </div>

    </div>
@endsection
