<nav class="navbar">
    <div class="navbar-container">

        <!-- KIRI -->
        <div class="navbar-left">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.edukasi.index') }}"
                        style="display:flex;align-items:center;gap:5px;text-decoration:none;">
                    @else
                        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:5px;text-decoration:none;">
                @endif
            @else
                <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:5px;text-decoration:none;">
                @endauth

                <img src="{{ asset('petresq/images/logopetresq.png') }}" class="logo">
                <span class="brand">PetResQ</span>
            </a>
        </div>

        <!-- KANAN -->
        <div class="navbar-right">

            {{-- BELUM LOGIN --}}
            @guest
                <div class="nav-guest">
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn-daftar">Daftar</a>
                </div>
            @endguest

            {{-- SUDAH LOGIN --}}
            @auth
                <div class="nav-user">

                    {{-- USER --}}
                    @if (auth()->user()->role !== 'admin')
                        <a href="{{ route('home') }}" class="nav-link">Home</a>

                        <a href="{{ route('profile.edit') }}" class="user-info">
                            <img src="{{ asset('petresq/images/user-icon.png') }}" width="42" class="user-icon">
                            <span class="username">{{ auth()->user()->name }}</span>
                        </a>

                        {{-- ADMIN --}}
                    @else
                        <a href="{{ route('admin.edukasi.index') }}" class="nav-link">
                            Admin Panel
                        </a>

                        <span class="username">Admin</span>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </div>
            @endauth

        </div>
    </div>
</nav>
