@extends('layouts.main')

@section('content')
<div class="edukasi-detail">

    <a href="/edukasi" class="back-btn">←</a>

    <h1>Judul Edukasi</h1>

    <img src="{{ asset('petresq/images/edu-1.jpg') }}" class="detail-image">

    <p>
        Ini adalah konten detail edukasi.  
        Nantinya diambil dari database, sekarang dummy dulu.
    </p>

</div>
@endsection
