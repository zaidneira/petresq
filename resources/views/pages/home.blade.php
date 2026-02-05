@extends('layouts.main')

@section('content')
    <section class="hero">
        <div class="hero-text">
            <h1>Setiap Nyawa Layak<br>Mendapat Tempat</h1>
            <p>
                Temukan, laporkan, dan bantu hewan yang<br>
                membutuhkan kasih melalui PetResQ.
            </p>
        </div>

        <div class="hero-image">
            <img src="{{ asset('petresq/images/menuutama.png') }}">
        </div>
    </section>

    <section class="menu-section">
        <a href="{{ route('reports.create') }}" class="menu-card">
            <img src="{{ asset('petresq/images/form.png') }}">
            <span>FORM</span>
        </a>

        <a href="{{ url('/daftar-hewan') }}" class="menu-card">
            <img src="{{ asset('petresq/images/daftarhewan.png') }}">
            <span>DAFTAR HEWAN</span>
        </a>

        <a href="{{ url('/maps') }}" class="menu-card">
            <img src="{{ asset('petresq/images/maps.png') }}">
            <span>MAPS</span>
        </a>

        <a href="{{ url('/edukasi') }}" class="menu-card">
            <img src="{{ asset('petresq/images/edukasi.png') }}">
            <span>EDUKASI</span>
        </a>
    </section>
@endsection
