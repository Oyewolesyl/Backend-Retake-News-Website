<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'SLV News')); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
    :root {
        --primary-color: #dc3545;
        --primary-dark: #b02a37;
        --secondary-color: #6c757d;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --white: #ffffff;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-600: #6c757d;
        --gray-800: #495057;
        --gray-900: #212529;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background-color: var(--light-color);
        line-height: 1.6;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: var(--gray-100);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
    }

    /* Breaking News Ticker */
    .breaking-news-ticker {
        background: var(--primary-color);
        color: white;
        padding: 8px 0;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
    }

    .breaking-news-content {
        display: inline-block;
        animation: scroll-left 30s linear infinite;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @keyframes scroll-left {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }

    /* Header Styles - FIXED NAVIGATION VISIBILITY */
    .navbar {
        background: var(--white) !important;
        border-bottom: 3px solid var(--primary-color);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        padding: 1rem 0;
        position: sticky;
        top: 0;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .navbar.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 20px rgba(0,0,0,0.15);
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        font-size: 2.2rem;
        color: var(--primary-color) !important;
        text-decoration: none;
        letter-spacing: -1px;
        position: relative;
        transition: all 0.3s ease;
    }

    .navbar-brand::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .navbar-brand:hover::after {
        width: 100%;
    }

    .navbar-brand:hover {
        color: var(--primary-dark) !important;
        transform: translateY(-1px);
    }

    /* FIXED: Better navigation link visibility */
    .nav-link {
        font-weight: 600 !important;
        color: #333 !important;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        padding: 0.75rem 1rem !important;
        position: relative;
        transition: all 0.3s ease;
        border-radius: 6px;
        margin: 0 2px;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover {
        color: var(--primary-color) !important;
        background: rgba(220, 53, 69, 0.1);
        transform: translateY(-1px);
    }

    .nav-link:hover::before {
        width: 60%;
    }

    /* Active nav link */
    .nav-link.active {
        color: var(--primary-color) !important;
        background: rgba(220, 53, 69, 0.1);
    }

    .nav-link.active::before {
        width: 60%;
    }

    .navbar-toggler {
        border: 2px solid var(--primary-color);
        padding: 6px 10px;
        transition: all 0.3s ease;
        border-radius: 6px;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .navbar-toggler:hover {
        background: rgba(220, 53, 69, 0.1);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23dc3545' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .user-avatar:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Dropdown styling */
    .dropdown-menu {
        border: none;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-radius: 8px;
        padding: 0.5rem 0;
        margin-top: 0.5rem;
    }

    .dropdown-item {
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        color: #333;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background: rgba(220, 53, 69, 0.1);
        color: var(--primary-color);
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border-color: var(--gray-200);
    }

    /* Main Content */
    .container {
        background: transparent;
        backdrop-filter: none;
        border-radius: 0;
        padding: 30px 15px;
        margin-top: 0;
        margin-bottom: 0;
        max-width: 1200px;
    }

    /* Article Cards */
    .article-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        position: relative;
    }

    .article-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #ff6b7a);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .article-card:hover::before {
        opacity: 1;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-color: var(--primary-color);
    }

    /* FIXED: Remove broken image icons, use newspaper icon */
    .article-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
        border-bottom: 1px solid var(--gray-200);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-600);
        font-size: 3rem;
        transition: all 0.3s ease;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .article-card:hover .article-image {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
        color: var(--primary-color);
    }

    .article-card:hover .article-image img {
        transform: scale(1.02);
    }

    .article-content {
        padding: 1.5rem;
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.75rem;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .article-title:hover {
        color: var(--primary-color);
    }

    .article-excerpt {
        color: var(--gray-600);
        font-size: 0.95rem;
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .article-meta {
        font-size: 0.85rem;
        color: var(--gray-600);
        border-top: 1px solid #f1f3f4;
        padding-top: 0.75rem;
        margin-top: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .article-date {
        color: var(--primary-color);
        font-weight: 500;
    }

    /* Buttons */
    .btn {
        border-radius: 8px;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border: none;
        padding: 0.75rem 1.5rem;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-dark), #8b1e2b);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .btn-outline-primary {
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        padding: 0.5rem 1.5rem;
        background: transparent;
    }

    .btn-outline-primary:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
        padding-bottom: 1rem;
    }

    h1:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #ff6b7a);
        border-radius: 2px;
    }

    /* Cards and Forms */
    .card {
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        background: var(--white);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .card-header {
        background: linear-gradient(135deg, var(--gray-100), #e3e6ea);
        border-bottom: 1px solid var(--gray-200);
        border-radius: 12px 12px 0 0 !important;
        font-weight: 600;
        color: #333;
        padding: 1rem 1.5rem;
    }

    .form-control {
        border-radius: 8px;
        border: 2px solid var(--gray-200);
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        transform: translateY(-1px);
    }

    /* Alerts */
    .alert {
        border-radius: 8px;
        border: none;
        padding: 1rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .alert::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-success::before {
        background: var(--success-color);
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .alert-danger::before {
        background: var(--danger-color);
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .alert-info::before {
        background: var(--info-color);
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
    }

    .alert-warning::before {
        background: var(--warning-color);
    }

    /* Loading Spinner */
    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255,255,255,.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Footer */
    .footer {
        background: #333;
        color: white;
        padding: 2rem 0;
        margin-top: 4rem;
    }

    .footer-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .footer-links a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: var(--primary-color);
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.8rem;
        }

        .article-title {
            font-size: 1.2rem;
        }

        h1 {
            font-size: 2rem;
        }

        .container {
            padding: 20px 10px;
        }

        .breaking-news-content {
            font-size: 0.8rem;
        }

        .nav-link {
            padding: 0.75rem 1rem !important;
            margin: 2px 0;
        }

        /* Better mobile navigation */
        .navbar-collapse {
            background: white;
            border-radius: 8px;
            margin-top: 1rem;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    }

    @media (max-width: 480px) {
        .navbar-brand {
            font-size: 1.5rem;
        }

        .article-card {
            margin-bottom: 1.5rem;
        }

        .article-content {
            padding: 1rem;
        }
    }

    /* Accessibility improvements */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    /* Focus styles for better accessibility */
    .btn:focus,
    .nav-link:focus,
    .form-control:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }
    </style>
</head>
<body>
    <div id="app">
        <!-- Breaking News Ticker -->
        <div class="breaking-news-ticker">
            <div class="container">
                <div class="breaking-news-content">
                    <i class="fas fa-bolt me-2"></i>BREAKING: Stay updated with the latest news and developments • Follow us for real-time updates • Your trusted news source
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-light bg-white" id="mainNavbar">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <i class="fas fa-newspaper me-2"></i>SLV NEWS
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-newspaper me-1"></i>Latest
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-chart-line me-1"></i>Politics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-futbol me-1"></i>Sports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-laptop me-1"></i>Tech
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>">
                                        <i class="fas fa-sign-in-alt me-1"></i>Login
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>">
                                        <i class="fas fa-user-plus me-1"></i>Register
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(auth()->user()->is_admin): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                                        <i class="fas fa-tachometer-alt me-1"></i>Admin
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="user-avatar me-2">
                                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                                    </div>
                                    <span><?php echo e(Auth::user()->name); ?></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
    <i class="fas fa-user me-2"></i>Profile
</a>

                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cog me-2"></i>Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-brand">
                            <i class="fas fa-newspaper me-2"></i>SLV NEWS
                        </div>
                        <p class="text-muted">Your trusted source for breaking news, in-depth analysis, and comprehensive coverage of current events.</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase fw-bold mb-3 text-white">News</h6>
                        <div class="footer-links">
                            <a href="#" class="d-block mb-2">Politics</a>
                            <a href="#" class="d-block mb-2">Sports</a>
                            <a href="#" class="d-block mb-2">Technology</a>
                            <a href="#" class="d-block mb-2">Business</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase fw-bold mb-3 text-white">Company</h6>
                        <div class="footer-links">
                            <a href="#" class="d-block mb-2">About Us</a>
                            <a href="#" class="d-block mb-2">Contact</a>
                            <a href="#" class="d-block mb-2">Careers</a>
                            <a href="#" class="d-block mb-2">Privacy</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-white">Follow Us</h6>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-youtube fa-lg"></i>
                            </a>
                        </div>
                        <div class="mt-3">
                            <small class="text-muted">© <?php echo e(date('Y')); ?> SLV News. All rights reserved.</small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Include Cookie Consent -->
    <?php echo $__env->make('components.cookie-consent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading state to forms
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="loading-spinner me-2"></span>Loading...';
                    
                    // Re-enable after 5 seconds as fallback
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }, 5000);
                }
            });
        });

        // Auto-hide alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>

    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\backend-news-website\resources\views/layouts/app.blade.php ENDPATH**/ ?>