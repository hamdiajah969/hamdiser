<style>
    body {
        font-family: "Poppins", sans-serif;
        background: #f8f9fa;
        margin: 0;
    }

    .sidebar {
        width: 260px;
        min-height: 100vh;
        background: #002147;
        border-right: 1px solid #e4e6eb;
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        left: 0;
        overflow-y: auto;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .sidebar-header {
        background: #002147;
        color: #fff;
        padding: 1.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                    0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .sidebar-header img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .sidebar-header span {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .sidebar .nav-link,
    .sidebar .nav-linku {
        color: #5a5c69;
        padding: 0.65rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.2s;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background: #eaecf4;
        color: #002147;
    }

    .sidebar .nav-linku:hover,
    .sidebar .nav-linku.active {
        background: #eaecf4;
        color: #cc0b0b;
    }

    .sidebar-heading {
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #b7b9cc;
        padding: 1rem 1.25rem 0.25rem;
        font-weight: 700;
    }

    .sidebar-footer {
        margin-top: auto;
        padding: 1rem 1.25rem;
        font-size: 0.8rem;
        color: #b7b9cc;
        text-align: center;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 992px) {
        .sidebar {
            width: 220px;
        }

        .sidebar-header span {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            left: -260px;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            background: #002147;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 10px;
            cursor: pointer;
            z-index: 1100;
        }
    }
</style>

<body>
    <!-- Tombol toggle untuk layar kecil -->
    <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <!-- ============ SIDEBAR ============ -->
    <div class="sidebar" id="sidebar">
        <!-- Header -->
        <div class="sidebar-header">
            <img src="{{ asset('assets/foto/ded.png') }}" alt="Foto">
            <span>OperatorPage</span>
        </div>

        <!-- Menu -->
        <ul class="nav flex-column mt-2">
            <li>
                <a class="nav-link" href="{{ route('operator.dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <div class="sidebar-heading">Data</div>
            <li>
                <a class="nav-link" href="{{ route('operator.siswa.index') }}">
                    <i class="bi bi-person"></i> Siswa
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('operator.ekstrakulikuler.index') }}">
                    <i class="bi bi-trophy"></i> Ekstrakulikuler
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('operator.galeri.index') }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('operator.berita.index') }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
            </li>

            <hr class="my-4" style="border-top: 3px solid #e0a000;">

            <li>
                <a class="nav-linku" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

        <div class="sidebar-footer">
            SMA NEGERI 1 YOGYAKARTA © 1996
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>
