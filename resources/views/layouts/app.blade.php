<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Dark mode general */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        /* Navbar */
        .navbar-dark-mode {
            background-color: #1f1f1f !important;
        }
        /* Table (apply to all tables) */
        body.dark-mode table {
            background-color: #1e1e1e;
            color: #fff;
        }
        body.dark-mode table th,
        body.dark-mode table td {
            background-color: #2c2c2c !important;
            color: #fff !important;
            border-color: #444 !important;
        }
        /* Card */
        body.dark-mode .card {
            background-color: #1f1f1f;
            color: #f1f1f1;
            border: 1px solid #444;
        }
        body.dark-mode .card-body p {
            color: #ddd;
        }
        /* Form */
        body.dark-mode input,
        body.dark-mode select,
        body.dark-mode textarea,
        body.dark-mode .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
        }
        body.dark-mode .form-control:focus {
            background-color: #444;
            color: #fff;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        /* Buttons */
        body.dark-mode .btn-secondary {
            background-color: #444;
            border-color: #666;
            color: #eee;
        }
        body.dark-mode .btn-secondary:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" id="navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('jadwal_kuliah.index') }}">
            <i class="bi bi-calendar-check-fill me-2"></i> Jadwal Kuliah
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jadwal_kuliah.index') }}"><i class="bi bi-house-door me-1"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-file-earmark-text me-1"></i> Jadwal Ujian</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i> Lainnya
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-1"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-1"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-1"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-3">
                    <button class="btn btn-sm btn-outline-light" onclick="toggleDarkMode()">
                        🌓 Dark Mode
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4 container" id="main-content">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        document.querySelector('.navbar').classList.toggle('navbar-dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // Load saved theme on page load
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('.navbar').classList.add('navbar-dark-mode');
    }
</script>
</body>
</html>
