<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Exam Results Management</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #4f46e5;
      --primary-dark: #4338ca;
      --primary-light: #818cf8;
      --sidebar-bg: #1e1b4b;
      --sidebar-hover: #312e81;
      --text-light: #f8fafc;
      --text-dark: #1e293b;
      --card-bg: #ffffff;
      --body-bg: #f1f5f9;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --info: #3b82f6;
      --border-radius: 8px;
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --transition: all 0.2s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--body-bg);
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      background-image: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(30, 27, 75, 0.2) 100%);
    }

    .login-container {
      width: 100%;
      max-width: 420px;
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: var(--shadow);
      overflow: hidden;
      position: relative;
    }

    .login-header {
      background-color: var(--sidebar-bg);
      color: var(--text-light);
      padding: 2rem;
      text-align: center;
      position: relative;
    }

    .login-header h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-top: 0.5rem;
    }

    .login-header .logo {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }

    .login-form {
      padding: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--text-dark);
    }

    .form-group input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #e2e8f0;
      border-radius: var(--border-radius);
      font-size: 1rem;
      transition: var(--transition);
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }

    .form-group .input-with-icon {
      position: relative;
    }

    .form-group .input-with-icon input {
      padding-left: 2.5rem;
    }

    .form-group .input-with-icon i {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
    }

    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .form-check input {
      margin-right: 0.5rem;
      width: 1rem;
      height: 1rem;
    }

    .form-check label {
      font-size: 0.875rem;
      color: #64748b;
    }

    .login-btn {
      width: 100%;
      padding: 0.75rem;
      background-color: var(--primary);
      color: white;
      border: none;
      border-radius: var(--border-radius);
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
    }

    .login-btn:hover {
      background-color: var(--primary-dark);
    }

    .login-footer {
      text-align: center;
      padding: 1rem 2rem 2rem;
    }

    .login-footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      transition: var(--transition);
    }

    .login-footer a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    .forgot-password {
      text-align: right;
      margin-bottom: 1.5rem;
    }

    .forgot-password a {
      font-size: 0.875rem;
      color: var(--primary);
      text-decoration: none;
      transition: var(--transition);
    }

    .forgot-password a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    /* ================== ALERT STYLES ================== */
    .alert {
      position: fixed;
      top: 1.5rem;
      right: 1.5rem;
      padding: 1rem 1.5rem;
      border-radius: var(--border-radius);
      background-color: white;
      color: var(--text-dark);
      box-shadow: var(--shadow);
      display: flex;
      align-items: center;
      gap: 0.75rem;
      z-index: 1000;
      max-width: 400px;
      border-left: 4px solid;
      opacity: 0;
      transform: translateX(calc(100% + 1.5rem));
      transition: all 0.3s ease;
    }

    .alert.show {
      opacity: 1;
      transform: translateX(0);
    }

    /* Alert Types */
    .alert-success {
      border-left-color: var(--success);
    }

    .alert-danger {
      border-left-color: var(--danger);
    }

    .alert-warning {
      border-left-color: var(--warning);
    }

    .alert-info {
      border-left-color: var(--info);
    }

    /* Alert Icons */
    .alert i {
      font-size: 1.25rem;
    }

    .alert-success i {
      color: var(--success);
    }

    .alert-danger i {
      color: var(--danger);
    }

    .alert-warning i {
      color: var(--warning);
    }

    .alert-info i {
      color: var(--info);
    }

    .alert-content {
      flex: 1;
    }

    .alert-title {
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .alert-message {
      font-size: 0.875rem;
      color: #64748b;
    }

    .alert-close {
      background: none;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      font-size: 1rem;
      padding: 0.25rem;
      transition: var(--transition);
    }

    .alert-close:hover {
      color: var(--text-dark);
    }

    /* Alert Progress Bar */
    .alert-progress {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      width: 100%;
      transform-origin: left;
      background-color: currentColor;
      opacity: 0.2;
    }

    /* Responsive */
    @media (max-width: 640px) {
      .login-container {
        max-width: 100%;
      }

      .alert {
        max-width: 90%;
        right: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Alerts Container -->
  <div id="alerts-container">
    <?php if (session('error')) : ?>
      <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <div class="alert-content">
          <div class="alert-title">Error</div>
          <div class="alert-message"><?= session('error') ?></div>
        </div>
        <button class="alert-close">
          <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
      </div>
    <?php endif; ?>

    <?php if (session('errors')) : ?>
      <?php foreach (session('errors') as $error) : ?>
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-circle"></i>
          <div class="alert-content">
            <div class="alert-title">Validation Error</div>
            <div class="alert-message"><?= $error ?></div>
          </div>
          <button class="alert-close">
            <i class="fas fa-times"></i>
          </button>
          <div class="alert-progress"></div>
        </div>
      <?php endforeach ?>
    <?php endif; ?>

    <?php if (session('message')) : ?>
      <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <div class="alert-content">
          <div class="alert-title">Success</div>
          <div class="alert-message"><?= session('message') ?></div>
        </div>
        <button class="alert-close">
          <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
      </div>
    <?php endif; ?>
  </div>

  <div class="login-container">
    <div class="login-header">
      <div class="logo">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <h1>Exam Results Management</h1>
    </div>

    <form class="login-form" action="<?= base_url('login') ?>" method="post">
      <?= csrf_field() ?>

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-with-icon">
          <i class="fas fa-envelope"></i>
          <input type="email" id="email" name="email" 
                 value="<?= old('email') ?>"
                 class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                 placeholder="Enter your email" required>
        </div>
        <?php if (session('errors.email')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.email') ?>
          </div>
        <?php endif ?>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-with-icon">
          <i class="fas fa-lock"></i>
          <input type="password" id="password" name="password" 
                 class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                 placeholder="Enter your password" required>
        </div>
        <?php if (session('errors.password')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        <?php endif ?>
      </div>

      <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
      <div class="form-check">
        <input type="checkbox" id="remember" name="remember" class="form-check-input" 
               <?php if (old('remember')): ?> checked<?php endif ?>>
        <label for="remember">Remember me</label>
      </div>
      <?php endif; ?>

      <div class="forgot-password">
        <?php if (setting('Auth.allowForgotPassword')) : ?>
          <a href="<?= url_to('forgot') ?>">Forgot password?</a>
        <?php endif; ?>
      </div>

      <button type="submit" class="login-btn">
        <i class="fas fa-sign-in-alt"></i> Login
      </button>
    </form>

    <div class="login-footer">
      <?php if (setting('Auth.allowRegistration')) : ?>
        <p>Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></p>
      <?php endif; ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Show all alerts
      const alerts = document.querySelectorAll('.alert');
      
      alerts.forEach(alert => {
        // Show alert
        setTimeout(() => {
          alert.classList.add('show');
        }, 100);

        // Auto-hide after 5 seconds
        const autoHide = setTimeout(() => {
          alert.classList.remove('show');
          setTimeout(() => alert.remove(), 300);
        }, 5000);

        // Close button functionality
        const closeBtn = alert.querySelector('.alert-close');
        if (closeBtn) {
          closeBtn.addEventListener('click', () => {
            clearTimeout(autoHide);
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 300);
          });
        }
      });

      // Form animations
      const formGroups = document.querySelectorAll('.form-group');
      formGroups.forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateY(20px)';
        group.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        group.style.transitionDelay = `${index * 0.1}s`;
        
        setTimeout(() => {
          group.style.opacity = '1';
          group.style.transform = 'translateY(0)';
        }, 100);
      });
    });
  </script>
</body>
</html>