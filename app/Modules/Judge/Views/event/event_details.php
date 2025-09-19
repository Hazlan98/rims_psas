    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Hazlan Custom Template -->
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/table.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

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
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            color: var(--text-dark);
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

        .content {
            padding: 30px;
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }

        /* Event Header Styles */
        .event-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            margin-bottom: 30px;
            position: relative;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .event-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .event-banner {
            position: relative;
            height: 300px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .event-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .event-banner:hover img {
            transform: scale(1.05);
        }

        .event-banner-placeholder {
            color: white;
            font-size: 4rem;
            opacity: 0.7;
        }

        .event-details {
            padding: 30px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        }

        .event-name {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 25px;
            background: linear-gradient(135deg, var(--primary), var(--accent-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Info Cards */
        .info-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .info-card:hover::before {
            left: 100%;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .info-card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .info-card-title {
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            opacity: 0.8;
        }

        .info-card-value {
            font-size: 1.5rem;
            font-weight: 800;
        }

        /* Content Card Styles */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            margin-bottom: 20px;
        }

        .content-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .content-card:hover {
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            padding: 25px 30px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
            border-radius: 20px 20px 0 0;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .card-header h5 i {
            margin-right: 12px;
            color: var(--primary);
            font-size: 1.3rem;
        }

        .card-body {
            padding: 25px 30px;
        }

        /* Table Styles */
        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .table-custom {
            margin: 0;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .table-custom thead th {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 20px 15px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .table-custom tbody td {
            padding: 18px 15px;
            border-top: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            vertical-align: middle;
        }

        .table-custom tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .table-custom tbody tr:hover {
            background: rgba(99, 102, 241, 0.08);
            transform: translateX(5px);
        }

        /* Badge Styles */
        .badge {
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
            backdrop-filter: blur(10px);
        }

        .bg-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--accent), #0891b2) !important;
        }

        .bg-success {
            background: linear-gradient(135deg, var(--success), #059669) !important;
        }

        .bg-danger {
            background: linear-gradient(135deg, var(--error), #dc2626) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, var(--warning), #d97706) !important;
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-sm {
            padding: 8px 14px;
            font-size: 0.8rem;
        }

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

        .btn-outline-info {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            color: var(--accent);
            border: 2px solid var(--accent);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.2);
        }

        .btn-outline-info:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(6, 182, 212, 0.4);
        }

        .btn-outline-secondary {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            color: #6c757d;
            border: 2px solid #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
            transform: translateY(-2px);
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            border: none;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
            color: white;
        }

        .btn-custom-danger {
            background: linear-gradient(135deg, var(--error), #dc2626);
            color: white;
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
            border: none;
        }

        .btn-custom-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(239, 68, 68, 0.4);
            color: white;
        }

        /* Alert Styles */
        .alert {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));
            border-color: rgba(245, 158, 11, 0.3);
            color: #92400e;
        }

        /* Modal Styles */
        .modal-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            padding: 25px 30px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid var(--glass-border);
            border-radius: 20px 20px 0 0;
        }

        .modal-title {
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .modal-title i {
            margin-right: 12px;
            color: var(--primary);
        }

        .modal-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-select {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 2px solid var(--glass-border);
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: white;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .content {
                padding: 20px 15px;
            }

            .event-name {
                font-size: 2rem;
            }

            .card-header,
            .card-body {
                padding: 20px;
            }

            .info-card {
                padding: 20px;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 12px 8px;
                font-size: 0.85rem;
            }

            .particles {
                display: none;
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

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Event Header -->
            <!-- <div class="event-header">
                <div class="event-banner">
                    <img src="<?= base_url('uploads/events/') . $event_info->re_banner_image ?>" alt="Event Banner">
                </div>
                <div class="event-details">
                    <h1 class="event-name"><?= $event_info->re_name ?></h1>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-envelope-open text-primary me-2"></i>
                                <span><strong>Contact:</strong> <?= $event_info->re_contact_email ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                <span><strong>Location:</strong> <?= $event_info->re_location ?></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted"><?= $event_info->re_description ?></p>
                </div>
            </div> -->

            <!-- Event Metrics -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="info-card bg-success bg-opacity-10 text-white">
                        <div class="info-card-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="info-card-title">Start Date</div>
                        <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_start_date)) ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="info-card bg-danger bg-opacity-10 text-white">
                        <div class="info-card-icon">
                            <i class="fas fa-hourglass-end"></i>
                        </div>
                        <div class="info-card-title">Registration Deadline</div>
                        <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_registration_deadline)) ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="info-card bg-warning bg-opacity-10 text-white">
                        <div class="info-card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="info-card-title">End Date</div>
                        <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_end_date)) ?></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="info-card bg-info bg-opacity-10 text-white">
                        <div class="info-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="info-card-title">Participants</div>
                        <div class="info-card-value">0/<?= $event_info->re_max_participants ?></div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Participants Table -->
                <div class="col-lg-9 mb-4">
                    <div class="content-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>
                                <i class="fas fa-tags me-2 text-primary"></i>
                                List of assigned project:
                            </h5>
                        </div>

                        <div class="card-body p-2">
                            <?php if ($judge_status == null): ?>
                                <div class="alert alert-warning text-center">
                                    <h5>You haven't registered as a judge yet!</h5>
                                    <p>Join us as a judge and participate in the review process.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                                        Register Now
                                    </button>
                                </div>
                            <?php else: ?>
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-hover table-custom">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Abstract</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($assign_rpi == null): ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <div class="alert alert-warning d-flex align-items-center justify-content-center" role="alert">
                                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                                <span>No assigned project yet. Please check back later or contact the admin.</span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                <?php else: ?>
                                                    <?php $counter = 1;
                                                    foreach ($assign_rpi as $rpi): ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= get_field_desc($rpi->rpi_rf_id); ?></td>
                                                            <td><?= $rpi->rpi_title ?></td>
                                                            <td><a href="<?= base_url($rpi->rpi_abstract) ?>" class="btn btn-sm btn-info" target="_blank">abstract</a></td>
                                                            <td><?= get_rims_reviewer_status($rpi->rpi_status) ?></td>
                                                            <td>
                                                                <?php if ($rpi->rpi_status == 'Awaiting Reviewer Acceptance'): ?>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-outline-primary btn-sm accept-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </button>
                                                                        <button class="btn btn-outline-danger btn-sm reject-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                            <i class="fas fa-times"></i> Reject
                                                                        </button>
                                                                    </div>
                                                                <?php elseif ($rpi->rpi_status == 'Awaiting Review' || $rpi->rpi_status == 'Major Correction' || $rpi->rpi_status == 'Minor Correction' || $rpi->rpi_status == 'Correction Draft'): ?>
                                                                    <div class="btn-group">
                                                                        <a href="<?= base_url('judge/review/get-review-full-paper/') . $rpi->rpi_id ?>" class="btn btn-outline-info btn-sm view-btn">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Event Fields -->
                <div class="col-lg-3 mb-4">
                    <div class="content-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>
                                <i class="fas fa-tags me-2 text-primary"></i>
                                Registered Field
                            </h5>
                            <button type="button" class="btn btn-sm btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#registerModal">
                                <i class="fas fa-plus me-1"></i> Add
                            </button>

                        </div>
                        <div class="card-body p-2">
                            <?php if ($judge_status == null): ?>
                                <div class="alert alert-warning text-center">
                                    <h5>No Data</h5>
                                </div>
                            <?php else: ?>
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-hover table-custom">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Abstract</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($assign_rpi == null): ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">
                                                            <div class="alert alert-warning d-flex align-items-center justify-content-center" role="alert">
                                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                                <span>No assigned project yet. Please check back later or contact the admin.</span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                <?php else: ?>
                                                    <?php $counter = 1;
                                                    foreach ($assign_rpi as $rpi): ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= get_field_desc($rpi->rpi_rf_id); ?></td>
                                                            <td><?= $rpi->rpi_title ?></td>
                                                            <td><a href="<?= base_url($rpi->rpi_abstract) ?>" class="btn btn-sm btn-outline-info" target="_blank">abstract</a></td>
                                                            <td><?= get_rims_reviewer_status($rpi->rpi_status) ?></td>
                                                            <td>
                                                                <?php if ($rpi->rpi_status == 'Awaiting Reviewer Acceptance'): ?>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-success btn-sm accept-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                            <i class="fas fa-check"></i> Accept
                                                                        </button>
                                                                        <button class="btn btn-danger btn-sm reject-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                            <i class="fas fa-times"></i> Reject
                                                                        </button>
                                                                    </div>
                                                                <?php elseif ($rpi->rpi_status == 'Awaiting Review' || $rpi->rpi_status == 'Major Correction' || $rpi->rpi_status == 'Minor Correction' || $rpi->rpi_status == 'Correction Draft'): ?>
                                                                    <div class="btn-group">
                                                                        <a href="<?= base_url('judge/review/get-review-full-paper/') . $rpi->rpi_id ?>" class="btn btn-outline-info btn-sm view-btn">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addField">Add Field to Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" id="judgeRegisterForm">
                        <?= csrf_field() ?>
                        <input name="rj_re_id" value="<?= $event_info->re_id ?>" hidden>
                        <!-- <div class="row mb-3"> -->
                        <label for="eventField" class="form-label">Event Field</label>
                        <select class="form-control" id="eventField" name="rj_rf_id">
                            <option value="">-- Select Field to Add --</option>
                            <?php foreach ($rims_field as $field): ?>
                                <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.all.min.js"></script>

    <script>
        // Initialize Select2
        $(document).ready(function() {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            // Initialize Select2
            $('#eventField').select2({
                placeholder: "Select your field of expertise",
                allowClear: true,
                width: '100%', // fixes alignment in Bootstrap
                dropdownParent: $('#registerModal') // <-- parent modal ID
            });

            // Add animation delay to cards
            $('.animate-in').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
            });

            $('.table-custom tbody tr').hover(
                function() {
                    $(this).addClass('shadow-sm');
                },
                function() {
                    $(this).removeClass('shadow-sm');
                }
            );

            // Judge registration form submission
            $('#judgeRegisterForm').on('submit', function(e) {
                e.preventDefault();

                var btn = $(this);
                var originalHtml = btn.html();
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Loading...');

                setTimeout(function() {
                    btn.prop('disabled', false).html(originalHtml);
                }, 1000);
                //Show SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Register as Judge for this event?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, submit it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("Result is confirmed:"); // e.g. "Internal Server Error"

                        //Get form data
                        var formData = new FormData(this);

                        // Send AJAX request
                        $.ajax({
                            url: "<?= base_url('judge/event/register_event_judge') ?>",
                            type: 'POST',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'success') {
                                    // refresh CSRF
                                    csrfHash = response.csrfHash;
                                    // Show success message
                                    Swal.fire('Submitted!', 'Register Successfully', 'success');
                                    // Optionally, you can redirect or reset the form
                                    location.reload();
                                } else {
                                    // Show error message
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("XHR response:", xhr.responseText); // The actual server response
                                console.log("Status:", status); // e.g. "error", "timeout"
                                console.log("Error:", error); // e.g. "Internal Server Error"
                                // Handle errors
                                Swal.fire('Error!', 'There was an issue with the submission. Please try again.', 'error');
                            }
                        });
                    }
                });
            });

            // Accept/Reject functionality
            $('.accept-btn').click(function() {
                var projectId = $(this).data('id');
                var row = $(this).closest('tr');

                Swal.fire({
                    title: 'Accept Project',
                    text: 'Are you sure you want to accept this project assignment?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-check me-2"></i>Accept',
                    cancelButtonText: '<i class="fas fa-times me-2"></i>Cancel',
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.4)',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update status
                        row.find('td:nth-child(5)').html('<span class="badge bg-success">Accepted</span>');
                        row.find('td:nth-child(6)').html(`
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-primary btn-sm view-btn">
                                <i class="fas fa-eye"></i> Review
                            </a>
                        </div>
                    `);

                        Swal.fire({
                            title: 'Accepted!',
                            text: 'Project assignment has been accepted.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            background: 'rgba(255, 255, 255, 0.95)',
                        });
                    }
                });
            });

            $('.reject-btn').click(function() {
                var projectId = $(this).data('id');
                var row = $(this).closest('tr');

                Swal.fire({
                    title: 'Reject Project',
                    input: 'textarea',
                    inputPlaceholder: 'Please provide a reason for rejection...',
                    inputAttributes: {
                        'aria-label': 'Rejection reason'
                    },
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-times me-2"></i>Reject',
                    cancelButtonText: '<i class="fas fa-ban me-2"></i>Cancel',
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.4)',
                    preConfirm: (reason) => {
                        if (!reason) {
                            Swal.showValidationMessage('Please enter a reason for rejection');
                        }
                        return reason;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update status
                        row.find('td:nth-child(5)').html('<span class="badge bg-danger">Rejected</span>');
                        row.find('td:nth-child(6)').html('<span class="text-muted">No action required</span>');

                        Swal.fire({
                            title: 'Rejected!',
                            text: 'Project assignment has been rejected.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            background: 'rgba(255, 255, 255, 0.95)',
                        });
                    }
                });
            });

            // Smooth scrolling for better UX
            $('html').css('scroll-behavior', 'smooth');

            // Add loading states to buttons
            // $('.btn').on('click', function() {
            //     if (!$(this).hasClass('no-loading')) {
            //         var btn = $(this);
            //         var originalHtml = btn.html();
            //         btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Loading...');

            //         setTimeout(function() {
            //             btn.prop('disabled', false).html(originalHtml);
            //         }, 1000);
            //     }
            // });

            // Prevent loading state for certain buttons
            // $('.accept-btn, .reject-btn, [data-bs-toggle="modal"]').addClass('no-loading');
        });
    </script>