<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="{{ asset('assets/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
/* ================================
   ORGANICK ADMIN THEME (UI ONLY)
   NO LOGIC / NO STRUCTURE CHANGES
================================ */

:root {
    --og-primary: #6B8E23;
    --og-primary-soft: #E8EFE2;
    --og-sidebar: #3E4E3A;
    --og-bg: #FAF7F2;
    --og-card: #FFFFFF;
    --og-text: #3A2C23;
    --og-muted: #7A7A7A;
}

/* Base */
body {
    background: var(--og-bg) !important;
    color: var(--og-text);
    font-family: 'Poppins', system-ui, sans-serif;
}

/* Sidebar */
.sidebar,
.admin-sidebar,
aside {
    background: linear-gradient(135deg, var(--og-sidebar) 0%, #2a3d2a 100%) !important;
    position: fixed !important;
    left: 0 !important;
    top: 0 !important;
    bottom: 0 !important;
    width: 280px !important;
    z-index: 1000 !important;
    box-shadow: 4px 0 20px rgba(0,0,0,0.15) !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
}

/* Sidebar Brand Section */
.sidebar-brand {
    padding: 30px 25px 25px !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
    background: linear-gradient(135deg, rgba(107,142,35,0.1) 0%, rgba(42,61,42,0.1) 100%) !important;
    position: relative !important;
    display: flex !important;
    align-items: center !important;
}

.sidebar-brand::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 25px;
    right: 25px;
    height: 1px;
    background: linear-gradient(90deg, transparent 0%, rgba(107,142,35,0.3) 50%, transparent 100%) !important;
}

/* Brand Decorations - Removed */

.brand-accent {
    position: absolute !important;
    bottom: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: 3px !important;
    background: linear-gradient(90deg, var(--og-primary), #7a9e23, var(--og-primary)) !important;
    border-radius: 2px 2px 0 0 !important;
}

.brand-logo {
    width: 50px !important;
    height: 50px !important;
    border-radius: 12px !important;
    background: linear-gradient(135deg, var(--og-primary) 0%, #7a9e23 100%) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #fff !important;
    font-size: 1.8rem !important;
    backdrop-filter: blur(10px) !important;
    border: 2px solid rgba(255,255,255,0.2) !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    z-index: 2 !important;
    box-shadow: 0 4px 15px rgba(107,142,35,0.3) !important;
}

.brand-logo:hover {
    transform: scale(1.05) !important;
    background: linear-gradient(135deg, #7a9e23 0%, var(--og-primary) 100%) !important;
    box-shadow: 0 6px 20px rgba(107,142,35,0.4) !important;
}

.brand-logo i {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2)) !important;
}

.brand-text {
    margin-left: 15px !important;
    position: relative !important;
    z-index: 2 !important;
}

.brand-title {
    color: #fff !important;
    font-size: 1.4rem !important;
    font-weight: 700 !important;
    margin-bottom: 2px !important;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2) !important;
}

.brand-sub {
    color: rgba(255,255,255,0.7) !important;
    font-size: 0.9rem !important;
    font-weight: 400 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

/* Sidebar Menu */
.sidebar-menu {
    list-style: none !important;
    padding: 20px 0 !important;
    margin: 0 !important;
}

.sidebar-menu li {
    margin: 0 !important;
    padding: 0 15px !important;
}

.menu-separator {
    height: 20px !important;
    position: relative !important;
}

.menu-separator::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 60% !important;
    height: 1px !important;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.2) 50%, transparent 100%) !important;
}

.sidebar-menu li a {
    display: flex !important;
    align-items: center !important;
    padding: 14px 20px !important;
    color: rgba(255,255,255,0.8) !important;
    text-decoration: none !important;
    border-radius: 12px !important;
    margin: 4px 10px !important;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    position: relative !important;
    font-weight: 500 !important;
    letter-spacing: 0.3px !important;
}

.sidebar-menu li a span {
    flex: 1 !important;
}

.sidebar-menu li a i {
    font-size: 1.1rem !important;
    width: 20px !important;
    margin-right: 12px !important;
    transition: all 0.3s ease !important;
}

.sidebar-menu li a:hover {
    background: linear-gradient(135deg, var(--og-primary) 0%, #7a9e23 100%) !important;
    color: #fff !important;
    transform: translateX(5px) !important;
    box-shadow: 0 4px 15px rgba(107,142,35,0.3) !important;
}

.sidebar-menu li a:hover i {
    transform: scale(1.1) !important;
}

.sidebar-menu li a.active {
    background: linear-gradient(135deg, var(--og-primary) 0%, #7a9e23 100%) !important;
    color: #fff !important;
    box-shadow: 0 4px 15px rgba(107,142,35,0.4) !important;
    border-left: 4px solid rgba(255,255,255,0.8) !important;
}

.sidebar-menu li a.active::before {
    content: '';
    position: absolute;
    left: -4px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 60%;
    background: #fff !important;
    border-radius: 0 2px 2px 0 !important;
}

/* Back to Site Link Special Styling */
.sidebar-menu li a.back-to-site {
    background: rgba(255,255,255,0.05) !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    margin-top: 20px !important;
    color: rgba(255,255,255,0.7) !important;
}

.sidebar-menu li a.back-to-site:hover {
    background: rgba(255,255,255,0.1) !important;
    border-color: rgba(255,255,255,0.2) !important;
    transform: translateX(3px) !important;
    color: #fff !important;
}

/* Navbar / Top bar */
.navbar,
.topbar,
header {
    background: #fff !important;
    border-radius: 14px;
    box-shadow: 0 6px 16px rgba(0,0,0,.06);
}

/* Main content */
.main-content {
    background: var(--og-bg) !important;
    margin-left: 280px !important;
    padding: 28px !important;
}

/* Cards */
.card {
    background: var(--og-card) !important;
    border: 1px solid var(--og-primary-soft) !important;
    border-radius: 10px !important;
}

/* Tables */
.table {
    color: var(--og-text) !important;
}

.table thead th {
    background: var(--og-primary-soft) !important;
    color: var(--og-text) !important;
    border-color: var(--og-primary-soft) !important;
}

.table tbody tr {
    border-color: var(--og-primary-soft) !important;
}

/* Buttons */
.btn {
    border-radius: 8px !important;
}

.btn-primary {
    background: var(--og-primary) !important;
    border-color: var(--og-primary) !important;
}

.btn-primary:hover {
    background: var(--og-primary-soft) !important;
    border-color: var(--og-primary-soft) !important;
}

/* Form elements */
.form-control {
    border: 1px solid var(--og-primary-soft) !important;
    border-radius: 8px !important;
}

.form-control:focus {
    border-color: var(--og-primary) !important;
    box-shadow: 0 0 0 .2rem rgba(107,142,35,.25) !important;
}

/* Status / Badges */
.badge-success {
    background: #5CB85C !important;
}

.badge-warning {
    background: #F2C94C !important;
    color: #000 !important;
}

.badge-danger {
    background: #E46A6A !important;
}

/* Remove harsh blues/purples */
[style*="#667eea"],
[style*="#5568d3"],
[style*="linear-gradient(135deg, #667eea"] {
    background: var(--og-primary) !important;
    color: #fff !important;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar,
    aside {
        position: static !important;
        width: 100% !important;
        height: auto !important;
    }
    .main-content {
        margin-left: 0 !important;
    }
}
</style>
</head>
<body>
    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="brand-logo">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="brand-text">
                    <div class="brand-title">Admin Panel</div>
                    <div class="brand-sub">Management</div>
                </div>
                <div class="brand-accent"></div>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-house-door"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"><i class="bi bi-box-seam"></i> <span>Products</span></a></li>
                <li><a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"><i class="bi bi-receipt"></i> <span>Orders</span></a></li>
                <li><a href="{{ route('admin.customers.index') }}" class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}"><i class="bi bi-people"></i> <span>Customers</span></a></li>
                <li><a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}"><i class="bi bi-person"></i> <span>Profile</span></a></li>
                <li class="menu-separator"></li>
                <li><a href="{{ route('home') }}" class="back-to-site"><i class="bi bi-arrow-left"></i> <span>Back to Site</span></a></li>
            </ul>
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>
</html>
