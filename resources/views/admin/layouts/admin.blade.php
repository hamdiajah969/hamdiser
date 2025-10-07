<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Jayamahe')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/foto/tel.png') }}">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Style -->
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #f8f9fa;
      margin: 0;
    }

    /* SIDEBAR */
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

    /* RESPONSIVE */
    @media (max-width: 768px) {
      .sidebar {
        left: -260px;
      }

      .sidebar.active {
        left: 0;
      }

      #main-content {
        margin-left: 0 !important;
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
</head>
<body>

  <!-- Toggle Button -->
  <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
  </button>

  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('assets/foto/ded.png') }}" alt="Foto" width="50" height="50" class="rounded-circle">
      <span>AdminPage</span>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column mt-2">
      <li>
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>

      <div class="sidebar-heading">Features</div>
      <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="bi bi-person-circle"></i> User</a></li>
      <li><a class="nav-link" href="{{ route('admin.siswa.index') }}"><i class="bi bi-person"></i> Siswa</a></li>
      <li><a class="nav-link" href="{{ route('admin.guru.index') }}"><i class="bi bi-person-badge"></i> Guru</a></li>
      <li><a class="nav-link" href="{{ route('admin.ekstrakulikuler.index') }}"><i class="bi bi-trophy"></i> Ekstrakulikuler</a></li>
      <li><a class="nav-link" href="{{ route('admin.galeri.index') }}"><i class="bi bi-images"></i> Galeri</a></li>
      <li><a class="nav-link" href="{{ route('admin.berita.index') }}"><i class="bi bi-newspaper"></i> Berita</a></li>
      <li><a class="nav-link" href="{{ route('admin.profile_sekolah.index') }}"><i class="bi bi-building"></i> Profile Sekolah</a></li>
      <li><a class="nav-link" href="{{ route('admin.saran.index') }}"><i class="bi bi-envelope"></i> Kotak Saran</a></li>

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

  <!-- MAIN CONTENT -->
  <main class="flex-grow-1" id="main-content" style="margin-left: 260px; padding: 20px; height: 100vh; overflow-y: auto;">
    @yield('content')
  </main>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar Toggle Script -->
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>

</body>
</html>
