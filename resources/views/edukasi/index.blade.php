@extends('layouts.main')

@section('content')
<div class="edukasi-page">

    <div class="edukasi-grid">

        <!-- ITEM 1 (BESAR) -->
        <a href="/edukasi/1" class="edukasi-item big">
            <img src="{{ asset('petresq/images/edu-1.jpg') }}">
            <div class="edukasi-text">
                <h2>“Apa yang Harus Dilakukan Saat Menemukan Hewan Terluka?”</h2>
                <p>
                    Konten ini mengulas langkah-langkah dasar pertolongan pertama,
                    mulai dari menjaga jarak aman hingga kapan harus memanggil relawan rescue.
                </p>
            </div>
        </a>

        <!-- ITEM 2 -->
        <a href="/edukasi/2" class="edukasi-item">
            <img src="{{ asset('petresq/images/edu-2.jpg') }}">
            <div class="edukasi-text">
                <h3>“Mengapa Sterilisasi Penting dalam Penyelamatan Hewan Jalanan?”</h3>
                <p>
                    Video ini menjelaskan hubungan antara steril, populasi stray animal,
                    dan pencegahan kelahiran tidak terkontrol.
                </p>
            </div>
        </a>

        <!-- ITEM 3 -->
        <a href="/edukasi/3" class="edukasi-item">
            <img src="{{ asset('petresq/images/edu-3.jpg') }}">
            <div class="edukasi-text">
                <h3>“Cara Membedakan Hewan yang Butuh Rescue vs Masih Bisa Bertahan”</h3>
                <p>
                    Membahas ciri hewan yang benar-benar membutuhkan bantuan darurat.
                </p>
            </div>
        </a>

    </div>

    <!-- PAGINATION DUMMY -->
    <div class="edukasi-pagination">
        <span>&lt;</span>
        <span class="active">1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&gt;</span>
    </div>

</div>
@endsection
