<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Operator Jayamahe')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/foto/tel.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
        font-family: "Poppins", sans-serif;
        background: #f8f9fa;
        margin: 0;
    }

    /* --- SIDEBAR --- */
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

    /* Header */
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

    /* Nav menu */
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

    /* Responsif */
    @media (max-width: 992px) {
        .sidebar {
            width: 220px;
        }

        .sidebar-header span {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        /* Sidebar collapse */
        .sidebar {
            position: fixed;
            left: -260px;
        }

        .sidebar.active {
            left: 0;
        }

        /* Konten utama */
        main {
            margin-left: 0;
            padding: 1rem;
        }

        /* Tombol toggle */
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
</head>
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
            SMA CILAMPUNGHILIR © 1996
        </div>
    </div>

    <!-- Konten Utama -->
    <main class="flex-grow-1" id="main-content" style="margin-left: 260px; padding: 20px;">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
