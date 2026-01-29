<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="{{ asset('assets/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #2d3748;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 30px 0;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,0.4);
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 3px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.3);
        }
        .sidebar-brand {
            padding: 0 24px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 20px;
        }
        .sidebar-brand h5 {
            margin: 0;
            font-weight: 700;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInLeft 0.5s ease;
        }
        .sidebar-brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: transform 0.3s ease;
        }
        .sidebar-brand-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }
        .sidebar-menu {
            list-style: none;
            padding: 0 12px;
        }
        .sidebar-menu li {
            margin-bottom: 8px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 14px;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }
        .sidebar-menu a::before {
            content: '';
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }
        .sidebar-menu a:hover::before {
            left: 100%;
        }
        .sidebar-menu a:hover {
            background: rgba(102, 126, 234, 0.3);
            color: white;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
        }
        .sidebar-menu a.active {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.4), rgba(118, 75, 162, 0.3));
            color: white;
            font-weight: 700;
            box-shadow: inset 0 0 15px rgba(102, 126, 234, 0.2);
            border-left: 4px solid #667eea;
            padding-left: 12px;
        }
        .sidebar-menu a.active::after {
            content: '';
            position: absolute;
            right: 10px;
            width: 6px;
            height: 6px;
            background: #667eea;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        .sidebar-menu a:hover i {
            transform: scale(1.2);
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 30px;
        }
        .top-bar {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: -30px -30px 30px -30px;
            margin-bottom: 30px;
            border-radius: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .top-bar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
        }
        .logout-btn {
            background: #fc8181;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .logout-btn:hover {
            background: #f56565;
            color: white;
            text-decoration: none;
        }
        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }
        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                height: 100vh;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            .top-bar {
                margin: -20px -20px 20px -20px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h5>
                    <div class="sidebar-brand-icon">⚙️</div>
                    Admin
                </h5>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <i class="bi bi-receipt"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.customers.index') }}" class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 16px; margin-top: 16px;">
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="bi bi-eye"></i>
                        <span>View Store</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="top-bar">
                <div></div>
                <div class="top-bar-user">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div style="display: flex; flex-direction: column; gap: 2px;">
                        <div style="font-weight: 600;">{{ auth()->user()->name }}</div>
                        <div style="font-size: 12px; color: #a0aec0;">Administrator</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
