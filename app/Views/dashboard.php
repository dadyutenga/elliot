<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Modern Color Scheme */
        :root {
            --primary: #f8f9fa;
            --primary-dark: #f1f3f5;
            --secondary: #e9ecef;
            --accent: #1a1f36;
            --accent-light: #2d3748;
            --text-primary: #1a1f36;
            --text-secondary: #4a5568;
            --border: #e2e8f0;
            --success:rgb(49, 196, 141);
            --warning: #f59e0b;
            --danger: #e53e3e;
            --shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 0.925rem;
            background-color: var(--primary-dark);
            color: var(--text-primary);
            line-height: 1.5;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--accent);
            color: var(--primary);
            padding: 2rem 1rem;
            position: fixed;
            width: 250px;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header i {
            font-size: 2rem;
            margin-right: 0.75rem;
            opacity: 0.9;
        }

        .sidebar-header h2 {
            font-size: 1.25rem;
            letter-spacing: -0.025em;
        }

        .sidebar-menu {
            list-style: none;
            margin-top: 2rem;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.675rem 1rem;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            border-radius: var(--radius);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
        }

        .sidebar-menu i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }

        /* Main Content */
        .main-content {
            grid-column: 2;
            padding: 2rem;
            background-color: var(--primary-dark);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.5rem;
            letter-spacing: -0.025em;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
            
            .main-content {
                grid-column: 1;
            }
        }

        /* Modern Dashboard Stats */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
            margin-top: 1.5rem;
        }

        .stat-card {
            background: var(--primary);
            padding: 1.5rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
        }

        .stat-card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-card-icon {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 1rem;
            font-size: 1.25rem;
        }

        .stat-card-title {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin: 0;
            font-weight: 500;
        }

        .stat-card-value {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0.5rem 0;
            letter-spacing: -0.025em;
        }

        .stat-card-trend {
            font-size: 0.75rem;
            color: var(--success);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Add these new utility classes */
        .bg-purple-soft { background-color: rgba(126, 87, 194, 0.1); }
        .text-purple { color: #7e57c2; }
        .bg-blue-soft { background-color: rgba(66, 153, 225, 0.1); }
        .text-blue { color: #4299e1; }
        .bg-orange-soft { background-color: rgba(245, 158, 11, 0.1); }
        .text-orange { color: #f59e0b; }
    </style>
</head>
<body>
    <!-- Skeleton Loading Overlay -->
    <div id="skeleton-loading" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: var(--primary-dark); z-index: 9999; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div style="text-align: center; color: var(--text-secondary); font-size: 1.2rem; margin-bottom: 2rem;">
            We are putting things ready for you...
        </div>
        <div class="skeleton-dashboard" style="display: grid; grid-template-columns: 250px 1fr; width: 100%; height: 100%;">
            <!-- Skeleton Sidebar -->
            <div class="skeleton-sidebar" style="background-color: var(--accent); padding: 2rem 1rem; height: 100%;">
                <div class="skeleton-header" style="height: 2.5rem; background-color: rgba(255, 255, 255, 0.1); margin-bottom: 2rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                <div class="skeleton-menu" style="margin-top: 2rem;">
                    <div style="height: 2.5rem; background-color: rgba(255, 255, 255, 0.1); margin-bottom: 0.5rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                    <div style="height: 2.5rem; background-color: rgba(255, 255, 255, 0.1); margin-bottom: 0.5rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                    <div style="height: 2.5rem; background-color: rgba(255, 255, 255, 0.1); margin-bottom: 0.5rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                    <div style="height: 2.5rem; background-color: rgba(255, 255, 255, 0.1); margin-bottom: 0.5rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                </div>
            </div>
            <!-- Skeleton Main Content -->
            <div class="skeleton-main-content" style="padding: 2rem; background-color: var(--primary-dark);">
                <div class="skeleton-header" style="height: 2rem; background-color: var(--border); margin-bottom: 2rem; border-radius: var(--radius); animation: shimmer 1.5s infinite;"></div>
                <div class="skeleton-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
                    <div class="skeleton-stat-card" style="background-color: var(--primary); padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border); height: 120px; animation: shimmer 1.5s infinite;"></div>
                    <div class="skeleton-stat-card" style="background-color: var(--primary); padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border); height: 120px; animation: shimmer 1.5s infinite;"></div>
                    <div class="skeleton-stat-card" style="background-color: var(--primary); padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border); height: 120px; animation: shimmer 1.5s infinite;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard" id="dashboard-content" style="display: none;">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-graduation-cap"></i>
                <h2>Exam Results Management</h2>
            </div>
            <?= view('shared/sidebar_menu') ?>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Dashboard Overview</h1>
            </div>
            
            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <!-- Total Students Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon bg-purple-soft text-purple">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="stat-card-title">Total Students</h3>
                    </div>
                    <div class="stat-card-value"><?= number_format($totalStudents) ?></div>
                    <div class="stat-card-trend">
                        <i class="fas fa-arrow-<?= $studentGrowth > 0 ? 'up' : 'down' ?>"></i>
                        <span><?= $studentGrowth ?>% this month</span>
                    </div>
                </div>

                <!-- Active Exams Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon bg-blue-soft text-blue">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="stat-card-title">Active Exams</h3>
                    </div>
                    <div class="stat-card-value"><?= $activeExams ?></div>
                    <div class="stat-card-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span><?= $newExamsThisWeek ?> new this week</span>
                    </div>
                </div>

                <!-- Completed Exams Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-icon bg-orange-soft text-orange">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="stat-card-title">Completed Exams</h3>
                    </div>
                    <div class="stat-card-value"><?= $completedExams ?></div>
                    <div class="stat-card-trend">
                        <i class="fas fa-arrow-up"></i>
                        <span><?= $completedExams ?> this month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Shimmer Animation for Skeleton Loading */
        @keyframes shimmer {
            0% {
                opacity: 0.5;
            }
            50% {
                opacity: 0.8;
            }
            100% {
                opacity: 0.5;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show skeleton loading for 5 seconds, then reveal dashboard content
            setTimeout(function () {
                document.getElementById('skeleton-loading').style.display = 'none';
                document.getElementById('dashboard-content').style.display = 'grid';
            }, 5000);

            const expandableLinks = document.querySelectorAll('.expandable');
            expandableLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    const toggleIcon = this.querySelector('.toggle-icon');
                    if (submenu.style.display === 'none' || submenu.style.display === '') {
                        submenu.style.display = 'block';
                        toggleIcon.classList.remove('fa-chevron-down');
                        toggleIcon.classList.add('fa-chevron-up');
                    } else {
                        submenu.style.display = 'none';
                        toggleIcon.classList.remove('fa-chevron-up');
                        toggleIcon.classList.add('fa-chevron-down');
                    }
                });
            });
        });
    </script>
</body>
</html>