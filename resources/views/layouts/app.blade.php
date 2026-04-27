<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bolsa de Empleo') — UNIPAZ</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts: Prompt (tipografía corporativa UNIPAZ para web) -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* =============================================
           SISTEMA DE DISEÑO UNIPAZ
           Manual de Identidad Institucional
        ============================================= */
        :root {
            --unipaz-blue: #273475;
            /* Azul corporativo UNIPAZ */
            --unipaz-blue-dark: #1d2659;
            --unipaz-blue-light: #3a4a9e;
            --unipaz-green: #00963F;
            /* Verde corporativo UNIPAZ */
            --unipaz-green-dark: #007832;
            --unipaz-green-light: #e6f7ed;
            --unipaz-blue-tint: #eef0f9;
            --unipaz-gray: #f4f5f7;
            --unipaz-text: #1a1f36;
            --unipaz-muted: #6b7280;
        }

        /* Base */
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--unipaz-gray);
            font-family: 'Prompt', sans-serif;
            color: var(--unipaz-text);
            font-size: 0.925rem;
        }

        /* ── Barra superior institucional ── */
        .topbar-institucional {
            background: var(--unipaz-blue-dark);
            font-size: 0.75rem;
            color: rgba(255, 255, 255, .65);
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .topbar-institucional a {
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
        }

        .topbar-institucional a:hover {
            color: var(--unipaz-green);
        }

        /* ── Navbar principal ── */
        .navbar-unipaz {
            background: var(--unipaz-blue);
            box-shadow: 0 2px 16px rgba(39, 52, 117, .25);
            padding-top: .55rem;
            padding-bottom: .55rem;
        }

        .navbar-unipaz .navbar-brand {
            color: #fff !important;
            letter-spacing: -.3px;
        }

        .navbar-unipaz .brand-logo-mark {
            width: 36px;
            height: 36px;
            background: var(--unipaz-green);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
            font-weight: 800;
            color: #fff;
            flex-shrink: 0;
        }

        .navbar-unipaz .brand-name {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.1;
        }

        .navbar-unipaz .brand-sub {
            font-size: 1.5rem;
            font-weight: 400;
            opacity: .7;
            letter-spacing: .4px;
            text-transform: uppercase;
        }

        .navbar-unipaz .nav-link {
            color: rgba(255, 255, 255, .85) !important;
            font-weight: 500;
            font-size: .875rem;
            padding: .4rem .7rem !important;
            border-radius: 6px;
            transition: all .18s ease;
        }

        .navbar-unipaz .nav-link:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, .12);
        }

        .navbar-unipaz .nav-link.active {
            color: #fff !important;
            background: rgba(255, 255, 255, .15);
        }

        .btn-nav-student {
            background: var(--unipaz-green);
            color: #fff !important;
            border: none;
            border-radius: 20px;
            padding: .35rem 1rem !important;
            font-weight: 600;
            font-size: .82rem;
            transition: background .18s;
        }

        .btn-nav-student:hover {
            background: var(--unipaz-green-dark) !important;
            color: #fff !important;
        }

        .btn-nav-company {
            background: transparent;
            color: rgba(255, 255, 255, .9) !important;
            border: 1.5px solid rgba(255, 255, 255, .35) !important;
            border-radius: 20px;
            padding: .35rem 1rem !important;
            font-weight: 500;
            font-size: .82rem;
            transition: all .18s;
        }

        .btn-nav-company:hover {
            background: rgba(255, 255, 255, .1) !important;
            border-color: rgba(255, 255, 255, .6) !important;
            color: #fff !important;
        }

        .navbar-toggler {
            border: 1.5px solid rgba(255, 255, 255, .35);
            border-radius: 6px;
            padding: .3rem .5rem;
        }

        /* ── Sidebar ── */
        .sidebar {
            min-height: calc(100vh - 92px);
            background: var(--unipaz-blue);
            padding: 1rem .5rem;
        }

        .sidebar .sidebar-section-label {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .35);
            padding: .6rem .75rem .3rem;
            margin-top: .5rem;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .78);
            border-radius: 8px;
            margin: 1px 0;
            padding: .55rem .75rem;
            font-size: .875rem;
            font-weight: 400;
            transition: all .15s ease;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            width: 20px;
            font-size: 1rem;
            opacity: .8;
            margin-right: .5rem;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }

        .sidebar .nav-link:hover i {
            opacity: 1;
        }

        .sidebar .nav-link.active {
            background: var(--unipaz-green);
            color: #fff;
            font-weight: 600;
        }

        .sidebar .nav-link.active i {
            opacity: 1;
        }

        /* ── Cards ── */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 8px rgba(0, 0, 0, .06);
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 18px rgba(0, 0, 0, .1);
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            font-weight: 600;
            padding: .85rem 1.25rem;
        }

        .card-stat {
            border-left: 4px solid var(--unipaz-blue);
            border-radius: 12px;
        }

        .card-stat-green {
            border-left-color: var(--unipaz-green) !important;
        }

        .card-stat-orange {
            border-left-color: #f59e0b !important;
        }

        /* ── Badges ── */
        .badge-area {
            background: var(--unipaz-blue-tint);
            color: var(--unipaz-blue);
            font-weight: 600;
        }

        .badge-unipaz-blue {
            background: var(--unipaz-blue-tint);
            color: var(--unipaz-blue);
            font-weight: 600;
        }

        .badge-unipaz-green {
            background: var(--unipaz-green-light);
            color: var(--unipaz-green-dark);
            font-weight: 600;
        }

        /* ── Botones con identidad UNIPAZ ── */
        .btn-unipaz {
            background: var(--unipaz-blue);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: .5rem 1.2rem;
            transition: background .18s, transform .12s;
        }

        .btn-unipaz:hover {
            background: var(--unipaz-blue-dark);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-unipaz-green {
            background: var(--unipaz-green);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: .5rem 1.2rem;
            transition: background .18s, transform .12s;
        }

        .btn-unipaz-green:hover {
            background: var(--unipaz-green-dark);
            color: #fff;
            transform: translateY(-1px);
        }

        /* ── Alerts ── */
        .alert {
            border: none;
            border-radius: 10px;
            font-size: .875rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .alert-info {
            background: var(--unipaz-blue-tint);
            color: var(--unipaz-blue);
        }

        /* ── Tables ── */
        .table th {
            font-size: .78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--unipaz-muted);
        }

        .table td {
            vertical-align: middle;
        }

        /* ── Forms ── */
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1.5px solid #e5e7eb;
            font-size: .9rem;
            padding: .5rem .85rem;
            transition: border .15s, box-shadow .15s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--unipaz-blue);
            box-shadow: 0 0 0 3px rgba(39, 52, 117, .12);
        }

        .form-label {
            font-weight: 600;
            font-size: .83rem;
            color: var(--unipaz-text);
            margin-bottom: .35rem;
        }

        /* ── Avatar dropdown ── */
        .avatar-nav {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, .4);
        }

        /* ── Notification badge ── */
        .notif-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid var(--unipaz-blue);
        }

        /* ── Dropdown ── */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .12);
            padding: .4rem;
        }

        .dropdown-item {
            border-radius: 8px;
            font-size: .875rem;
            padding: .5rem .85rem;
            transition: background .12s;
        }

        .dropdown-item:hover {
            background: var(--unipaz-blue-tint);
            color: var(--unipaz-blue);
        }

        .dropdown-item.text-danger:hover {
            background: #fee2e2;
        }

        .dropdown-divider {
            margin: .3rem 0;
            border-color: #f0f0f0;
        }

        /* ── Footer ── */
        .footer-unipaz {
            background: var(--unipaz-blue-dark);
            color: rgba(255, 255, 255, .6);
            padding: 2rem 0 1.5rem;
            margin-top: 3rem;
        }

        .footer-unipaz .footer-brand {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
        }

        .footer-unipaz .footer-green-bar {
            width: 36px;
            height: 3px;
            background: var(--unipaz-green);
            border-radius: 2px;
            margin: .5rem 0 .75rem;
        }

        .footer-unipaz a {
            color: rgba(255, 255, 255, .5);
            text-decoration: none;
            font-size: .82rem;
        }

        .footer-unipaz a:hover {
            color: var(--unipaz-green);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .08);
            padding-top: 1rem;
            margin-top: 1.5rem;
            font-size: .78rem;
        }

        /* ── Página con sidebar layout ── */
        .sidebar-layout {
            display: flex;
            min-height: calc(100vh - 92px);
        }

        .sidebar-layout .sidebar {
            width: 230px;
            flex-shrink: 0;
        }

        .sidebar-layout .main-content {
            flex: 1;
            min-width: 0;
            padding: 1.5rem;
        }

        @media (max-width: 767px) {
            .sidebar-layout {
                flex-direction: column;
            }

            .sidebar-layout .sidebar {
                width: 100%;
                min-height: auto;
            }
        }

        /* ── Utilidades ── */
        .text-unipaz {
            color: var(--unipaz-blue) !important;
        }

        .text-unigreen {
            color: var(--unipaz-green) !important;
        }

        .bg-unipaz {
            background: var(--unipaz-blue) !important;
        }

        .bg-unigreen {
            background: var(--unipaz-green) !important;
        }

        .section-title {
            font-weight: 700;
            color: var(--unipaz-text);
        }

        .section-title .accent {
            color: var(--unipaz-blue);
        }

        .divider-green {
            width: 40px;
            height: 3px;
            background: var(--unipaz-green);
            border-radius: 2px;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- ═══ Barra superior institucional ═══ -->
    <div class="topbar-institucional d-none d-md-block py-1">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <span>
                    <i class="bi bi-building me-1"></i>
                    Instituto Universitario de la Paz — Barrancabermeja, Santander
                </span>
                <span>
                    <a href="https://unipaz.edu.co/"><i class="bi bi-globe me-1"></i>unipaz.edu.co</a>
                    <span class="mx-2 opacity-25">|</span>
                    <a href="#"><i class="bi bi-envelope me-1"></i>Vigilada Min Educación</a>
                </span>
            </div>
        </div>
    </div>

    <!-- ═══ Navbar principal ═══ -->
    <nav class="navbar navbar-expand-lg navbar-unipaz">
        <div class="container-fluid px-3 px-md-4">

            <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('home') }}">
                <img src="{{ asset('images/LogoWhite_.png') }}"
                    alt="UNIPAZ — Bolsa de Empleo"
                    style="height: 60px; width: auto;">
                <span class="brand-sub text-white ms-1">Emplea-UNIPAZ </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <i class="bi bi-list text-white fs-5"></i>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1 pt-2 pt-lg-0">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item ms-1">
                        <a class="nav-link btn-nav-student" href="{{ route('auth.google') }}">
                            <i class="bi bi-mortarboard-fill me-1"></i>Soy Estudiante
                        </a>
                    </li>
                    <li class="nav-item ms-1">
                        <a class="nav-link btn-nav-company" href="{{ route('login') }}">
                            <i class="bi bi-building me-1"></i>Soy Empresa
                        </a>
                    </li>
                    @endguest

                    @auth
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Panel Admin
                        </a>
                    </li>
                    @elseif(auth()->user()->isStudent())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.jobs') ? 'active' : '' }}"
                            href="{{ route('student.jobs') }}">
                            <i class="bi bi-search me-1"></i>Vacantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.applications') ? 'active' : '' }}"
                            href="{{ route('student.applications') }}">
                            <i class="bi bi-file-earmark-check me-1"></i>Mis postulaciones
                        </a>
                    </li>
                    @elseif(auth()->user()->isCompany())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('company.dashboard') ? 'active' : '' }}"
                            href="{{ route('company.dashboard') }}">
                            <i class="bi bi-grid me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-nav-student" href="{{ route('company.jobs.create') }}">
                            <i class="bi bi-plus-circle me-1"></i>Publicar vacante
                        </a>
                    </li>
                    @endif

                    <!-- Notificaciones -->
                    <li class="nav-item dropdown ms-1">
                        <a class="nav-link position-relative px-2" href="#" data-bs-toggle="dropdown" title="Notificaciones">
                            <i class="bi bi-bell fs-5"></i>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="notif-badge"></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="min-width: 300px; max-height: 380px; overflow-y: auto;">
                            <li class="px-3 py-2">
                                <span class="fw-bold small text-unipaz">
                                    <i class="bi bi-bell me-1"></i>Notificaciones
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider mt-0">
                            </li>
                            @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                            <li>
                                <a class="dropdown-item py-2" href="#"
                                    onclick="event.preventDefault(); fetch('/notifications/{{ $notification->id }}/read').then(() => window.location.reload())">
                                    <div class="d-flex gap-2">
                                        <div class="mt-1 flex-shrink-0">
                                            <span class="d-inline-block rounded-circle bg-unipaz" style="width:8px;height:8px;margin-top:5px;"></span>
                                        </div>
                                        <div>
                                            <div class="small fw-500">{{ $notification->data['message'] ?? 'Nueva notificación' }}</div>
                                            <div class="text-muted" style="font-size:.75rem;">{{ $notification->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @empty
                            <li class="text-center py-3 text-muted">
                                <i class="bi bi-bell-slash opacity-25 fs-4 d-block mb-1"></i>
                                <small>Sin notificaciones nuevas</small>
                            </li>
                            @endforelse
                        </ul>
                    </li>

                    <!-- Perfil -->
                    <li class="nav-item dropdown ms-1">
                        <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->avatar_url }}" class="avatar-nav" alt="avatar">
                            <span class="d-none d-lg-inline small">{{ Str::limit(auth()->user()->name, 18) }}</span>
                            <i class="bi bi-chevron-down d-none d-lg-inline" style="font-size:.65rem; opacity:.6;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="min-width:200px;">
                            <li class="px-3 py-2">
                                <div class="fw-semibold small text-unipaz">{{ Str::limit(auth()->user()->name, 24) }}</div>
                                <div class="text-muted" style="font-size:.75rem;">{{ auth()->user()->email }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider mt-0">
                            </li>
                            @if(auth()->user()->isStudent())
                            <li>
                                <a class="dropdown-item" href="{{ route('student.profile') }}">
                                    <i class="bi bi-person me-2 text-unipaz"></i>Mi perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                                    <i class="bi bi-grid me-2 text-unipaz"></i>Dashboard
                                </a>
                            </li>
                            @elseif(auth()->user()->isCompany())
                            <li>
                                <a class="dropdown-item" href="{{ route('company.profile') }}">
                                    <i class="bi bi-building me-2 text-unipaz"></i>Mi empresa
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('company.dashboard') }}">
                                    <i class="bi bi-grid me-2 text-unipaz"></i>Dashboard
                                </a>
                            </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- ═══ Alertas globales ═══ -->
    @foreach(['success','error','warning','info'] as $type)
    @if(session($type))
    <div class="container-fluid px-3 px-md-4 mt-3">
        <div class="alert alert-{{ $type === 'error' ? 'danger' : $type }} alert-dismissible fade show" role="alert">
            <i class="bi bi-{{ $type === 'success' ? 'check-circle-fill' : ($type === 'error' ? 'x-circle-fill' : ($type === 'warning' ? 'exclamation-triangle-fill' : 'info-circle-fill')) }} me-2"></i>
            {{ session($type) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif
    @endforeach

    @if($errors->any())
    <div class="container-fluid px-3 px-md-4 mt-3">
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-x-circle-fill me-2"></i>
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif

    <!-- ═══ Contenido principal ═══ -->
    @yield('content')

    <!-- ═══ Footer institucional ═══ -->
    <footer class="footer-unipaz">
        <div class="container-fluid px-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="{{ asset('images/LogoWhite_.png') }}"
                        alt="UNIPAZ"
                        style="height: 68px; width: auto; margin-bottom: .5rem;">
                    <div class="footer-green-bar"></div>
                    <p style="font-size:.82rem; line-height:1.6;">
                        Plataforma institucional que conecta el talento universitario de Barrancabermeja con oportunidades laborales de la región y el país.
                    </p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="text-white fw-600 mb-2" style="font-size:.85rem;">Instituto Universitario de la Paz</div>
                    <ul class="list-unstyled mb-0" style="font-size:.8rem;">
                        <li class="mb-1"><i class="bi bi-geo-alt me-2" style="color:var(--unipaz-green);"></i>Barrancabermeja, Santander</li>
                        <li class="mb-1"><i class="bi bi-globe me-2" style="color:var(--unipaz-green);"></i><a href="https://unipaz.edu.co/">unipaz.edu.co</a></li>
                        <li class="mb-1"><i class="bi bi-envelope me-2" style="color:var(--unipaz-green);"></i><a href="https://unipaz.edu.co/transparencia/espacios-de-atencion-ciudadana/ ">contacto@unipaz.edu.co</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="text-white fw-600 mb-2" style="font-size:.85rem;">Redes oficiales</div>
                    <div class="d-flex gap-2 flex-wrap" style="font-size:.8rem;">
                        <a href="https://www.facebook.com/profile.php?id=100064522486908&locale=es_LA" class="d-flex align-items-center gap-1 py-1 px-2 rounded"
                            style="background:rgba(255,255,255,.07); color:rgba(255,255,255,.6);">
                            <i class="bi bi-facebook"></i> UNIPAZ
                        </a>
                        <a href="https://www.instagram.com/p/DVdjR5blvzZ/" class="d-flex align-items-center gap-1 py-1 px-2 rounded"
                            style="background:rgba(255,255,255,.07); color:rgba(255,255,255,.6);">
                            <i class="bi bi-instagram"></i> @UNIPAZNoticias
                        </a>
                        <a href="https://www.youtube.com/@UNIPAZNoticias" class="d-flex align-items-center gap-1 py-1 px-2 rounded"
                            style="background:rgba(255,255,255,.07); color:rgba(255,255,255,.6);">
                            <i class="bi bi-youtube"></i> YouTube
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center text-center gap-2">
                <span>&copy; {{ date('Y') }} Instituto Universitario de la Paz — UNIPAZ. Todos los derechos reservados.</span>
                <span style="font-size:.75rem;">
                    <i class="bi bi-shield-check me-1" style="color:var(--unipaz-green);"></i>
                    Vigilada Ministerio de Educación
                </span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>