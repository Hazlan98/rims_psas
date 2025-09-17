<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>RIMS PSAS - Conference Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>

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
      --warning: #f59e0b;
      --surface: #ffffff;
      --glass-bg: rgba(255, 255, 255, 0.25);
      --glass-border: rgba(255, 255, 255, 0.18);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: radial-gradient(circle, rgba(255, 255, 255, 1) 0%, rgba(148, 187, 233, 1) 100%);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      min-height: 100vh;
      color: var(--text-dark);
      overflow-x: hidden;
    }

    @keyframes gradientShift {

      0%,
      100% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }
    }

    /* Particles background */
    .particles {
      position: fixed;
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

    .particle:nth-child(odd) {
      animation-direction: reverse;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }

      10%,
      90% {
        opacity: 1;
      }

      100% {
        transform: translateY(-100px) rotate(360deg);
      }
    }

    .particle:nth-child(1) {
      width: 8px;
      height: 8px;
      left: 10%;
      animation-delay: 0s;
      animation-duration: 6s;
    }

    .particle:nth-child(2) {
      width: 12px;
      height: 12px;
      left: 20%;
      animation-delay: 1s;
      animation-duration: 8s;
    }

    .particle:nth-child(3) {
      width: 6px;
      height: 6px;
      left: 30%;
      animation-delay: 2s;
      animation-duration: 7s;
    }

    .particle:nth-child(4) {
      width: 10px;
      height: 10px;
      left: 40%;
      animation-delay: 3s;
      animation-duration: 9s;
    }

    .particle:nth-child(5) {
      width: 14px;
      height: 14px;
      left: 50%;
      animation-delay: 4s;
      animation-duration: 6s;
    }

    .particle:nth-child(6) {
      width: 10px;
      height: 10px;
      left: 60%;
      animation-delay: 2.5s;
      animation-duration: 7s;
    }

    .particle:nth-child(7) {
      width: 8px;
      height: 8px;
      left: 70%;
      animation-delay: 4s;
      animation-duration: 9s;
    }

    .particle:nth-child(8) {
      width: 6px;
      height: 6px;
      left: 80%;
      animation-delay: 1.5s;
      animation-duration: 6s;
    }

    .particle:nth-child(9) {
      width: 12px;
      height: 12px;
      left: 90%;
      animation-delay: 3.5s;
      animation-duration: 8s;
    }

    /* Navbar Styling */
    .navbar {
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--glass-border);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      padding: 1rem 0;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.5rem;
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      display: flex;
      align-items: center;
    }

    .navbar-brand i {
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-right: 0.5rem;
    }

    .nav-link {
      font-weight: 600;
      color: var(--text-dark);
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      position: relative;
      transition: all 0.3s ease;
      border-radius: 12px;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary);
      background: rgba(99, 102, 241, 0.1);
      backdrop-filter: blur(10px);
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      bottom: 5px;
      left: 50%;
      transform: translateX(-50%);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 80%;
    }

    /* Hero Section */
    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('/assets/AdminLte/dist/assets/img/poli_bg.jpeg') center/cover;
      height: 100vh;
      display: flex;
      align-items: center;
      color: white;
      text-align: center;
    }

    .hero-content {
      max-width: 800px;
      margin: 0 auto;
    }

    .hero-section h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }


    /* Button Styling */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 24px;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      border: none;
      text-decoration: none;
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
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .btn:hover::before {
      left: 100%;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
      padding: 1rem 2rem;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
      color: white;
    }

    /* Section Styling */
    .section-spacing {
      padding: 6rem 0;
      position: relative;
      z-index: 10;
    }

    .section-heading {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-heading .badge {
      background: rgba(99, 102, 241, 0.1);
      color: var(--primary);
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      margin-bottom: 1.5rem;
      font-size: 0.9rem;
      border-radius: 25px;
      border: 1px solid rgba(99, 102, 241, 0.2);
      backdrop-filter: blur(10px);
    }

    .section-heading h2 {
      font-weight: 800;
      font-size: 2.8rem;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, var(--text-dark), var(--primary));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .section-heading p {
      max-width: 700px;
      margin: 0 auto;
      color: var(--text-light);
      font-size: 1.2rem;
      line-height: 1.6;
    }

    /* Feature Cards */
    .feature-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      text-align: center;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      height: 100%;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .feature-card:hover::before {
      left: 100%;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    .feature-card .icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: var(--primary);
      margin: 0 auto 1.5rem;
      border: 2px solid rgba(99, 102, 241, 0.2);
    }

    .feature-card h4 {
      font-weight: 700;
      margin-bottom: 1rem;
      font-size: 1.4rem;
      color: var(--text-dark);
    }

    .feature-card p {
      color: var(--text-light);
      line-height: 1.6;
    }

    /* Registration Cards */
    .registration-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      height: 100%;
    }

    .registration-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
      z-index: -1;
    }

    .registration-card.participant::before {
      background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(6, 182, 212, 0.05));
    }

    .registration-card.judge::before {
      background: linear-gradient(45deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.05));
    }

    .registration-card.reviewer::before {
      background: linear-gradient(45deg, rgba(6, 182, 212, 0.05), rgba(16, 185, 129, 0.05));
    }

    .registration-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    .registration-card .badge {
      padding: 0.5rem 1.2rem;
      border-radius: 25px;
      margin-bottom: 1.5rem;
      font-weight: 600;
      font-size: 0.85rem;
      border: 1px solid;
    }

    .registration-card.participant .badge {
      background: rgba(99, 102, 241, 0.1);
      color: var(--primary);
      border-color: rgba(99, 102, 241, 0.2);
    }

    .registration-card.judge .badge {
      background: rgba(139, 92, 246, 0.1);
      color: var(--primary-light);
      border-color: rgba(139, 92, 246, 0.2);
    }

    .registration-card.reviewer .badge {
      background: rgba(6, 182, 212, 0.1);
      color: var(--accent);
      border-color: rgba(6, 182, 212, 0.2);
    }

    .registration-card h4 {
      font-weight: 700;
      margin-bottom: 1rem;
      font-size: 1.5rem;
      color: var(--text-dark);
    }

    .registration-card p {
      color: var(--text-light);
      line-height: 1.6;
      margin-bottom: 2rem;
    }

    /* Button variations */
    .btn-outline-primary {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      color: var(--primary);
      border: 2px solid var(--primary);
      box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
    }

    .btn-outline-primary:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    }

    .btn-outline-secondary {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      color: var(--primary-light);
      border: 2px solid var(--primary-light);
      box-shadow: 0 4px 15px rgba(139, 92, 246, 0.2);
    }

    .btn-outline-secondary:hover {
      background: var(--primary-light);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
    }

    .btn-outline-accent {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      color: var(--accent);
      border: 2px solid var(--accent);
      box-shadow: 0 4px 15px rgba(6, 182, 212, 0.2);
    }

    .btn-outline-accent:hover {
      background: var(--accent);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
    }

    /* Accordion Styling */
    .accordion-item {
      border: none;
      margin-bottom: 1rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 16px !important;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .accordion-button {
      font-weight: 600;
      padding: 1.5rem 2rem;
      background: rgba(255, 255, 255, 0.9);
      color: var(--text-dark);
      border: none;
      border-radius: 16px;
    }

    .accordion-button:not(.collapsed) {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      box-shadow: none;
    }

    .accordion-button:focus {
      box-shadow: none;
      border: none;
    }

    .accordion-body {
      padding: 2rem;
      background: rgba(255, 255, 255, 0.9);
      color: var(--text-light);
      line-height: 1.6;
    }

    /* Testimonial Cards */
    .testimonial-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      position: relative;
      transition: all 0.4s ease;
      margin: 1rem 0;
      overflow: hidden;
    }

    .testimonial-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .testimonial-card:hover::before {
      left: 100%;
    }

    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .testimonial-card p {
      font-style: italic;
      line-height: 1.7;
      color: var(--text-light);
      margin-bottom: 2rem;
      font-size: 1.1rem;
    }

    .testimonial-card::after {
      content: '"';
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 4rem;
      color: var(--primary);
      opacity: 0.1;
      font-family: Georgia, serif;
    }

    .testimonial-person {
      display: flex;
      align-items: center;
    }

    .testimonial-person img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 1rem;
      object-fit: cover;
      border: 3px solid rgba(99, 102, 241, 0.2);
    }

    .testimonial-person .info h5 {
      font-weight: 700;
      margin-bottom: 0.2rem;
      color: var(--text-dark);
    }

    .testimonial-person .info p {
      margin: 0;
      color: var(--text-light);
      font-style: normal;
    }

    /* Contact Section */
    .contact-form {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
    }

    .contact-info-box {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      height: 100%;
    }

    .form-control {
      padding: 1rem 1.5rem;
      border-radius: 12px;
      border: 2px solid var(--glass-border);
      margin-bottom: 1.5rem;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: var(--primary);
      background: white;
    }

    .contact-item {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
    }

    .contact-item .icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1.5rem;
      color: var(--primary);
      font-size: 1.3rem;
      border: 2px solid rgba(99, 102, 241, 0.2);
    }

    .contact-item .info h6 {
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: var(--text-dark);
    }

    .contact-item .info p {
      margin: 0;
      color: var(--text-light);
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, var(--text-dark), #1a202c);
      color: white;
      padding: 5rem 0 2rem;
      position: relative;
      z-index: 10;
    }

    footer h5 {
      font-weight: 700;
      margin-bottom: 2rem;
      color: white;
    }

    footer a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: color 0.3s;
    }

    footer a:hover {
      color: white;
    }

    .footer-brand .logo {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, var(--primary), var(--accent-pink));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
      color: white;
    }

    .social-links a {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
      color: white;
      transition: all 0.3s;
      backdrop-filter: blur(10px);
    }

    .social-links a:hover {
      background: var(--primary);
      transform: translateY(-3px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .section-spacing {
        padding: 4rem 0;
      }

      .section-heading h2 {
        font-size: 2.2rem;
      }

      .particles {
        display: none;
      }

      .hero-section h1 {
        font-size: 2.5rem;
      }

      .hero-section p {
        font-size: 1.1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Particles Background -->
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

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-file-alt"></i>
        RIMS PSAS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about_us">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#registration">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testimonials">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contacts">Contact</a>
          </li>
        </ul>
        <a class="btn btn-primary" href="<?= base_url('auth/login') ?>">Sign In</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header id="home" class="hero-section">
    <div class="container">
      <div class="hero-content">
        <h1>Conference Management System</h1>
        <p>Streamline your research paper submissions, reviews, and approvals with our comprehensive platform featuring advanced glassmorphism design</p>
        <a href="#about_us" class="btn btn-primary">
          <i class="fas fa-rocket me-2"></i>
          Explore Now
        </a>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about_us" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">About Us</span>
        <h2>Overview of the Conference System</h2>
        <p>Our platform provides a seamless experience for researchers, reviewers, and conference organizers with cutting-edge technology.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="feature-card animate-in">
            <div class="icon">
              <i class="fas fa-bullseye"></i>
            </div>
            <h4>Purpose</h4>
            <p>Facilitating paper submissions, reviews, and approvals efficiently with modern technology.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card animate-in">
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <h4>Roles</h4>
            <p>Includes participants, reviewers, judges, and admins managing the entire process seamlessly.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card animate-in">
            <div class="icon">
              <i class="fas fa-cogs"></i>
            </div>
            <h4>Key Features</h4>
            <p>Advanced submission management, review tracking, and automated approval workflows.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card animate-in">
            <div class="icon">
              <i class="fas fa-headset"></i>
            </div>
            <h4>Support</h4>
            <p>Dedicated 24/7 assistance for all users throughout the submission and review process.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Section -->
  <section id="registration" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Join Us</span>
        <h2>Be Part of Our Community</h2>
        <p>Join us as a participant or become one of our expert judges/reviewers</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="registration-card participant animate-in">
            <span class="badge">For Participants</span>
            <h4>Present Your Research</h4>
            <p>Showcase your work, gain recognition, and receive valuable insights from experts in your field.</p>
            <a href="#" class="btn btn-outline-primary mt-3">
              <i class="fas fa-user-plus me-2"></i>
              Register as Participant
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="registration-card judge animate-in">
            <span class="badge">For Judges</span>
            <h4>Evaluate Submissions</h4>
            <p>Contribute your expertise by assessing submissions and guiding participants with valuable feedback.</p>
            <a href="#" class="btn btn-outline-secondary mt-3">
              <i class="fas fa-gavel me-2"></i>
              Apply as Judge
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="registration-card reviewer animate-in">
            <span class="badge">For Reviewers</span>
            <h4>Review Research</h4>
            <p>Join our panel of reviewers and help maintain high-quality standards for all submissions.</p>
            <a href="#" class="btn btn-outline-accent mt-3">
              <i class="fas fa-search me-2"></i>
              Sign Up as Reviewer
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Questions & Answers</span>
        <h2>Frequently Asked Questions</h2>
        <p>Find answers to the most common questions about our conference management system</p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item animate-in">
              <h2 class="accordion-header" id="faqHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                  <i class="fas fa-upload me-3"></i>
                  How do I submit a paper?
                </button>
              </h2>
              <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  You can submit a paper by logging into the system, navigating to the submission section, and following the provided instructions. The platform guides you through each step of the process with intuitive design and clear prompts.
                </div>
              </div>
            </div>
            <div class="accordion-item animate-in">
              <h2 class="accordion-header" id="faqHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                  <i class="fas fa-clipboard-check me-3"></i>
                  What are the review criteria?
                </button>
              </h2>
              <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Papers are reviewed based on originality, clarity, relevance, and technical quality. Our comprehensive review system ensures fair and consistent evaluation of all submissions with detailed rubrics and guidelines.
                </div>
              </div>
            </div>
            <div class="accordion-item animate-in">
              <h2 class="accordion-header" id="faqHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                  <i class="fas fa-clock me-3"></i>
                  When will I receive feedback on my submission?
                </button>
              </h2>
              <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  The review process typically takes 2-4 weeks. You will be notified via email once a decision is made. Detailed feedback will be available in your user dashboard with comprehensive comments and suggestions.
                </div>
              </div>
            </div>
            <div class="accordion-item animate-in">
              <h2 class="accordion-header" id="faqHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                  <i class="fas fa-question-circle me-3"></i>
                  How can I contact support?
                </button>
              </h2>
              <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  You can contact our support team via email at support@conference-system.com or through the contact form on our website. We aim to respond to all inquiries within 24 hours with comprehensive assistance.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Testimonials</span>
        <h2>What People Say About Us</h2>
        <p>Feedback from our users on their experience with the modern conference system</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="testimonial-card animate-in">
            <p>"The submission process was seamless! I had no trouble uploading my paper and the glassmorphism interface was incredibly intuitive and visually stunning."</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Dr. Aisha">
              <div class="info">
                <h5>Dr. Aisha Rahman</h5>
                <p>Research Scientist</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card animate-in">
            <p>"Reviewing submissions has never been this efficient. The modern system keeps everything organized and helps me provide structured, detailed feedback effortlessly."</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Prof. Mark">
              <div class="info">
                <h5>Prof. Mark Thompson</h5>
                <p>Senior Reviewer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card animate-in">
            <p>"As a judge, I appreciated the structured evaluation system. The beautiful interface made scoring easy and ensured consistent assessment criteria across all submissions!"</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Dr. Lee">
              <div class="info">
                <h5>Dr. Sarah Lee</h5>
                <p>Conference Judge</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contacts" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Get In Touch</span>
        <h2>How You Can Reach Us</h2>
        <p>We're here to answer any questions you might have about our modern conference system</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="contact-form animate-in">
            <form>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Subject" required>
              </div>
              <div class="mb-4">
                <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-paper-plane me-2"></i>
                Send Message
              </button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info-box animate-in">
            <div class="contact-item">
              <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="info">
                <h6>Location</h6>
                <p>12 Example Street, City, Country</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="info">
                <h6>Phone</h6>
                <p>+123 456 7890</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="info">
                <h6>Email</h6>
                <p>info@rims-psas.com</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>
              <div class="info">
                <h6>Working Hours</h6>
                <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row g-4">
        <!-- Company Info -->
        <div class="col-lg-4 col-md-6">
          <div class="footer-brand mb-4">
            <a href="#" class="d-flex align-items-center text-decoration-none">
              <div class="logo">
                <i class="fas fa-file-alt"></i>
              </div>
              <span class="fs-4 text-white fw-bold">RIMS PSAS</span>
            </a>
          </div>
          <p class="mb-4" style="opacity: 0.8; line-height: 1.6;">Our modern conference management system provides a streamlined platform for research paper submission, review, and approval processes with cutting-edge glassmorphism design.</p>
          <div class="social-links d-flex">
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-3 col-md-6">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#home">Home</a></li>
            <li class="mb-2"><a href="#about_us">About Us</a></li>
            <li class="mb-2"><a href="#registration">Registration</a></li>
            <li class="mb-2"><a href="#faq">FAQ</a></li>
            <li class="mb-2"><a href="#testimonials">Testimonials</a></li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-3 col-md-6">
          <h5>Contact Info</h5>
          <ul class="list-unstyled">
            <li class="d-flex mb-3">
              <i class="fas fa-map-marker-alt me-3 mt-1" style="color: var(--primary);"></i>
              <span>12 Example Street, City, Country</span>
            </li>
            <li class="d-flex mb-3">
              <i class="fas fa-phone me-3 mt-1" style="color: var(--primary);"></i>
              <span>+123 456 7890</span>
            </li>
            <li class="d-flex mb-3">
              <i class="fas fa-envelope me-3 mt-1" style="color: var(--primary);"></i>
              <span>info@rims-psas.com</span>
            </li>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="col-lg-2 col-md-6">
          <h5>Stay Updated</h5>
          <p style="opacity: 0.8; margin-bottom: 1.5rem;">Subscribe to our newsletter</p>
          <form>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Email Address" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white;">
            </div>
            <button type="submit" class="btn btn-primary w-100">
              <i class="fas fa-bell me-2"></i>
              Subscribe
            </button>
          </form>
        </div>
      </div>

      <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.1);">

      <!-- Copyright -->
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="mb-md-0" style="opacity: 0.7;">© <?= date('Y') ?> RIMS PSAS. All rights reserved.</p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-end mb-0">
            <li class="list-inline-item"><a href="#" style="opacity: 0.7;">Privacy Policy</a></li>
            <li class="list-inline-item ms-3"><a href="#" style="opacity: 0.7;">Terms of Use</a></li>
            <li class="list-inline-item ms-3"><a href="#" style="opacity: 0.7;">Cookie Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sections = document.querySelectorAll("section");
      const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

      // Smooth scrolling for navigation links
      navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('href');
          const targetSection = document.querySelector(targetId);
          if (targetSection) {
            targetSection.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });

      // Active navigation highlighting
      function setActiveLink() {
        let scrollPos = window.scrollY + 100;

        sections.forEach((section) => {
          if (
            section.offsetTop <= scrollPos &&
            section.offsetTop + section.offsetHeight > scrollPos
          ) {
            navLinks.forEach((link) => link.classList.remove("active"));
            let activeLink = document.querySelector(`.navbar-nav .nav-link[href="#${section.id}"]`);
            if (activeLink) activeLink.classList.add("active");
          }
        });
      }

      // Intersection Observer for animations
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, observerOptions);

      // Initialize animations for elements
      const animateElements = document.querySelectorAll('.animate-in');
      animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
      });

      window.addEventListener("scroll", setActiveLink);

      // Navbar background opacity on scroll
      window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 100) {
          navbar.style.background = 'rgba(255, 255, 255, 0.98)';
        } else {
          navbar.style.background = 'rgba(255, 255, 255, 0.95)';
        }
      });
    });
  </script>
</body>

</html>