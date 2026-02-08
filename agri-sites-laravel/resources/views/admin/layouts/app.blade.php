<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Admin Dark Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin-theme.css') }}">
    
    <style>
        :root {
            --bg-gradient-start: #0a0e14;
            --bg-gradient-end: #0f1419;
            --sidebar-bg: #0b1016;
            --accent-cyan: #06b6d4;
            --accent-teal: #14b8a6;
            --accent-gold: #f59e0b;
            --text-primary: #e5e7eb;
            --text-muted: #9ca3af;
            --border-subtle: rgba(6,182,212,0.15);
        }

        html, body {
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
        }

        body.admin-theme {
            display: flex;
            color: var(--text-primary);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        /* Enhanced Sidebar with Animations */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, rgba(11,16,22,0.98) 0%, rgba(7,10,15,0.96) 100%);
            border-right: 1px solid var(--border-subtle);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 40;
            display: flex;
            flex-direction: column;
            box-shadow: 8px 0 40px rgba(0,0,0,0.6);
            animation: slideInLeft 0.5s cubic-bezier(0.4,0,0.2,1) forwards;
        }

        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        main {
            flex: 1;
            overflow-y: auto;
            background: radial-gradient(circle at top right, rgba(6,182,212,0.03), transparent 50%),
                        radial-gradient(circle at bottom left, rgba(245,158,11,0.02), transparent 50%);
        }

        /* Sidebar Header with Floating Logo */
        .sidebar-header {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid var(--border-subtle);
            animation: slideInLeft 0.6s ease-out 0.1s forwards;
            opacity: 0;
            flex-shrink: 0;
        }

        nav {
            flex: 1;
            overflow-y: auto;
            padding-top: 1rem;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-teal));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0a0e14;
            font-size: 24px;
            box-shadow: 0 8px 24px rgba(6,182,212,0.4);
            animation: logoFloat 3s ease-in-out infinite;
            transition: all 0.3s ease;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-5px) rotate(2deg); }
        }

        .logo-icon:hover {
            transform: scale(1.08) rotate(5deg);
            box-shadow: 0 12px 32px rgba(6,182,212,0.6);
        }

        .logo-text h2 {
            margin: 0;
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .logo-text p {
            margin: 0;
            color: var(--accent-cyan);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        /* Enhanced Nav Links with Stagger Animation */
        .nav-link {
            color: #94a3b8;
            padding: 13px 20px;
            border-radius: 10px;
            margin: 4px 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
            text-decoration: none;
            opacity: 0;
            animation: slideInLeft 0.4s ease-out forwards;
        }

        .nav-link:nth-child(1) { animation-delay: 0.15s; }
        .nav-link:nth-child(2) { animation-delay: 0.2s; }
        .nav-link:nth-child(3) { animation-delay: 0.25s; }
        .nav-link:nth-child(4) { animation-delay: 0.3s; }
        .nav-link:nth-child(5) { animation-delay: 0.35s; }
        .nav-link:nth-child(6) { animation-delay: 0.4s; }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, var(--accent-cyan), var(--accent-teal));
            transform: scaleY(0);
            transition: transform 0.3s ease;
            border-radius: 0 3px 3px 0;
        }

        .nav-link i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .nav-link:hover {
            background: linear-gradient(90deg, rgba(6,182,212,0.15), rgba(6,182,212,0.08));
            color: #e5e7eb;
            text-decoration: none;
            transform: translateX(6px);
            box-shadow: 0 4px 16px rgba(6,182,212,0.2);
        }

        .nav-link:hover::before {
            transform: scaleY(1);
        }

        .nav-link:hover i {
            transform: scale(1.15) rotate(5deg);
            color: var(--accent-cyan);
        }

        .nav-link.active {
            background: linear-gradient(90deg, rgba(6,182,212,0.2), rgba(6,182,212,0.1));
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(6,182,212,0.3);
        }

        .nav-link.active::before {
            transform: scaleY(1);
        }

        .nav-link.active i {
            color: var(--accent-cyan);
        }

        /* Topbar Enhancement */
        .topbar {
            background: rgba(11,16,22,0.8);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
            z-index: 30;
            box-shadow: 0 4px 16px rgba(0,0,0,0.3);
        }

        .topbar h1 {
            margin: 0;
            font-size: 1.75rem;
            color: #ffffff;
            font-weight: 700;
            animation: fadeInUp 0.6s ease-out forwards;
            background: linear-gradient(90deg, #ffffff, var(--accent-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: rgba(6,182,212,0.08);
            border-radius: 10px;
            border: 1px solid rgba(6,182,212,0.2);
            transition: all 0.3s ease;
        }

        .user-info:hover {
            background: rgba(6,182,212,0.12);
            border-color: rgba(6,182,212,0.3);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6,182,212,0.2);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-gold));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(6,182,212,0.3);
        }

        .user-name {
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid var(--border-subtle);
            flex-shrink: 0;
            animation: slideInLeft 0.6s ease-out 0.45s forwards;
            opacity: 0;
        }

        .sidebar-footer .nav-link {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.3);
            color: #fca5a5;
            animation: none;
            opacity: 1;
        }

        .sidebar-footer .nav-link:hover {
            background: rgba(239,68,68,0.15);
            border-color: rgba(239,68,68,0.4);
            color: #fff;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-24px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.02);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(6,182,212,0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(6,182,212,0.5);
        }

        main::-webkit-scrollbar {
            width: 8px;
        }

        main::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.02);
        }

        main::-webkit-scrollbar-thumb {
            background: rgba(6,182,212,0.25);
            border-radius: 4px;
        }

        main::-webkit-scrollbar-thumb:hover {
            background: rgba(6,182,212,0.4);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
@stack('styles')
</head>
<body class="admin-theme">
    <div class="sidebar">
        <!-- Logo Section -->
        <div class="sidebar-header">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="logo-text">
                    <h2>Admin</h2>
                    <p>Dashboard</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav>
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-2"></i><span>Dashboard</span>
            </a>

            <!-- Products -->
            <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i><span>Products</span>
            </a>

            <!-- Orders -->
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart me-2"></i><span>Orders</span>
            </a>

            <!-- Customers -->
            <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i><span>Customers</span>
            </a>

            <!-- Categories -->
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i><span>Categories</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i><span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <header class="topbar">
            <div>
                <button onclick="toggleSidebar()" class="btn btn-sm btn-link text-muted d-md-none me-3" style="text-decoration: none;">
                    <i class="fas fa-bars fs-5"></i>
                </button>
                <h1 class="d-inline">@yield('title', 'Dashboard')</h1>
            </div>

            <!-- User Menu -->
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
        </header>

        <!-- Content Area -->
        <main class="p-4 p-md-5">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-circle me-2"></i>Errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            if (!event.target.closest('.sidebar') && !event.target.closest('button[onclick="toggleSidebar()"]')) {
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Highlight current nav item
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
