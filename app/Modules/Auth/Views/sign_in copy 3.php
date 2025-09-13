<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIMS PSAS - Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #2563eb;
      --primary-dark: #1d4ed8;
      --secondary-color: #f8fafc;
      --accent-color: #06b6d4;
      --text-dark: #1e293b;
      --text-light: #64748b;
      --border-color: #e2e8f0;
      --success-color: #10b981;
      --error-color: #ef4444;
      --warning-color: #f59e0b;
      --surface: #ffffff;
      --surface-hover: #f1f5f9;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
      --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='m36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
      opacity: 0.1;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      background: var(--surface);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: var(--shadow-xl);
      position: relative;
      min-height: 700px;
    }

    .brand-section {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .brand-section::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: repeating-linear-gradient(45deg,
          transparent,
          transparent 10px,
          rgba(255, 255, 255, 0.03) 10px,
          rgba(255, 255, 255, 0.03) 20px);
      animation: slide 20s linear infinite;
    }

    @keyframes slide {
      0% {
        transform: translateX(-50px);
      }

      100% {
        transform: translateX(0px);
      }
    }

    .brand-content {
      position: relative;
      z-index: 2;
    }

    .logo {
      font-size: 48px;
      font-weight: 800;
      margin-bottom: 16px;
      letter-spacing: -1px;
    }

    .logo i {
      font-size: 52px;
      margin-bottom: 20px;
      display: block;
      opacity: 0.9;
    }

    .subtitle {
      font-size: 18px;
      opacity: 0.9;
      margin-bottom: 40px;
      line-height: 1.6;
    }

    .features {
      list-style: none;
      text-align: left;
    }

    .features li {
      display: flex;
      align-items: center;
      margin-bottom: 16px;
      font-size: 14px;
      opacity: 0.8;
    }

    .features i {
      margin-right: 12px;
      font-size: 16px;
      color: var(--accent-color);
    }

    .form-section {
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
    }

    .form-container {
      width: 100%;
      max-width: 400px;
      margin: 0 auto;
    }

    .form-toggle {
      display: flex;
      background: var(--secondary-color);
      border-radius: 12px;
      padding: 4px;
      margin-bottom: 40px;
      border: 1px solid var(--border-color);
    }

    .toggle-btn {
      flex: 1;
      padding: 12px 24px;
      background: transparent;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 14px;
      color: var(--text-light);
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .toggle-btn.active {
      background: var(--surface);
      color: var(--primary-color);
      box-shadow: var(--shadow-sm);
    }

    .form-wrapper {
      position: relative;
      overflow: hidden;
    }

    .form {
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      opacity: 1;
      transform: translateX(0);
    }

    .form.hidden {
      opacity: 0;
      transform: translateX(20px);
      pointer-events: none;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
    }

    .form-title {
      font-size: 28px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 8px;
      text-align: center;
    }

    .form-subtitle {
      color: var(--text-light);
      text-align: center;
      margin-bottom: 32px;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 24px;
      position: relative;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 8px;
      font-size: 14px;
    }

    .input-wrapper {
      position: relative;
    }

    .form-group input {
      width: 100%;
      padding: 14px 16px 14px 44px;
      border: 2px solid var(--border-color);
      border-radius: 12px;
      font-size: 16px;
      background: var(--surface);
      color: var(--text-dark);
      transition: all 0.3s ease;
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 16px;
      transition: color 0.3s ease;
    }

    .form-group input:focus+.input-icon {
      color: var(--primary-color);
    }

    .forgot-password {
      text-align: right;
      margin-top: -16px;
      margin-bottom: 24px;
    }

    .forgot-password a {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .forgot-password a:hover {
      color: var(--primary-dark);
    }

    .submit-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      position: relative;
      overflow: hidden;
    }

    .submit-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .submit-btn:hover::before {
      left: 100%;
    }

    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .register-form {
      max-height: 500px;
      overflow-y: auto;
      padding-right: 8px;
      margin-bottom: 24px;
    }

    .register-form::-webkit-scrollbar {
      width: 6px;
    }

    .register-form::-webkit-scrollbar-track {
      background: var(--secondary-color);
      border-radius: 3px;
    }

    .register-form::-webkit-scrollbar-thumb {
      background: var(--border-color);
      border-radius: 3px;
    }

    .register-form::-webkit-scrollbar-thumb:hover {
      background: var(--text-light);
    }

    .footer {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      color: var(--text-light);
      font-size: 12px;
      text-align: center;
    }

    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255, 255, 255, .3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
        max-width: 400px;
        margin: 20px;
      }

      .brand-section {
        padding: 40px 20px;
        min-height: auto;
      }

      .form-section {
        padding: 40px 20px;
      }

      .logo {
        font-size: 36px;
      }

      .subtitle {
        font-size: 16px;
      }
    }

    /* Animation for form switching */
    .slide-enter {
      opacity: 0;
      transform: translateX(30px);
    }

    .slide-enter-active {
      opacity: 1;
      transform: translateX(0);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .slide-exit {
      opacity: 1;
      transform: translateX(0);
    }

    .slide-exit-active {
      opacity: 0;
      transform: translateX(-30px);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Brand Section -->
    <div class="brand-section">
      <div class="brand-content">
        <i class="fas fa-cogs"></i>
        <h1 class="logo">RIMS PSAS</h1>
        <p class="subtitle">Public Service Automation System</p>

        <ul class="features">
          <li><i class="fas fa-shield-alt"></i> Enterprise-grade security</li>
          <li><i class="fas fa-lightning-bolt"></i> Lightning-fast performance</li>
          <li><i class="fas fa-users"></i> Multi-user collaboration</li>
          <li><i class="fas fa-chart-line"></i> Advanced analytics</li>
        </ul>
      </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
      <div class="form-container">
        <!-- Form Toggle -->
        <div class="form-toggle">
          <button type="button" class="toggle-btn active" id="loginToggle">Sign In</button>
          <button type="button" class="toggle-btn" id="registerToggle">Sign Up</button>
        </div>

        <div class="form-wrapper">
          <!-- Login Form -->
          <form action="<?= base_url('auth/attempt_login') ?>" method="POST" class="form" id="loginForm">
            <?= csrf_field() ?>

            <h2 class="form-title">Welcome Back</h2>
            <p class="form-subtitle">Please sign in to your account</p>

            <div class="form-group">
              <label for="loginUsername">Username</label>
              <div class="input-wrapper">
                <input type="text" id="loginUsername" name="loginUsername" required>
                <i class="fas fa-user input-icon"></i>
              </div>
            </div>

            <div class="form-group">
              <label for="loginPassword">Password</label>
              <div class="input-wrapper">
                <input type="password" id="loginPassword" name="loginPassword" required>
                <i class="fas fa-lock input-icon"></i>
              </div>
            </div>

            <div class="forgot-password">
              <a href="#" id="forgotPasswordLink">Forgot password?</a>
            </div>

            <button type="submit" class="submit-btn" id="loginSubmit">
              Sign In
            </button>
          </form>

          <!-- Register Form -->
          <form action="<?= base_url('auth/attempt_register') ?>" method="POST" class="form hidden" id="registerForm">
            <?= csrf_field() ?>

            <h2 class="form-title">Create Account</h2>
            <p class="form-subtitle">Join our platform today</p>

            <div class="register-form">
              <div class="form-group">
                <label for="registerFullName">Full Name</label>
                <div class="input-wrapper">
                  <input type="text" id="registerFullName" name="registerFullName" required>
                  <i class="fas fa-user-circle input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="registerEmail">Email Address</label>
                <div class="input-wrapper">
                  <input type="email" id="registerEmail" name="registerEmail" required>
                  <i class="fas fa-envelope input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="registerAddress">Address</label>
                <div class="input-wrapper">
                  <input type="text" id="registerAddress" name="registerAddress" required>
                  <i class="fas fa-map-marker-alt input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="registerPhone">Contact Number</label>
                <div class="input-wrapper">
                  <input type="tel" id="registerPhone" name="registerPhone" required>
                  <i class="fas fa-phone input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="registerUsername">Username</label>
                <div class="input-wrapper">
                  <input type="text" id="registerUsername" name="registerUsername" required>
                  <i class="fas fa-user input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="registerPassword">Password</label>
                <div class="input-wrapper">
                  <input type="password" id="registerPassword" name="registerPassword" required>
                  <i class="fas fa-lock input-icon"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <div class="input-wrapper">
                  <input type="password" id="confirmPassword" name="confirmPassword" required>
                  <i class="fas fa-check-circle input-icon"></i>
                </div>
              </div>
            </div>

            <button type="submit" class="submit-btn" id="registerSubmit">
              Create Account
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    © 2025 RIMS Public Service Automation System. All rights reserved.
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Form Toggle Functionality
    const loginToggle = document.getElementById('loginToggle');
    const registerToggle = document.getElementById('registerToggle');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    function switchToLogin() {
      loginToggle.classList.add('active');
      registerToggle.classList.remove('active');
      loginForm.classList.remove('hidden');
      registerForm.classList.add('hidden');
    }

    function switchToRegister() {
      registerToggle.classList.add('active');
      loginToggle.classList.remove('active');
      registerForm.classList.remove('hidden');
      loginForm.classList.add('hidden');
    }

    loginToggle.addEventListener('click', switchToLogin);
    registerToggle.addEventListener('click', switchToRegister);

    // Password confirmation validation
    const registerPassword = document.getElementById('registerPassword');
    const confirmPassword = document.getElementById('confirmPassword');

    function validatePasswordMatch() {
      if (registerPassword.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords don't match");
      } else {
        confirmPassword.setCustomValidity('');
      }
    }

    registerPassword.addEventListener('input', validatePasswordMatch);
    confirmPassword.addEventListener('input', validatePasswordMatch);

    // Form submission with loading state
    function addLoadingState(button, form) {
      form.addEventListener('submit', function() {
        button.innerHTML = '<div class="loading"></div>Processing...';
        button.disabled = true;
      });
    }

    addLoadingState(document.getElementById('loginSubmit'), document.getElementById('loginForm'));
    addLoadingState(document.getElementById('registerSubmit'), document.getElementById('registerForm'));

    // Forgot password functionality
    document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Forgot Password?',
        text: 'Please contact your system administrator to reset your password.',
        icon: 'info',
        confirmButtonText: 'OK',
        confirmButtonColor: '#2563eb'
      });
    });

    // Input focus effects
    document.querySelectorAll('input').forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px)';
      });

      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
      });
    });

    // SweetAlert2 notifications (CodeIgniter integration)
    <?php if (session()->getFlashdata('swal_success')) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= session()->getFlashdata('swal_success'); ?>',
        timer: 3000,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('swal_error')) : ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('swal_error'); ?>',
        timer: 4000,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
      });
    <?php endif; ?>

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      if (e.ctrlKey && e.key === 'Enter') {
        const activeForm = document.querySelector('.form:not(.hidden)');
        if (activeForm) {
          activeForm.querySelector('button[type="submit"]').click();
        }
      }
    });

    // Auto-resize textarea effect for address field
    const addressField = document.getElementById('registerAddress');
    if (addressField) {
      addressField.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
      });
    }
  </script>
</body>

</html>