@extends('layouts.main')

@section('content')
    <div class="detail-container">
        <!-- BACK -->
        <a href="{{ route('reports.index') }}" class="detail-back">←</a>
        <div class="detail-actions">
            @if (auth()->check() && auth()->id() === $report->user_id)
                <a href="{{ route('reports.edit', $report->id) }}" class="edit-btn">
                    ✏️ Edit Laporan
                </a>

                <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus laporan ini?')" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">
                        🗑️ Hapus
                    </button>
                </form>
            @endif
        </div>
        <!-- IMAGE -->
        <div class="detail-image">
            @if ($report->images->count())
                <img src="{{ asset('storage/' . $report->images->first()->image_path) }}">
            @endif
        </div>

        <!-- INFO -->
        <div class="detail-info">

            <!-- LEFT -->
            <div class="detail-left">
                <h2>{{ $report->animal_type }}</h2>
                <p class="detail-address">{{ $report->location }}</p>

                <div class="detail-desc">
                    {{ $report->description }}
                </div>
            </div>

            <!-- RIGHT -->
            <div class="detail-right">
                <h3>Kontak Pengunggah</h3>
                <p class="detail-contact">{{ $report->phone }}</p>

                <p><strong>Kondisi:</strong></p>
                <p>{{ $report->condition }}</p>
            </div>

        </div>

        <!-- ================= KOMENTAR ================= -->
        <div class="comment-section">

            <h3>Komentar</h3>

            @auth
                <form method="POST" action="{{ route('comments.store', $report->id) }}" class="comment-input">
                    @csrf
                    <input type="text" name="content" placeholder="Tambahkan Komentar" required>
                    <button type="submit">Kirim</button>
                </form>
            @endauth

            @forelse ($report->comments as $comment)
                <div class="comment-item">

                    <div class="comment-user">
                        <img src="{{ asset('petresq/images/user-icon.png') }}">
                        <span class="username">{{ $comment->user->name }}</span>
                        <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="comment-text">
                        {{ $comment->content }}
                    </div>

                </div>
            @empty
                <p>Belum ada komentar.</p>
            @endforelse

        </div>

    </div>
@endsection
