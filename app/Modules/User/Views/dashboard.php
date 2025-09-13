<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Notifications & Events</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            color: var(--text-dark);
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

        .content {
            padding: 30px;
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }

        .container-fluid {
            /* max-width: 1400px; */
            margin: 0 auto;
        }

        .row {
            /* display: grid; */
            /* grid-template-columns: 1fr 1fr; */
            /* gap: 30px; */
            align-items: start;
        }

        /* Card Styles */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            gap: 12px; /* optional spacing between title and button */
        }

        .card-header .card-title {
            margin: 0; /* remove default margins so centering works */
        }

        .card-header #markAllRead {
            margin-left: auto; /* extra-safe push to the right */
        }

        .card-title i {
            margin-right: 12px;
            color: var(--primary);
            font-size: 1.2rem;
            -webkit-text-fill-color: var(--primary);
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        }

        .btn-outline-primary {
            background: var(--glass-bg);
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

        .btn-success {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #d97706);
            color: white;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.4);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.85rem;
        }

        .btn-block {
            width: 100%;
        }

        /* Notification Styles */
        .notification-list {
            padding: 0;
            max-height: 600px;
            overflow-y: auto;
        }

        .notification-list::-webkit-scrollbar {
            width: 6px;
        }

        .notification-list::-webkit-scrollbar-track {
            background: var(--glass-bg);
            border-radius: 8px;
        }

        .notification-list::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--accent-pink));
            border-radius: 8px;
        }

        .notification-item {
            display: flex;
            padding: 25px 30px;
            border-bottom: 1px solid var(--glass-border);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .notification-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.03), rgba(139, 92, 246, 0.03));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .notification-item:hover::before {
            opacity: 1;
        }

        .notification-item:hover {
            transform: translateX(5px);
            background: rgba(99, 102, 241, 0.02);
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            position: relative;
            overflow: hidden;
        }

        .notification-icon::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.2), transparent);
            border-radius: 16px;
        }

        .notification-icon.success {
            background: linear-gradient(135deg, var(--success), #059669);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .notification-icon.warning {
            background: linear-gradient(135deg, var(--warning), #d97706);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .notification-icon.danger {
            background: linear-gradient(135deg, var(--error), #dc2626);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
        }

        .notification-content {
            flex-grow: 1;
            min-width: 0;
        }

        .notification-title {
            font-weight: 700;
            margin: 0 0 8px 0;
            color: var(--text-dark);
            font-size: 1.1rem;
        }

        .notification-description {
            color: var(--text-light);
            margin: 0 0 15px 0;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .notification-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .notification-time {
            font-size: 0.85rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .notification-time i {
            margin-right: 6px;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
        }

        /* Event Card Styles */
        .event-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 25px;
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .event-container::-webkit-scrollbar {
            width: 6px;
        }

        .event-container::-webkit-scrollbar-track {
            background: var(--glass-bg);
            border-radius: 8px;
        }

        .event-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--accent-pink));
            border-radius: 8px;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .event-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .event-card:hover::before {
            opacity: 1;
        }

        .event-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .event-card.research {
            border-top: 4px solid var(--primary);
        }

        .event-card.innovation {
            border-top: 4px solid var(--warning);
        }

        .event-header {
            padding: 25px;
            position: relative;
        }

        .event-icon {
            position: absolute;
            top: 25px;
            right: 25px;
            width: 45px;
            height: 45px;
            opacity: 0.7;
        }

        .event-type {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .event-type.research {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(139, 92, 246, 0.15));
            color: var(--primary);
            border: 1px solid rgba(99, 102, 241, 0.3);
        }

        .event-type.innovation {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(217, 119, 6, 0.15));
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .event-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0 0 12px 0;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .event-date {
            font-size: 0.9rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            font-weight: 600;
        }

        .event-date i {
            margin-right: 8px;
            color: var(--primary);
        }

        .event-description {
            color: var(--text-light);
            margin-bottom: 25px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .event-actions {
            display: flex;
            gap: 12px;
            padding: 0 25px 25px 25px;
        }

        /* Empty State Styles */
        .empty-state {
            padding: 60px 30px;
            text-align: center;
            color: var(--text-light);
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 20px;
            opacity: 0.6;
        }

        .empty-state-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .empty-state-description {
            font-size: 1rem;
            max-width: 350px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Badge Styles */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .badge-counter {
            position: absolute;
            top: -8px;
            right: -8px;
            min-width: 22px;
            height: 22px;
            border-radius: 11px;
            padding: 0 8px;
            font-size: 0.75rem;
            background: linear-gradient(135deg, var(--error), #dc2626);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .row {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px 15px;
            }

            .card {
                border-radius: 16px;
            }

            .card-header {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card-title {
                font-size: 1.2rem;
            }

            .notification-item {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .notification-icon {
                width: 45px;
                height: 45px;
                margin-right: 0;
                margin-bottom: 10px;
            }

            .notification-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .event-header {
                padding: 20px;
            }

            .event-actions {
                padding: 0 20px 20px 20px;
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .particles { display: none; }
        }

        @media (max-width: 480px) {
            .content {
                padding: 15px 10px;
            }

            .card-header {
                padding: 15px;
            }

            .notification-item {
                padding: 15px;
            }

            .event-header {
                padding: 15px;
            }

            .event-actions {
                padding: 0 15px 15px 15px;
            }
        }

        /* Animation classes */
        .animate-in {
            animation: slideInUp 0.6s ease-out;
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

        /* Focus styles */
        .btn:focus,
        *:focus {
            outline: 3px solid rgba(99, 102, 241, 0.3);
            outline-offset: 2px;
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Notifications Column -->
                <div class="col-lg-6">
                    <div class="card animate-in">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <i class="fas fa-bell"></i> Notifications
                            </div>
                            <button id="markAllRead" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-check-double"></i> Mark All Read
                            </button>
                        </div>

                        <div class="card-body p-0">
                            <!-- Sample notifications for demo -->
                            <?php if ($notification && count($notification) > 0): ?>
                                <div class="notification-list">
                                    <?php foreach ($notification as $notify): ?>
                                        <?php
                                            $iconClass = 'fas fa-info-circle';
                                            $typeClass = '';

                                            // Determine icon and background based on content
                                            if (
                                                stripos($notify->rn_title, 'approved') !== false ||
                                                stripos($notify->rn_description, 'approved') !== false
                                            ) {
                                                $iconClass = 'fas fa-check-circle';
                                                $typeClass = 'success';
                                            } elseif (
                                                stripos($notify->rn_title, 'rejected') !== false ||
                                                stripos($notify->rn_description, 'rejected') !== false ||
                                                stripos($notify->rn_title, 'return') !== false
                                            ) {
                                                $iconClass = 'fas fa-times-circle';
                                                $typeClass = 'danger';
                                            } elseif (
                                                stripos($notify->rn_title, 'update') !== false ||
                                                stripos($notify->rn_description, 'update') !== false
                                            ) {
                                                $iconClass = 'fas fa-sync';
                                                $typeClass = 'warning';
                                            }
                                        ?>
                                    <div class="notification-item">
                                        <div class="notification-icon <?= $typeClass ?>">
                                            <i class="<?= $iconClass ?>"></i>
                                        </div>
                                        <div class="notification-content">
                                            <h5 class="notification-title"><?= $notify->rn_title ?></h5>
                                            <p class="notification-description"><?= $notify->rn_description ?></p>
                                            <div class="notification-meta">
                                                <span class="notification-time">
                                                    <i class="fas fa-clock"></i> <?= timeAgo($notify->rn_created_at); ?>
                                                </span>
                                                <div class="notification-actions">
                                                    <button class="btn btn-outline-primary btn-sm mark-read" data-id="<?= $notify->rn_id; ?>">
                                                        <i class="fas fa-check"></i> Mark Read
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php else: ?>
                                <!-- Empty state example (hidden by default) -->
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-bell-slash"></i>
                                    </div>
                                    <h4 class="empty-state-title">No Notifications</h4>
                                    <p class="empty-state-description">You're all caught up! New notifications will appear here.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Events Column -->
                <div class="col-lg-6">
                    <div class="card animate-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-calendar-alt"></i> Events & Research
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (empty($event)): ?>
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-calendar-times"></i>
                                    </div>
                                    <h4 class="empty-state-title">No Events Available</h4>
                                    <p class="empty-state-description">There are currently no active events. Check back later!</p>
                                </div>
                            <?php else: ?>
                                <div class="event-container">
                                    <?php foreach ($event as $e): ?>
                                        <?php if ($e->re_type === 'research'): ?>
                                            <!-- Research Event -->
                                            <div class="event-card research">
                                                <div class="event-header">
                                                    <span class="event-type research">Research Project</span>
                                                    <h3 class="event-title"><?= $e->re_name ?></h3>
                                                    <div class="event-date">
                                                        <i class="fas fa-calendar-day"></i>
                                                        <?= isset($e->re_date) ? date('M d, Y', strtotime($e->re_date)) : 'Ongoing' ?>
                                                    </div>
                                                    <p class="event-description"><?= $e->re_description ?></p>
                                                    <svg class="event-icon" fill="var(--primary)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 3.75A1.75 1.75 0 015.75 2h8.5A1.75 1.75 0 0116 3.75V6h3.25A1.75 1.75 0 0121 7.75v12.5A1.75 1.75 0 0119.25 22H5.75A1.75 1.75 0 014 20.25V3.75zM6.5 4.5v15h12V8H14.75A1.75 1.75 0 0113 6.25V4.5H6.5z" />
                                                    </svg>
                                                </div>
                                                <div class="event-actions">
                                                    <a href="<?= base_url('participant/event/get_participant_event_dashboard/') . $e->re_id ?>" class="btn btn-primary btn-block">
                                                        <i class="fas fa-user-friends"></i>
                                                        Join as Participant
                                                    </a>
                                                    <a href="<?= base_url('judge/event/get_judge_event_dashboard/') . $e->re_id ?>" class="btn btn-warning btn-block">
                                                        <i class="fas fa-gavel"></i>
                                                        Join as Reviewer
                                                    </a>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <!-- Innovation Event -->
                                            <div class="event-card innovation">
                                                <div class="event-header">
                                                    <span class="event-type innovation">Innovation</span>
                                                    <h3 class="event-title"><?= $e->re_name ?></h3>
                                                    <div class="event-date">
                                                        <i class="fas fa-calendar-day"></i>
                                                        <?= isset($e->re_date) ? date('M d, Y', strtotime($e->re_date)) : 'Ongoing' ?>
                                                    </div>
                                                    <p class="event-description"><?= $e->re_description ?></p>
                                                    <svg class="event-icon" fill="var(--primary)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 3.75A1.75 1.75 0 015.75 2h8.5A1.75 1.75 0 0116 3.75V6h3.25A1.75 1.75 0 0121 7.75v12.5A1.75 1.75 0 0119.25 22H5.75A1.75 1.75 0 014 20.25V3.75zM6.5 4.5v15h12V8H14.75A1.75 1.75 0 0113 6.25V4.5H6.5z" />
                                                    </svg>
                                                </div>
                                                <div class="event-actions">
                                                    <a href="<?= base_url('participant/event/get_participant_event_dashboard/') . $e->re_id ?>" class="btn btn-primary btn-block">
                                                        <i class="fas fa-user-friends"></i>
                                                        Join as Participant
                                                    </a>
                                                    <a href="<?= base_url('judge/event/get_judge_event_dashboard/') . $e->re_id ?>" class="btn btn-warning btn-block">
                                                        <i class="fas fa-gavel"></i>
                                                        Join as Reviewer
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                