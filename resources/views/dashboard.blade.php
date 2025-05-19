<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .sidebar {
            width: 280px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .sidebar.collapsed {
            width: 80px;
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: #4e73df;
            display: flex;
            align-items: center;
        }
        
        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            white-space: nowrap;
            overflow: hidden;
        }
        
        .sidebar-header .logo-icon {
            height: 35px;
            width: 35px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #4e73df;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .sidebar-menu {
            padding: 15px 0;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #4e73df;
        }
        
        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 15px;
            font-size: 1.1rem;
        }
        
        .sidebar .nav-link span {
            white-space: nowrap;
            overflow: hidden;
        }
        
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 10px 15px;
        }
        
        .content {
            margin-left: 280px;
            padding: 20px;
            transition: all 0.3s;
        }
        
        .content.expanded {
            margin-left: 80px;
        }
        
        .navbar-top {
            background-color: #fff;
            border-bottom: 1px solid #e3e6f0;
            padding: 0 20px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .user-dropdown {
            display: flex;
            align-items: center;
        }
        
        .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.show {
                margin-left: 0;
            }
            .content {
                margin-left: 0;
            }
        }
        
        .menu-btn {
            cursor: pointer;
            font-size: 1.5rem;
        }
        
        .submenu {
            padding-left: 30px;
            background-color: rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-icon">D</div>
            <h3>Dashboard</h3>
        </div>

        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                <div class="sidebar-heading px-3 py-2 text-xs font-weight-bold text-uppercase opacity-50">
                    Interface
                </div>
                
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#usersSubmenu">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                        <i class="fas fa-angle-down ms-auto"></i>
                    </a>
                    <div class="collapse submenu" id="usersSubmenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <i class="fas fa-list"></i>
                                    <span>All Users</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users/create" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <span>Add User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#postsSubmenu">
                        <i class="fas fa-file-alt"></i>
                        <span>Posts</span>
                        <i class="fas fa-angle-down ms-auto"></i>
                    </a>
                    <div class="collapse submenu" id="postsSubmenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="/posts" class="nav-link">
                                    <i class="fas fa-list"></i>
                                    <span>All Posts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/posts/create" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <span>Add Post</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <div class="sidebar-divider"></div>
                <div class="sidebar-heading px-3 py-2 text-xs font-weight-bold text-uppercase opacity-50">
                    Settings
                </div>
                
                <li class="nav-item">
                    <a href="/settings" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>General Settings</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Content area -->
    <!-- <div class="content" id="content">
        <nav class="navbar-top">
            <div>
                <span class="menu-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </span>
            </div>
            <div class="user-dropdown">
                <img src="/api/placeholder/40/40" alt="User">
                <span>reena</span>
            </div>
        </nav> -->
        
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
            
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">150</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Posts</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">243</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap collapse
            var collapseElementList = document.querySelectorAll('.collapse');
            collapseElementList.forEach(function(collapseEl) {
                new bootstrap.Collapse(collapseEl, {
                    toggle: false
                });
            });
    
            // Add click handler for submenu toggles
            var submenuToggles = document.querySelectorAll('[data-bs-toggle="collapse"]');
            submenuToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    var targetId = this.getAttribute('data-bs-target');
                    var target = document.querySelector(targetId);
                    if (target) {
                        target.classList.toggle('show');
                    }
                    // Toggle the arrow icon
                    var arrow = this.querySelector('.fa-angle-down');
                    if (arrow) {
                        arrow.classList.toggle('fa-rotate-180');
                    }
                });
            });
    
            // Sidebar toggle functionality
            var sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.getElementById('sidebar').classList.toggle('collapsed');
                    document.getElementById('content').classList.toggle('expanded');
                });
            }
    
            // Handle responsive behavior
            function checkWidth() {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                if (window.innerWidth < 768 && sidebar && content) {
                    sidebar.classList.add('collapsed');
                    content.classList.add('expanded');
                }
            }
            
            window.addEventListener('resize', checkWidth);
            checkWidth();
        });
    </script>
</body>
</html>

</x-app-layout>
