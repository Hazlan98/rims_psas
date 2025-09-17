<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>RIMS PSAS - Conference Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>

  <style>
    :root {
      --primary: #2c3e50;
      --secondary: #3498db;
      --accent: #1abc9c;
      --light: #ecf0f1;
      --dark: #2c3e50;
      --text-dark: #34495e;
      --gray-light: #f8f9fa;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-dark);
      overflow-x: hidden;
    }

    .navbar-nav {
      flex-grow: 1;
      justify-content: center;
    }

    .navbar-nav .nav-link {
      position: relative;
      text-align: center;
      display: inline-block;
      padding-bottom: 5px;
      /* Ensure space for underline */
    }

    .navbar-nav .nav-link::after {
      content: "";
      display: block;
      width: 0;
      /* width: 100%; */
      height: 2px;
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      transition: width 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
      width: 100%;
      /* Show underline on hover and active state */
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: white;
      padding: 0.8rem 1rem;
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary);
      display: flex;
      align-items: center;
    }

    .nav-link {
      font-weight: 500;
      color: var(--text-dark);
      margin: 0 0.5rem;
      padding: 0.5rem 0.7rem !important;
      position: relative;
      transition: color 0.3s;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--secondary);
    }

    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: var(--secondary);
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      transition: width 0.3s;
    }

    .nav-link:hover:after,
    .nav-link.active:after {
      width: 80%;
    }

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

    .btn-primary {
      background-color: var(--secondary);
      border-color: var(--secondary);
      padding: 0.8rem 2rem;
      font-weight: 600;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: #2980b9;
      border-color: #2980b9;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .section-heading {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-heading .badge {
      background-color: rgba(26, 188, 156, 0.2);
      color: var(--accent);
      font-weight: 600;
      padding: 0.5rem 1rem;
      margin-bottom: 1rem;
      font-size: 0.9rem;
    }

    .section-heading h2 {
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
    }

    .section-heading p {
      max-width: 700px;
      margin: 0 auto;
      color: #7f8c8d;
      font-size: 1.1rem;
    }

    .feature-card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      padding: 2.5rem 2rem;
      transition: all 0.3s;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .feature-card .icon {
      width: 70px;
      height: 70px;
      background-color: rgba(52, 152, 219, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      color: var(--secondary);
      margin-bottom: 1.5rem;
    }

    .feature-card h4 {
      font-weight: 600;
      margin-bottom: 1rem;
      font-size: 1.4rem;
    }

    .feature-card p {
      color: #7f8c8d;
      margin-bottom: 1.5rem;
    }

    .bg-light-gradient {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .registration-card {
      border-radius: 10px;
      padding: 2.5rem;
      height: 100%;
      transition: all 0.3s;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .registration-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .registration-card.participant {
      background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(52, 152, 219, 0.2) 100%);
      border-top: 4px solid var(--secondary);
    }

    .registration-card.judge {
      background: linear-gradient(135deg, rgba(155, 89, 182, 0.1) 0%, rgba(155, 89, 182, 0.2) 100%);
      border-top: 4px solid #9b59b6;
    }

    .registration-card.reviewer {
      background: linear-gradient(135deg, rgba(26, 188, 156, 0.1) 0%, rgba(26, 188, 156, 0.2) 100%);
      border-top: 4px solid var(--accent);
    }

    .registration-card .badge {
      padding: 0.5rem 1rem;
      border-radius: 30px;
      margin-bottom: 1rem;
      font-weight: 600;
      font-size: 0.85rem;
    }

    .registration-card.participant .badge {
      background-color: rgba(52, 152, 219, 0.2);
      color: var(--secondary);
    }

    .registration-card.judge .badge {
      background-color: rgba(155, 89, 182, 0.2);
      color: #9b59b6;
    }

    .registration-card.reviewer .badge {
      background-color: rgba(26, 188, 156, 0.2);
      color: var(--accent);
    }

    .btn-outline-primary {
      border: 2px solid var(--secondary);
      color: var(--secondary);
      font-weight: 600;
      padding: 0.6rem 1.5rem;
      transition: all 0.3s;
    }

    .btn-outline-primary:hover {
      background-color: var(--secondary);
      color: white;
      transform: translateY(-3px);
    }

    .btn-outline-secondary {
      border: 2px solid #9b59b6;
      color: #9b59b6;
      background: transparent;
      font-weight: 600;
      padding: 0.6rem 1.5rem;
      transition: all 0.3s;
    }

    .btn-outline-secondary:hover {
      background-color: #9b59b6;
      color: white;
      transform: translateY(-3px);
    }

    .btn-outline-accent {
      border: 2px solid var(--accent);
      color: var(--accent);
      background: transparent;
      font-weight: 600;
      padding: 0.6rem 1.5rem;
      transition: all 0.3s;
    }

    .btn-outline-accent:hover {
      background-color: var(--accent);
      color: white;
      transform: translateY(-3px);
    }

    .accordion-item {
      border: none;
      margin-bottom: 1rem;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
      border-radius: 8px !important;
      overflow: hidden;
    }

    .accordion-button {
      font-weight: 600;
      padding: 1.2rem 1.5rem;
      background-color: white;
      color: var(--primary);
    }

    .accordion-button:not(.collapsed) {
      background-color: var(--secondary);
      color: white;
    }

    .accordion-button:focus {
      box-shadow: none;
    }

    .accordion-body {
      padding: 1.5rem;
      background-color: white;
    }

    .testimonial-card {
      background-color: white;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      position: relative;
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    .testimonial-card p {
      font-style: italic;
      line-height: 1.7;
    }

    .testimonial-card::before {
      content: '"';
      position: absolute;
      top: -30px;
      left: 20px;
      font-size: 5rem;
      color: var(--secondary);
      opacity: 0.2;
      font-family: Georgia, serif;
    }

    .testimonial-person {
      display: flex;
      align-items: center;
      margin-top: 1.5rem;
    }

    .testimonial-person img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 1rem;
      object-fit: cover;
      border: 3px solid var(--light);
    }

    .testimonial-person .info h5 {
      font-weight: 600;
      margin-bottom: 0.2rem;
      color: var(--secondary);
    }

    .testimonial-person .info p {
      margin: 0;
      color: #7f8c8d;
      font-style: normal;
    }

    .contact-form {
      background-color: white;
      padding: 2.5rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .form-control {
      padding: 0.8rem 1.2rem;
      border-radius: 5px;
      border: 1px solid #e0e0e0;
      margin-bottom: 1.2rem;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: var(--secondary);
    }

    .contact-info-box {
      background-color: white;
      padding: 2.5rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      height: 100%;
    }

    .contact-item {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
    }

    .contact-item .icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: rgba(52, 152, 219, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
      color: var(--secondary);
      font-size: 1.2rem;
    }

    .contact-item .info h6 {
      font-weight: 600;
      margin-bottom: 0.3rem;
      color: var(--primary);
    }

    .contact-item .info p {
      margin: 0;
      color: #7f8c8d;
    }

    footer {
      background-color: var(--primary);
      color: white;
      padding: 5rem 0 2rem;
    }

    footer h5 {
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: white;
    }

    footer ul {
      list-style: none;
      padding: 0;
    }

    footer ul li {
      margin-bottom: 0.8rem;
    }

    footer a {
      color: #bdc3c7;
      text-decoration: none;
      transition: color 0.3s;
    }

    footer a:hover {
      color: white;
    }

    .footer-brand {
      display: flex;
      align-items: center;
      font-weight: 700;
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
    }

    .footer-brand .logo {
      width: 40px;
      height: 40px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 0.8rem;
      color: var(--primary);
    }

    .copyright {
      margin-top: 3rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-links {
      display: flex;
      align-items: center;
    }

    .social-links a {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 1rem;
      color: white;
      transition: all 0.3s;
    }

    .social-links a:hover {
      background-color: var(--secondary);
      transform: translateY(-3px);
    }

    .section-spacing {
      padding: 6rem 0;
    }

    @media (max-width: 768px) {
      .section-spacing {
        padding: 4rem 0;
      }

      .hero-section h1 {
        font-size: 2.5rem;
      }

      .hero-section p {
        font-size: 1.1rem;
      }

      .section-heading h2 {
        font-size: 2rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <span class="me-2"><i class="fas fa-file-alt text-primary"></i></span>
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
        <p>Streamline your research paper submissions, reviews, and approvals with our comprehensive platform</p>
        <a href="#about_us" class="btn btn-primary">Learn More</a>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about_us" class="section-spacing">
    <div class="container">
      <div class="section-heading">
        <span class="badge">About Us</span>
        <h2>Overview of the Conference System</h2>
        <p>Our platform provides a seamless experience for researchers, reviewers, and conference organizers.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="icon">
              <i class="fas fa-bullseye"></i>
            </div>
            <h4>Purpose</h4>
            <p>Facilitating paper submissions, reviews, and approvals efficiently.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <h4>Roles</h4>
            <p>Includes participants, reviewers, judges, and admins managing the process.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="icon">
              <i class="fas fa-cogs"></i>
            </div>
            <h4>Key Features</h4>
            <p>Submission management, review tracking, and approvals.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="icon">
              <i class="fas fa-headset"></i>
            </div>
            <h4>Support</h4>
            <p>Dedicated assistance for all users throughout the submission process.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Section -->
  <section id="registration" class="section-spacing bg-light-gradient">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Join Us</span>
        <h2>Be Part of Our Community</h2>
        <p>Join us as a participant or become one of our judges/reviewers</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="registration-card participant">
            <span class="badge">For Participants</span>
            <h4>Present Your Research</h4>
            <p>Showcase your work, gain recognition, and receive insights from experts in your field.</p>
            <a href="#" class="btn btn-outline-primary mt-3">Register as Participant</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="registration-card judge">
            <span class="badge">For Judges</span>
            <h4>Evaluate Submissions</h4>
            <p>Contribute your expertise by assessing submissions and guiding participants with valuable feedback.</p>
            <a href="#" class="btn btn-outline-secondary mt-3">Apply as Judge</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="registration-card reviewer">
            <span class="badge">For Reviewers</span>
            <h4>Review Research</h4>
            <p>Join our panel of reviewers and help maintain high-quality standards for all submissions.</p>
            <a href="#" class="btn btn-outline-accent mt-3">Sign Up as Reviewer</a>
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
        <p>Find answers to the most common questions about our conference system</p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                  How do I submit a paper?
                </button>
              </h2>
              <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  You can submit a paper by logging into the system, navigating to the submission section, and following the provided instructions. The platform guides you through each step of the process.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                  What are the review criteria?
                </button>
              </h2>
              <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Papers are reviewed based on originality, clarity, relevance, and technical quality. Our comprehensive review system ensures fair and consistent evaluation of all submissions.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                  When will I receive feedback on my submission?
                </button>
              </h2>
              <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  The review process typically takes 2-4 weeks. You will be notified via email once a decision is made. Detailed feedback will be available in your user dashboard.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
                  How can I contact support?
                </button>
              </h2>
              <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  You can contact our support team via email at support@conference-system.com or through the contact form on our website. We aim to respond to all inquiries within 24 hours.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="section-spacing bg-light-gradient">
    <div class="container">
      <div class="section-heading">
        <span class="badge">Testimonials</span>
        <h2>What People Say About Us</h2>
        <p>Feedback from our users on their experience with the system</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"The submission process was seamless! I had no trouble uploading my paper and the interface was intuitive and user-friendly."</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Dr. Aisha">
              <div class="info">
                <h5>Dr. Aisha</h5>
                <p>Researcher</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"Reviewing submissions has never been this efficient. The system keeps everything organized and helps me provide structured feedback."</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Prof. Mark">
              <div class="info">
                <h5>Prof. Mark</h5>
                <p>Reviewer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"As a judge, I appreciated the structured evaluation system. It made scoring easy and ensured consistent assessment criteria!"</p>
            <div class="testimonial-person">
              <img src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png" alt="Dr. Lee">
              <div class="info">
                <h5>Dr. Lee</h5>
                <p>Judge</p>
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
        <p>We're here to answer any questions you might have</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6">
          <div class="contact-form">
            <form>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="mb-4">
                <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info-box">
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
  <!-- Footer -->
  <footer class="corporate-footer bg-dark text-light py-5">
    <div class="container">
      <div class="row g-4">
        <!-- Company Info -->
        <div class="col-lg-4 col-md-6">
          <div class="footer-brand mb-4">
            <a href="#" class="d-flex align-items-center text-decoration-none">
              <div class="logo me-2">
                <i class="fas fa-file-alt text-primary"></i>
              </div>
              <span class="fs-4 text-white fw-bold">RIMS PSAS</span>
            </a>
          </div>
          <p class="text-light-emphasis mb-4">Our conference management system provides a streamlined platform for research paper submission, review, and approval processes.</p>
          <div class="social-links">
            <a href="#" class="me-3 text-light"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="me-3 text-light"><i class="fab fa-twitter"></i></a>
            <a href="#" class="me-3 text-light"><i class="fab fa-facebook"></i></a>
            <a href="#" class="me-3 text-light"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-3 col-md-6">
          <h5 class="text-white mb-4">Quick Links</h5>
          <ul class="list-unstyled footer-links">
            <li class="mb-2"><a href="#home" class="text-light-emphasis text-decoration-none">Home</a></li>
            <li class="mb-2"><a href="#about_us" class="text-light-emphasis text-decoration-none">About Us</a></li>
            <li class="mb-2"><a href="#registration" class="text-light-emphasis text-decoration-none">Registration</a></li>
            <li class="mb-2"><a href="#faq" class="text-light-emphasis text-decoration-none">FAQ</a></li>
            <li class="mb-2"><a href="#testimonials" class="text-light-emphasis text-decoration-none">Testimonials</a></li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-3 col-md-6">
          <h5 class="text-white mb-4">Contact Info</h5>
          <ul class="list-unstyled contact-info">
            <li class="d-flex mb-3">
              <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
              <span>12 Example Street, City, Country</span>
            </li>
            <li class="d-flex mb-3">
              <i class="fas fa-phone text-primary me-3 mt-1"></i>
              <span>+123 456 7890</span>
            </li>
            <li class="d-flex mb-3">
              <i class="fas fa-envelope text-primary me-3 mt-1"></i>
              <span>info@rims-psas.com</span>
            </li>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="col-lg-2 col-md-6">
          <h5 class="text-white mb-4">Stay Updated</h5>
          <p class="text-light-emphasis mb-3">Subscribe to our newsletter</p>
          <form>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
            </div>
            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
          </form>
        </div>
      </div>

      <hr class="mt-4 mb-4 border-secondary">

      <!-- Copyright and Legal Links -->
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="mb-md-0 text-light-emphasis">© <?= date('Y') ?> RIMS PSAS. All rights reserved.</p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-end mb-0">
            <li class="list-inline-item"><a href="#" class="text-light-emphasis text-decoration-none">Privacy Policy</a></li>
            <li class="list-inline-item ms-3"><a href="#" class="text-light-emphasis text-decoration-none">Terms of Use</a></li>
            <li class="list-inline-item ms-3"><a href="#" class="text-light-emphasis text-decoration-none">Cookie Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sections = document.querySelectorAll("section"); // Select all sections
      const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

      function setActiveLink() {
        let scrollPos = window.scrollY + 100; // Adjusted for better accuracy

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

      window.addEventListener("scroll", setActiveLink);
    });
  </script>