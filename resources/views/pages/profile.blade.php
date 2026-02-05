@extends('layouts.main')

@section('content')
    <div class="profile-page">

        <h1 class="profile-title">User Profile</h1>

        <div class="profile-card">
            <!-- FOTO -->
            <div class="profile-photo">
                <img
                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('petresq/images/user-profile.png') }}">
            </div>

            <!-- MODE VIEW -->
            <div class="profile-view" id="profileView">
                <h2 class="profile-name">{{ $user->name }}</h2>
                <p class="profile-text">{{ $user->email }}</p>
                <p class="profile-text">{{ $user->address ?? 'alamat lengkap' }}</p>
                <button class="profile-edit-btn" id="editBtn">Edit</button>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile-edit"
                id="profileEdit" style="display:none;">
                @csrf
                @method('PATCH')

                <input type="file" name="image">

                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

                <textarea name="address">{{ old('address', $user->address) }}</textarea>

                <button type="submit" class="profile-edit-btn">Simpan</button>
            </form>


        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const editBtn = document.getElementById("editBtn");
            const saveBtn = document.getElementById("saveBtn");

            if (!editBtn || !saveBtn) return;

            editBtn.addEventListener("click", function() {
                document.getElementById("profileView").style.display = "none";
                document.getElementById("profileEdit").style.display = "flex";
            });

        });
    </script>
@endpush
