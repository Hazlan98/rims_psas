<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RIMS PSAS - Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6366f1;
      --primary-dark: #4338ca;
      --primary-light: #8b5cf6;
      --accent: #06b6d4;
      --accent-pink: #ec4899;
      --text-dark: #0f172a;
      --text-light: #64748b;
      --border: #e2e8f0;
      --success: #10b981;
      --error: #ef4444;
      --surface: #ffffff;
      --glass-bg: rgba(255, 255, 255, 0.25);
      --glass-border: rgba(255, 255, 255, 0.18);
      --vh: 1vh;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      min-height: 100vh;
      min-height: calc(var(--vh, 1vh) * 100);
      display: flex;
      overflow-x: hidden;
    }

    @keyframes gradientShift {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    /* Particles - optimized for performance */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
      pointer-events: none;
    }

    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: float 8s infinite ease-in-out;
    }

    .particle:nth-child(odd) { animation-direction: reverse; }

    @keyframes float {
      0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
      10%, 90% { opacity: 1; }
      100% { transform: translateY(-100px) rotate(360deg); }
    }

    /* Generate particles with CSS */
    .particle:nth-child(1) { width: 8px; height: 8px; left: 10%; animation-delay: 0s; animation-duration: 6s; }
    .particle:nth-child(2) { width: 12px; height: 12px; left: 20%; animation-delay: 1s; animation-duration: 8s; }
    .particle:nth-child(3) { width: 6px; height: 6px; left: 30%; animation-delay: 2s; animation-duration: 7s; }
    .particle:nth-child(4) { width: 10px; height: 10px; left: 40%; animation-delay: 3s; animation-duration: 9s; }
    .particle:nth-child(5) { width: 14px; height: 14px; left: 50%; animation-delay: 4s; animation-duration: 6s; }

    .left-panel {
      width: 100%;
      max-width: 500px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-right: 1px solid var(--glass-border);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      position: relative;
      z-index: 10;
      overflow-y: auto;
    }

    .left-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
      z-index: -1;
    }

    .form-container {
      width: 100%;
      max-width: 420px;
      margin: 0 auto;
    }

    .company-logo {
      text-align: center;
      margin-bottom: 30px;
      animation: slideInDown 1s ease-out;
    }

    @keyframes slideInDown {
      from { transform: translateY(-50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .logo-container {
      position: relative;
      display: inline-block;
      margin-bottom: 15px;
    }

    .logo-icon {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, var(--primary), var(--accent), var(--accent-pink));
      background-size: 200% 200%;
      animation: gradientRotate 3s ease infinite;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 20px 40px rgba(99, 102, 241, 0.3);
      position: relative;
      overflow: hidden;
    }

    .logo-icon::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(255,255,255,0.2), transparent);
      border-radius: 20px;
    }

    @keyframes gradientRotate {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .logo-icon i {
      font-size: 30px;
      color: white;
      z-index: 2;
      position: relative;
    }

    .company-name {
      font-size: 28px;
      font-weight: 800;
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 6px;
      letter-spacing: -1px;
    }

    .company-tagline {
      font-size: 14px;
      color: var(--text-light);
      font-weight: 500;
    }

    .form-toggle {
      display: flex;
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      padding: 4px;
      margin-bottom: 30px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      animation: slideInUp 1s ease-out 0.2s both;
    }

    @keyframes slideInUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .toggle-btn {
      flex: 1;
      padding: 12px 20px;
      background: transparent;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      font-size: 13px;
      color: var(--text-light);
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      position: relative;
      overflow: hidden;
    }

    .toggle-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }

    .toggle-btn:hover::before {
      left: 100%;
    }

    .toggle-btn.active {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
      transform: translateY(-1px);
    }

    .form-wrapper {
      position: relative;
      overflow: hidden;
      animation: slideInUp 1s ease-out 0.4s both;
    }

    .form {
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
      opacity: 1;
      transform: translateX(0);
    }

    .form.hidden {
      opacity: 0;
      transform: translateX(30px);
      pointer-events: none;
      position: absolute;
      inset: 0 0 auto;
    }

    .form-title {
      font-size: 26px;
      font-weight: 700;
      background: linear-gradient(135deg, var(--text-dark), var(--primary));
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 6px;
      text-align: center;
    }

    .form-subtitle {
      color: var(--text-light);
      text-align: center;
      margin-bottom: 25px;
      font-size: 14px;
      font-weight: 500;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group:nth-child(n) {
      animation: slideInUp 1s ease-out calc(0.6s + 0.1s * var(--i, 0)) both;
    }

    .form-group label {
      display: block;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 6px;
      font-size: 13px;
    }

    .input-wrapper {
      position: relative;
      transition: transform 0.3s ease;
    }

    .form-group input {
      width: 100%;
      padding: 14px 18px 14px 45px;
      border: 2px solid var(--border);
      border-radius: 12px;
      font-size: 15px;
      background: var(--surface);
      color: var(--text-dark);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
    }

    .form-group input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15), 0 8px 20px rgba(99, 102, 241, 0.2);
      transform: translateY(-1px);
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .form-group input:focus + .input-icon {
      color: var(--primary);
      transform: translateY(-50%) scale(1.1);
    }

    /* Error message styles */
    .error-message {
      color: var(--error);
      font-size: 12px;
      margin-top: 4px;
      display: none;
      animation: slideInDown 0.3s ease;
    }

    .error-message.show {
      display: block;
    }

    /* Validation styles */
    .input-wrapper.success input {
      border-color: var(--success);
      box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
    }

    .input-wrapper.success .input-icon {
      color: var(--success);
    }

    .input-wrapper.error input {
      border-color: var(--error);
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
    }

    .input-wrapper.error .input-icon {
      color: var(--error);
    }

    .forgot-password {
      text-align: right;
      margin: -12px 0 25px;
    }

    .forgot-password a {
      color: var(--primary);
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      transition: all 0.3s ease;
      position: relative;
    }

    .forgot-password a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -2px;
      left: 0;
      background: linear-gradient(90deg, var(--primary), var(--accent-pink));
      transition: width 0.3s ease;
    }

    .forgot-password a:hover::after {
      width: 100%;
    }

    .submit-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      background-size: 200% 200%;
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: 700;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    }

    .submit-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s;
    }

    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(99, 102, 241, 0.5);
      background-position: 100% 50%;
    }

    .submit-btn:hover::before {
      left: 100%;
    }

    .submit-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none !important;
    }

    .register-form {
      max-height: 350px;
      overflow-y: auto;
      padding-right: 10px;
      margin-bottom: 20px;
    }

    .register-form::-webkit-scrollbar {
      width: 6px;
    }

    .register-form::-webkit-scrollbar-track {
      background: var(--glass-bg);
      border-radius: 8px;
    }

    .register-form::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      border-radius: 8px;
    }

    .loading {
      display: inline-block;
      width: 18px;
      height: 18px;
      border: 2px solid rgba(255, 255, 255, .3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .right-panel {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
      z-index: 5;
    }

    .hero-content {
      text-align: center;
      color: white;
      z-index: 10;
      position: relative;
      max-width: 600px;
      padding: 30px;
      animation: fadeInScale 1.2s ease-out 0.5s both;
    }

    @keyframes fadeInScale {
      from { opacity: 0; transform: scale(0.9) translateY(30px); }
      to { opacity: 1; transform: scale(1) translateY(0); }
    }

    .hero-badge {
      display: inline-block;
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border: 1px solid var(--glass-border);
      padding: 6px 16px;
      border-radius: 40px;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 25px;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    .hero-title {
      font-size: clamp(2rem, 4vw, 3.5rem);
      font-weight: 800;
      margin-bottom: 20px;
      letter-spacing: -1.5px;
      line-height: 1.1;
      background: linear-gradient(135deg, #ffffff, #f8fafc);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
      font-size: clamp(0.9rem, 2vw, 1.3rem);
      font-weight: 400;
      margin-bottom: 40px;
      opacity: 0.95;
      line-height: 1.4;
    }

    .features-showcase {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 25px;
      margin-top: 50px;
    }

    .feature-card {
      background: var(--glass-bg);
      backdrop-filter: blur(15px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 25px 20px;
      text-align: center;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .feature-card:hover::before {
      opacity: 1;
    }

    .feature-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
    }

    .feature-icon {
      width: 65px;
      height: 65px;
      background: linear-gradient(135deg, var(--accent), var(--accent-pink));
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      font-size: 26px;
      color: white;
      box-shadow: 0 12px 25px rgba(6, 182, 212, 0.3);
      position: relative;
      overflow: hidden;
    }

    .feature-icon::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(255,255,255,0.2), transparent);
    }

    .feature-title {
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 10px;
      color: white;
    }

    .feature-desc {
      font-size: 13px;
      opacity: 0.9;
      line-height: 1.4;
      color: rgba(255, 255, 255, 0.8);
    }

    .geometric-shapes {
      position: absolute;
      inset: 0;
      overflow: hidden;
      z-index: 1;
    }

    .shape {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      animation: rotate 20s linear infinite;
    }

    .shape.triangle {
      width: 0;
      height: 0;
      border-left: 40px solid transparent;
      border-right: 40px solid transparent;
      border-bottom: 80px solid rgba(255, 255, 255, 0.1);
      top: 15%;
      right: 10%;
      animation-duration: 25s;
    }

    .shape.circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      top: 60%;
      left: 15%;
      animation-duration: 30s;
      animation-direction: reverse;
    }

    .shape.square {
      width: 70px;
      height: 70px;
      top: 25%;
      left: 20%;
      transform: rotate(45deg);
      animation-duration: 35s;
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    .footer {
      position: absolute;
      bottom: 15px;
      left: 50%;
      transform: translateX(-50%);
      color: var(--text-light);
      font-size: 11px;
      text-align: center;
      z-index: 15;
      padding: 0 10px;
    }

    /* Focus management */
    .form-group:focus-within label {
      color: var(--primary);
    }

    .toggle-btn:focus,
    .submit-btn:focus,
    input:focus {
      outline: 3px solid rgba(99, 102, 241, 0.5);
      outline-offset: 2px;
    }

    /* Responsive Design - Mobile first approach */
    @media (max-width: 480px) {
      .left-panel {
        padding: 16px;
      }

      .form-container {
        max-width: 100%;
      }

      .company-name {
        font-size: 24px;
      }

      .logo-icon {
        width: 60px;
        height: 60px;
      }

      .logo-icon i {
        font-size: 26px;
      }

      .form-title {
        font-size: 22px;
      }

      .toggle-btn {
        padding: 10px 16px;
        font-size: 12px;
      }

      .form-group input {
        padding: 12px 16px 12px 40px;
        font-size: 14px;
      }

      .input-icon {
        left: 14px;
        font-size: 15px;
      }

      .submit-btn {
        padding: 14px;
        font-size: 14px;
      }

      .register-form {
        max-height: 280px;
      }
    }

    @media (max-width: 768px) {
      body { 
        flex-direction: column; 
        min-height: calc(var(--vh, 1vh) * 100);
      }
      
      .left-panel {
        width: 100% !important;
        max-width: none !important;
        height: 100vh;
        border: none;
        box-shadow: none;
      }

      .right-panel {
        display: none !important;
      }
      
      .company-logo { margin-bottom: 25px; }
      
      .features-showcase { 
        grid-template-columns: 1fr;
        gap: 15px;
        margin-top: 30px;
      }
      
      .feature-card {
        padding: 20px 15px;
        transition: transform 0.2s ease;
      }

      .feature-icon {
        width: 55px;
        height: 55px;
        font-size: 22px;
      }

      .hero-content {
        padding: 20px;
        max-width: 100%;
      }
      
      .particles { display: none; }

      .right-panel {
        min-height: calc(var(--vh, 1vh) * 50);
      }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
      .left-panel { 
        width: 360px;
        padding: 25px;
      }
      
      .features-showcase { 
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
      }
    }

    @media (min-width: 1025px) and (max-width: 1440px) {
      .left-panel { 
        width: 450px; 
        padding: 35px; 
      }
    }

    @media (min-width: 1441px) {
      .left-panel {
        width: 500px;
        padding: 40px;
      }
      
      .features-showcase {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
      }
    }

    /* Landscape mobile orientation */
    @media (max-height: 500px) and (orientation: landscape) {
      .left-panel {
        padding: 15px 20px;
      }

      .company-logo {
        margin-bottom: 15px;
      }

      .logo-icon {
        width: 50px;
        height: 50px;
      }

      .logo-icon i {
        font-size: 22px;
      }

      .company-name {
        font-size: 20px;
      }

      .form-toggle {
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      .register-form {
        max-height: 200px;
      }

      .right-panel {
        min-height: calc(var(--vh, 1vh) * 100);
      }
    }

    /* High contrast mode */
    @media (prefers-contrast: high) {
      :root {
        --primary: #0066cc;
        --border: #666666;
        --text-light: #333333;
      }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

    /* Print styles */
    @media print {
      .particles,
      .geometric-shapes,
      .right-panel {
        display: none !important;
      }

      .left-panel {
        width: 100% !important;
        box-shadow: none !important;
        background: white !important;
      }
    }
  </style>
</head>

<body>
  <!-- Animated Background Particles -->
  <div class="particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
  </div>

  <!-- Left Panel - Forms -->
  <div class="left-panel">
    <div class="form-container">
      <!-- Company Logo -->
      <div class="company-logo">
        <div class="logo-container">
          <div class="logo-icon">
            <i class="fas fa-cogs"></i>
          </div>
        </div>
        <h1 class="company-name">RIMS PSAS</h1>
        <p class="company-tagline">Public Service Automation System</p>
      </div>

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
            <div class="error-message" id="loginUsernameError"></div>
          </div>

          <div class="form-group">
            <label for="loginPassword">Password</label>
            <div class="input-wrapper">
              <input type="password" id="loginPassword" name="loginPassword" required>
              <i class="fas fa-lock input-icon"></i>
            </div>
            <div class="error-message" id="loginPasswordError"></div>
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
                <i class="fas fa-user input-icon"></i>
              </div>
              <div class="error-message" id="registerFullNameError"></div>
            </div>

            <div class="form-group">
              <label for="registerEmail">Email Address</label>
              <div class="input-wrapper">
                <input type="email" id="registerEmail" name="registerEmail" required>
                <i class="fas fa-envelope input-icon"></i>
              </div>
              <div class="error-message" id="registerEmailError"></div>
            </div>

            <div class="form-group">
              <label for="registerAddress">Address</label>
              <div class="input-wrapper">
                <input type="text" id="registerAddress" name="registerAddress" required>
                <i class="fas fa-map-marker-alt input-icon"></i>
              </div>
              <div class="error-message" id="registerAddressError"></div>
            </div>

            <div class="form-group">
              <label for="registerPhone">Contact Number</label>
              <div class="input-wrapper">
                <input type="tel" id="registerPhone" name="registerPhone" required>
                <i class="fas fa-phone input-icon"></i>
              </div>
              <div class="error-message" id="registerPhoneError"></div>
            </div>

            <div class="form-group">
              <label for="registerUsername">Username</label>
              <div class="input-wrapper">
                <input type="text" id="registerUsername" name="registerUsername" required>
                <i class="fas fa-user input-icon"></i>
              </div>
              <div class="error-message" id="registerUsernameError"></div>
            </div>

            <div class="form-group">
              <label for="registerPassword">Password</label>
              <div class="input-wrapper">
                <input type="password" id="registerPassword" name="registerPassword" required>
                <i class="fas fa-lock input-icon"></i>
              </div>
              <div class="error-message" id="registerPasswordError"></div>
            </div>

            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <div class="input-wrapper">
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <i class="fas fa-check-circle input-icon"></i>
              </div>
              <div class="error-message" id="confirmPasswordError"></div>
            </div>
          </div>

          <button type="submit" class="submit-btn" id="registerSubmit">
            Create Account
          </button>
        </form>
      </div>
    </div>

    <div class="footer">
      © 2025 RIMS Public Service Automation System. All rights reserved.
    </div>
  </div>

  <!-- Right Panel - Hero Section -->
  <div class="right-panel">
    <!-- Geometric Shapes -->
    <div class="geometric-shapes">
      <div class="shape triangle"></div>
      <div class="shape circle"></div>
      <div class="shape square"></div>
    </div>

    <div class="hero-content">
      <div class="hero-badge">✨ Next Generation Platform</div>
      
      <h1 class="hero-title">RIMS PSAS</h1>
      <p class="hero-subtitle">Revolutionizing Public Services Through Smart Automation</p>

      <div class="features-showcase">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3 class="feature-title">Advanced Security</h3>
          <p class="feature-desc">Military-grade encryption with multi-layer authentication protocols</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-rocket"></i>
          </div>
          <h3 class="feature-title">Lightning Performance</h3>
          <p class="feature-desc">Ultra-fast processing with 99.99% uptime guarantee</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-brain"></i>
          </div>
          <h3 class="feature-title">AI-Powered Insights</h3>
          <p class="feature-desc">Smart analytics and predictive intelligence for better decisions</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-globe-asia"></i>
          </div>
          <h3 class="feature-title">Global Accessibility</h3>
          <p class="feature-desc">Seamless access from anywhere with multi-language support</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Enhanced Error Handling System
    class FormValidator {
      constructor() {
        this.errors = new Map();
        this.isSubmitting = false;
      }

      // Validation rules
      validateRequired(value, fieldName) {
        if (!value || value.trim() === '') {
          return `${fieldName} is required`;
        }
        return null;
      }

      validateEmail(value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
          return 'Please enter a valid email address';
        }
        return null;
      }

      validatePhone(value) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
          return 'Please enter a valid phone number';
        }
        return null;
      }

      validatePassword(value) {
        if (value.length < 6) {
          return 'Password must be at least 6 characters long';
        }
        return null;
      }

      validatePasswordMatch(password, confirmPassword) {
        if (password !== confirmPassword) {
          return 'Passwords do not match';
        }
        return null;
      }

      validateUsername(value) {
        if (value.length < 3) {
          return 'Username must be at least 3 characters long';
        }
        if (!/^[a-zA-Z0-9_]+$/.test(value)) {
          return 'Username can only contain letters, numbers, and underscores';
        }
        return null;
      }

      // Show error message
      showError(fieldId, message) {
        const errorElement = document.getElementById(`${fieldId}Error`);
        const inputWrapper = document.querySelector(`#${fieldId}`).parentElement;
        
        if (errorElement && message) {
          errorElement.textContent = message;
          errorElement.classList.add('show');
          inputWrapper.classList.add('error');
          inputWrapper.classList.remove('success');
          this.errors.set(fieldId, message);
        }
      }

      // Clear error message
      clearError(fieldId) {
        const errorElement = document.getElementById(`${fieldId}Error`);
        const inputWrapper = document.querySelector(`#${fieldId}`).parentElement;
        
        if (errorElement) {
          errorElement.classList.remove('show');
          inputWrapper.classList.remove('error');
          inputWrapper.classList.add('success');
          this.errors.delete(fieldId);
        }
      }

      // Validate single field
      validateField(fieldId, value) {
        let error = null;

        switch (fieldId) {
          case 'loginUsername':
            error = this.validateRequired(value, 'Username');
            break;
          case 'loginPassword':
            error = this.validateRequired(value, 'Password');
            break;
          case 'registerFullName':
            error = this.validateRequired(value, 'Full Name');
            break;
          case 'registerEmail':
            error = this.validateRequired(value, 'Email') || this.validateEmail(value);
            break;
          case 'registerAddress':
            error = this.validateRequired(value, 'Address');
            break;
          case 'registerPhone':
            error = this.validateRequired(value, 'Phone') || this.validatePhone(value);
            break;
          case 'registerUsername':
            error = this.validateRequired(value, 'Username') || this.validateUsername(value);
            break;
          case 'registerPassword':
            error = this.validateRequired(value, 'Password') || this.validatePassword(value);
            break;
          case 'confirmPassword':
            const registerPassword = document.getElementById('registerPassword').value;
            error = this.validateRequired(value, 'Confirm Password') || 
                   this.validatePasswordMatch(registerPassword, value);
            break;
        }

        if (error) {
          this.showError(fieldId, error);
          return false;
        } else {
          this.clearError(fieldId);
          return true;
        }
      }

      // Validate entire form
      validateForm(formId) {
        const form = document.getElementById(formId);
        const inputs = form.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(input => {
          if (!this.validateField(input.id, input.value)) {
            isValid = false;
          }
        });

        return isValid;
      }
    }

    // Initialize form validator
    const validator = new FormValidator();

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
      // Clear any existing errors when switching
      clearAllErrors();
    }

    function switchToRegister() {
      registerToggle.classList.add('active');
      loginToggle.classList.remove('active');
      registerForm.classList.remove('hidden');
      loginForm.classList.add('hidden');
      // Clear any existing errors when switching
      clearAllErrors();
    }

    function clearAllErrors() {
      document.querySelectorAll('.error-message').forEach(el => el.classList.remove('show'));
      document.querySelectorAll('.input-wrapper').forEach(el => {
        el.classList.remove('error', 'success');
      });
      validator.errors.clear();
    }

    loginToggle.addEventListener('click', switchToLogin);
    registerToggle.addEventListener('click', switchToRegister);

    // Real-time validation for all inputs
    document.querySelectorAll('input').forEach(input => {
      // Validate on blur (when user leaves the field)
      input.addEventListener('blur', function() {
        if (this.value.trim() !== '') {
          validator.validateField(this.id, this.value);
        }
      });

      // Clear errors on input (when user starts typing)
      input.addEventListener('input', function() {
        const wrapper = this.parentElement;
        if (wrapper.classList.contains('error')) {
          // Re-validate if there was an error
          validator.validateField(this.id, this.value);
        }
      });

      // Enhanced focus effects
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px) scale(1.02)';
        this.parentElement.style.boxShadow = '0 8px 20px rgba(99, 102, 241, 0.15)';
      });

      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0) scale(1)';
        this.parentElement.style.boxShadow = 'none';
      });
    });

    // Forgot password functionality
    document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Forgot Password?',
        text: 'Please contact your system administrator to reset your password.',
        icon: 'info',
        confirmButtonText: 'OK',
        confirmButtonColor: '#6366f1',
        background: 'rgba(255, 255, 255, 0.95)',
        backdrop: 'rgba(0, 0, 0, 0.4)'
      });
    });

    // Responsive behavior adjustments
    function handleResize() {
      const isMobile = window.innerWidth <= 768;
      const particles = document.querySelectorAll('.particle');
      
      // Hide particles on mobile for better performance
      particles.forEach(particle => {
        particle.style.display = isMobile ? 'none' : 'block';
      });
      
      // Adjust animations based on screen size
      const shapes = document.querySelectorAll('.shape');
      shapes.forEach(shape => {
        if (isMobile) {
          shape.style.animationDuration = '40s';
        } else {
          shape.style.animationDuration = shape.classList.contains('triangle') ? '25s' : 
                                         shape.classList.contains('circle') ? '30s' : '35s';
        }
      });
    }

    // Viewport height fix for mobile browsers
    function setViewportHeight() {
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    }

    // Feature card interactions with enhanced effects
    document.querySelectorAll('.feature-card').forEach((card, index) => {
      card.addEventListener('mouseenter', function() {
        if (window.innerWidth > 768) {
          this.style.transform = 'translateY(-12px) scale(1.05)';
          this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.3)';
        }
      });
      
      card.addEventListener('mouseleave', function() {
        if (window.innerWidth > 768) {
          this.style.transform = 'translateY(0) scale(1)';
          this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.1)';
        }
      });

      // Add click effect for mobile
      card.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          this.style.transform = 'translateY(-8px) scale(1.02)';
          setTimeout(() => {
            this.style.transform = 'translateY(0) scale(1)';
          }, 200);
        }
      });
    });

    // Enhanced keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      if (e.ctrlKey && e.key === 'Enter') {
        const activeForm = document.querySelector('.form:not(.hidden)');
        if (activeForm && !validator.isSubmitting) {
          activeForm.querySelector('button[type="submit"]').click();
        }
      }
      
      // Tab between forms with Alt+Tab
      if (e.altKey && e.key === 'Tab') {
        e.preventDefault();
        if (loginForm.classList.contains('hidden')) {
          switchToLogin();
        } else {
          switchToRegister();
        }
      }

      // Escape key to clear focus and errors
      if (e.key === 'Escape') {
        const activeInput = document.activeElement;
        if (activeInput && activeInput.tagName === 'INPUT') {
          activeInput.blur();
        }
      }
    });

    // Network status handling
    function handleNetworkStatus() {
      window.addEventListener('online', function() {
        Swal.fire({
          icon: 'success',
          title: 'Connection Restored',
          text: 'You are now back online!',
          timer: 2000,
          showConfirmButton: false,
          position: 'top-end',
          toast: true,
          background: 'rgba(16, 185, 129, 0.95)',
          color: 'white'
        });
      });

      window.addEventListener('offline', function() {
        Swal.fire({
          icon: 'warning',
          title: 'No Internet Connection',
          text: 'Please check your internet connection.',
          position: 'top-end',
          toast: true,
          background: 'rgba(245, 158, 11, 0.95)',
          color: 'white',
          showConfirmButton: false,
          timer: 3000
        });
      });
    }

    // Touch support for mobile devices
    if ('ontouchstart' in window) {
      document.querySelectorAll('.feature-card').forEach(card => {
        card.addEventListener('touchstart', function() {
          this.style.transform = 'translateY(-4px) scale(1.02)';
        });
        
        card.addEventListener('touchend', function() {
          setTimeout(() => {
            this.style.transform = 'translateY(0) scale(1)';
          }, 150);
        });
      });
    }

    // Prevent zoom on iOS double tap
    let lastTouchEnd = 0;
    document.addEventListener('touchend', function (event) {
      const now = (new Date()).getTime();
      if (now - lastTouchEnd <= 300) {
        event.preventDefault();
      }
      lastTouchEnd = now;
    }, false);

    // Initialize everything
    handleResize();
    setViewportHeight();
    handleNetworkStatus();
    
    // Event listeners
    window.addEventListener('resize', () => {
      handleResize();
      setViewportHeight();
    });
    window.addEventListener('orientationchange', setViewportHeight);

    console.log('RIMS PSAS - Enhanced responsive login system with error handling initialized successfully');
  </script>

  <!-- Add this script at the very end of your body tag, after the existing scripts -->
<script>
  // Handle CodeIgniter flashdata messages
  document.addEventListener('DOMContentLoaded', function() {
    <?php if (session()->getFlashdata('swal_success')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= session()->getFlashdata('swal_success') ?>',
        timer: 3000,
        showConfirmButton: false,
        position: 'center',
        background: 'rgba(255, 255, 255, 0.95)',
        backdrop: 'rgba(0, 0, 0, 0.4)'
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('swal_error')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '<?= session()->getFlashdata('swal_error') ?>',
        confirmButtonColor: '#6366f1',
        background: 'rgba(255, 255, 255, 0.95)',
        backdrop: 'rgba(0, 0, 0, 0.4)'
      });
    <?php endif; ?>
  });
</script>
</body>
</html>