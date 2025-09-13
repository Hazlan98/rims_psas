    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
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

        .particle:nth-child(odd) { animation-direction: reverse; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%, 90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); }
        }

        .particle:nth-child(1) { width: 8px; height: 8px; left: 10%; animation-delay: 0s; animation-duration: 6s; }
        .particle:nth-child(2) { width: 12px; height: 12px; left: 20%; animation-delay: 1s; animation-duration: 8s; }
        .particle:nth-child(3) { width: 6px; height: 6px; left: 30%; animation-delay: 2s; animation-duration: 7s; }
        .particle:nth-child(4) { width: 10px; height: 10px; left: 40%; animation-delay: 3s; animation-duration: 9s; }
        .particle:nth-child(5) { width: 14px; height: 14px; left: 50%; animation-delay: 4s; animation-duration: 6s; }
        .particle:nth-child(6) { width: 10px; height: 10px; left: 60%; animation-delay: 2.5s; animation-duration: 7s; }
        .particle:nth-child(7) { width: 8px; height: 8px; left: 70%; animation-delay: 4s; animation-duration: 9s; }
        .particle:nth-child(8) { width: 6px; height: 6px; left: 80%; animation-delay: 1.5s; animation-duration: 6s; }
        .particle:nth-child(9) { width: 12px; height: 12px; left: 90%; animation-delay: 3.5s; animation-duration: 8s; }

        /* Page Header */
        .page-header {
            position: relative;
            z-index: 10;
            padding: 60px 0 40px 0;
            text-align: center;
            color: white;
        }

        .page-header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #ffffff, rgba(255,255,255,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 20px rgba(0,0,0,0.2);
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            from { filter: drop-shadow(0 0 10px rgba(255,255,255,0.5)); }
            to { filter: drop-shadow(0 0 20px rgba(255,255,255,0.8)); }
        }

        .page-header p {
            font-size: 1.3rem;
            font-weight: 400;
            opacity: 0.9;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .page-header i {
            margin-right: 15px;
            font-size: 3rem;
        }

        /* Content */
        .content {
            padding: 30px;
            position: relative;
            z-index: 10;
        }

        /* Category Header */
        .category-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 25px 35px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .category-header::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 0 5px 5px 0;
        }

        .category-header:hover {
            transform: translateX(5px);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .category-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--text-dark);
            padding-left: 20px;
        }

        /* Event Cards */
        .event-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: slideInUp 0.6s ease-out;
        }

        .event-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.02), rgba(139, 92, 246, 0.02));
            z-index: -1;
        }

        .event-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .card-img-container {
            height: 200px;
            overflow: hidden;
            position: relative;
            border-radius: 20px 20px 0 0;
        }

        .card-img-top {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
            filter: brightness(0.9);
        }

        .event-card:hover .card-img-top {
            transform: scale(1.1);
            filter: brightness(1);
        }

        .card-overlay {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            backdrop-filter: blur(10px);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .card-body {
            padding: 25px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 200px);
        }

        .card-title {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            font-size: 1.25rem;
            line-height: 1.4;
            flex-grow: 1;
        }

        .deadline-section {
            margin-top: auto;
        }

        .deadline-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .deadline-badge {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 12px 20px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            transition: all 0.3s ease;
        }

        .deadline-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        }

        .view-details-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--accent), #0891b2);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 15px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3);
        }

        .view-details-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .view-details-btn:hover::before {
            left: 100%;
        }

        .view-details-btn:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.4);
        }

        /* No Events */
        .no-events {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 50px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .no-events:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .no-events i {
            color: var(--text-light);
            margin-bottom: 20px;
            opacity: 0.7;
        }

        .no-events h5 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .no-events p {
            color: var(--text-light);
            margin: 0;
        }

        /* Section Divider */
        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), var(--primary), rgba(255,255,255,0.3), transparent);
            margin: 60px 0;
            border-radius: 2px;
        }

        /* Animation classes */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .content {
                padding: 20px 15px;
            }

            .page-header {
                padding: 40px 0 30px 0;
            }

            .page-header h1 {
                font-size: 2.5rem;
            }

            .page-header p {
                font-size: 1.1rem;
            }

            .category-header {
                padding: 20px 25px;
                margin-bottom: 25px;
            }

            .category-header h3 {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 20px;
            }

            .particles { display: none; }
        }

        @media (max-width: 480px) {
            .content {
                padding: 15px 10px;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .page-header p {
                font-size: 1rem;
            }

            .category-header {
                padding: 15px 20px;
            }

            .category-header h3 {
                font-size: 1.3rem;
            }

            .card-body {
                padding: 15px;
            }

            .card-title {
                font-size: 1.1rem;
            }
        }
    </style>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1><i class="fas fa-calendar-alt"></i>PSAS Events</h1>
            <p class="lead mb-0">Discover and register for our upcoming events</p>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container">
            <?php foreach ($event_categories as $category): ?>
                <!-- Sample Category 1 -->
                <div class="event-category">
                    <div class="category-header">
                        <h3><?= $category->rc_desc ?></h3>
                    </div>

                    <div class="row g-4">
                        <?php
                            $hasEvents = false;
                            foreach ($events as $event):
                                if ($event->re_rc_id == $category->rc_id):
                                    $hasEvents = true;
                        ?>
                                <!-- Sample Event Card 1 -->
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="event-card card h-100">
                                        <div class="card-img-container">
                                            <img src="<?= base_url('uploads/events/' . $event->re_banner_image) ?>" class="card-img-top" alt="<?= $event->re_name ?>">
                                            <div class="card-overlay">
                                                <i class="fas fa-star me-1"></i> Featured
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?= $event->re_name ?></h5>

                                            <div class="mt-auto">
                                                <div class="deadline-label">
                                                    <i class="far fa-clock"></i> Registration Deadline:
                                                </div>
                                                <div class="deadline-badge">
                                                    <i class="fas fa-calendar-day me-1"></i>
                                                    <?= date('d M Y', strtotime($event->re_registration_deadline)) ?>
                                                </div>

                                                <a href="<?= base_url('participant/event/get_participant_event_dashboard/') . $event->re_id ?>" class="btn btn-primary view-details-btn mt-3">
                                                    <i class="fas fa-info-circle me-1"></i> View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                endif;
                            endforeach;

                            if (!$hasEvents):
                        ?>
                            <div class="col-12">
                                <div class="no-events">
                                    <i class="fas fa-calendar-times fa-3x mb-3"></i>
                                    <h5>No events available in this category</h5>
                                    <p class="text-muted">Check back later for upcoming events.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="section-divider"></div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add staggered animation delay to event cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.event-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Add smooth hover effects
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '100';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });
    </script>