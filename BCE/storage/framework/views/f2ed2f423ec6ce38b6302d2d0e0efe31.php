<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?> - Batam Campus Expo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }
        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: #2c3e50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px 0;
            transition: transform 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar h2 {
            padding: 0 20px;
            margin-bottom: 30px;
            color: #ecf0f1;
            font-size: 18px;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            padding: 12px 20px;
        }
        .sidebar ul li a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
            font-size: 14px;
        }
        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            color: white;
            background: #34495e;
            padding-left: 25px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .header {
            background: white;
            padding: 15px 30px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        .header h1 {
            font-size: 24px;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            font-size: 14px;
        }
        .btn-primary {
            background: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background: #2980b9;
        }
        .btn-success {
            background: #27ae60;
            color: white;
        }
        .btn-success:hover {
            background: #229954;
        }
        .btn-danger {
            background: #e74c3c;
            color: white;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        table th, table td {
            padding: 8px 4px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background: #f8f9fa;
            font-weight: 600;
            font-size: 11px;
        }
        
        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 60px 10px 20px;
            }
            .header {
                padding: 10px 15px;
                flex-direction: column;
                align-items: flex-start;
            }
            .header h1 {
                font-size: 20px;
            }
            .header span {
                font-size: 12px;
            }
            .content {
                padding: 15px;
            }
            table {
                font-size: 11px;
            }
            table th, table td {
                padding: 6px 2px;
            }
            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
        }
        
        @media screen and (max-width: 360px) {
            .main-content {
                padding: 60px 5px 10px;
            }
            .header {
                padding: 8px 10px;
            }
            .header h1 {
                font-size: 18px;
            }
            .content {
                padding: 10px;
            }
            table {
                font-size: 10px;
            }
            table th, table td {
                padding: 4px 1px;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    <div class="sidebar" id="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">Dashboard</a></li>
            <li><a href="<?php echo e(route('admin.tickets')); ?>" class="<?php echo e(request()->routeIs('admin.tickets') ? 'active' : ''); ?>">Tiket</a></li>
            <li><a href="<?php echo e(route('admin.access-management')); ?>" class="<?php echo e(request()->routeIs('admin.access-management') ? 'active' : ''); ?>">Manajemen Akses</a></li>
            <li><a href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
        <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </div>
    <div class="main-content">
        <div class="header">
            <h1><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
            <span>Selamat datang, <?php echo e(Auth::guard('admin')->user()->name); ?></span>
        </div>
        <div class="content">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-error"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            if (window.innerWidth <= 768 && sidebar.classList.contains('active')) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>

<?php /**PATH C:\Users\Asus\BCE\Batam-Campus-Expo\BCE\resources\views/admin/layout.blade.php ENDPATH**/ ?>