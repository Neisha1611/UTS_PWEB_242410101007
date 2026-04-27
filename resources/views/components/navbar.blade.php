<header class="navbar-wrap">
    <nav class="navbar-inner">

        <div style="display:flex;align-items:center;gap:2.5rem;">
            <a href="/dashboard" class="nav-brand">
                <span class="nav-brand-dot"></span>
                <span class="nav-brand-text">Velora</span>
            </a>

            <div class="nav-links">
                <a href="/dashboard"   class="nav-link {{ request()->is('dashboard')   ? 'aktif' : '' }}">Dashboard</a>
                <a href="/pengelolaan" class="nav-link {{ request()->is('pengelolaan') ? 'aktif' : '' }}">Pengelolaan</a>
                <a href="/profil"      class="nav-link {{ request()->is('profil')      ? 'aktif' : '' }}">Profil</a>
            </div>
        </div>

        <div class="nav-right">
            <div style="display:flex;align-items:center;gap:0.6rem;">
                <div class="avatar-circle">
                    {{ strtoupper(substr(session('nama', 'U'), 0, 1)) }}
                </div>
                <div>
                    <p style="font-size:0.8rem;font-weight:500;color:#1a1a1a;line-height:1.2;">
                        {{ session('nama', 'Pengguna') }}
                    </p>
                    <p style="font-size:0.67rem;color:var(--mink);">
                        {{ session('role', 'Staf') }}
                    </p>
                </div>
            </div>

            <form action="/logout" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </nav>
</header>
