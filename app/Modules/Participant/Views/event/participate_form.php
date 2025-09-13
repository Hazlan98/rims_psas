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
    
    <!-- Modern Glassmorphism Styles -->
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
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
            /* border-radius: 16px; */
            overflow: hidden;
            /* box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); */
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
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

        /* DataTables Custom Styling */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 2px solid var(--glass-border);
            border-radius: 12px;
            padding: 8px 12px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* Select2 Styling */
        .select2-container .select2-selection--single {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 28px;
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

            .particles { display: none; }
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
                <img src="<?= base_url('uploads/events/') . $research_events->re_banner_image ?>" alt="Event Banner">
            </div>
            <div class="event-details">
                <h1 class="event-name"><?= $research_events->re_name ?></h1>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-envelope-open text-primary me-2"></i>
                            <span><strong>Contact:</strong> <?= $research_events->re_contact_email ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <span><strong>Location:</strong> <?= $research_events->re_location ?></span>
                        </div>
                    </div>
                </div>
                <p class="text-muted"><?= $research_events->re_description ?></p>
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
                    <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_start_date)) ?></div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="info-card bg-danger bg-opacity-10 text-white">
                    <div class="info-card-icon">
                        <i class="fas fa-hourglass-end"></i>
                    </div>
                    <div class="info-card-title">Registration Deadline</div>
                    <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_registration_deadline)) ?></div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="info-card bg-warning bg-opacity-10 text-white">
                    <div class="info-card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="info-card-title">End Date</div>
                    <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_end_date)) ?></div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="info-card bg-info bg-opacity-10 text-white">
                    <div class="info-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="info-card-title">Participants</div>
                    <div class="info-card-value">0/<?= $research_events->re_max_participants ?></div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="content-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="fas fa-user-check me-2 text-primary"></i>
                            Registered Participants
                        </h5>
                        <button type="button" class="btn btn-primary btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                            <i class="fas fa-plus me-1"></i>Register Form
                        </button>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table id="participantTable" class="table table-hover table-custom">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Abstract</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;
                                    foreach ($research_papers as $paper): ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= get_field_desc($paper->rpi_rf_id); ?></td>
                                            <td><?= $paper->rpi_title ?></td>
                                            <td><a href="<?= base_url($paper->rpi_abstract) ?>" target="_blank" class="btn btn-info btn-sm">Abstract</td>
                                            <td>
                                                <?php if (!empty($paper->rpi_proof_of_payment)): ?>
                                                    <a href="<?= base_url($paper->rpi_proof_of_payment) ?>" target="_blank" class="btn btn-info btn-sm">Payment</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= get_rims_participant_status($paper->rpi_status) ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('participant/research_project/get_rp_details/') . $paper->rpi_id ?>" class="btn btn-info btn-sm view-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <?php if ($paper->rpi_submitted_at == null || $paper->rpi_status == 'returned'): ?>
                                                        <a href="<?= base_url('participant/research_project/get-rp-update-form/') . $paper->rpi_id ?>" class="btn btn-warning btn-sm update-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($paper->rpi_status == 'Draft'): ?>
                                                        <button data-id="<?= $paper->rpi_id; ?>" class="btn btn-danger btn-sm delete-btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Registration Modal -->
<div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newResearchModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>
                    Submit New Research Paper
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Inside Modal -->
                <form action="<?= base_url('participant/research/submit-research-paper') ?>" method="POST" enctype="multipart/form-data" id="newRegistrationForm">
                    <?= csrf_field() ?>

                    <input type="text" class="form-control" id="rp_event_id" name="rp_event_id" value="<?= $rp_event_id ?>" hidden>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="projectTitle" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
                        </div>
                        <div class="col-md-6">
                            <label for="projectField" class="form-label">Project Field</label><br>
                            <select class="form-control" id="projectField" name="projectField" required>
                                <option value="">Select Field</option>
                                <?php foreach ($research_field as $field): ?>
                                    <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="paperFile" class="form-label">Upload Project Abstract (PDF)</label>
                        <input type="file" class="form-control" id="paperFile" name="paperFile" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Team Members</label>
                        <div id="teamContainer">
                            <div class="input-group mb-2 team-member">
                                <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                                <button type="button" class="btn btn-danger remove-member" style="display:none;">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-custom-normal" id="addMember">
                            <i class="fas fa-user-plus"></i>Add Another</button>
                    </div>

                    <!-- New Selection Input -->
                    <div class="mb-3">
                        <label for="teamLeader" class="form-label">Select Presenter</label>
                        <select class="form-control" id="teamLeader" name="teamLeader" required>
                            <option value="">Select a Team Member</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-custom-danger" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Close
                        </button>

                        <button type="button" class="btn btn-custom-warning" id="saveDraft">
                            <i class="fas fa-file-alt me-1"></i> Save Draft
                        </button>

                        <button type="submit" class="btn btn-custom-primary">
                            <i class="fas fa-paper-plane me-1"></i> Submit
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (required for Select2 and dynamic elements) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Helper function for status color -->
<script>
    // Initialize DataTables and Select2
    $(document).ready(function() {
        // Initialize participant table with DataTables
        $('#participantTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search participations...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ participations",
                infoEmpty: "Showing 0 to 0 of 0 participations",
                infoFiltered: "(filtered from _MAX_ total participations)",
                zeroRecords: "No matching participations found",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            order: [
                [0, 'asc']
            ], // Default sort by the first column
            // Only add pagination if there are enough entries
            paging: <?= (count($research_papers) > 10) ? 'true' : 'false' ?>,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });

        // Initialize Select2
        $('#projectField').select2({
            placeholder: "Select Field",
            allowClear: true,
            width: '100%', // fixes alignment in Bootstrap
            dropdownParent: $('#newResearchModal') // <-- parent modal ID
        });
        $('#teamLeader').select2({
            placeholder: "Select Field",
            allowClear: true,
            width: '100%', // fixes alignment in Bootstrap
            dropdownParent: $('#newResearchModal') // <-- parent modal ID
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof jQuery === 'undefined') {
            console.error("jQuery is not loaded. Make sure to include it before running this script.");
            return;
        }

        $('.select2').select2({
            placeholder: 'Select Category',
            allowClear: true,
            dropdownParent: $('#newResearchModal') // Specify the modal as the parent for the Select2 dropdown
        });

    });
</script>
<!-- JavaScript to Update Selection List -->
<script>
    $(document).ready(function() {
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

        // Function to update the Presentor dropdown
        function updateTeamLeaderOptions() {
            let teamLeaderSelect = $("#teamLeader");
            teamLeaderSelect.empty();
            teamLeaderSelect.append('<option value="">Select a Team Member</option>');

            $(".team-member input[name='teamMembers[]']").each(function() {
                let memberName = $(this).val();
                if (memberName.trim() !== "") {
                    teamLeaderSelect.append('<option value="' + memberName + '">' + memberName + '</option>');
                }
            });
        }

        // Add new team member input
        $("#addMember").click(function() {
            let newMember = `
            <div class="input-group mb-2 team-member">
                <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                <button type="button" class="btn btn-danger remove-member"><i class="fas fa-user-minus"></i></button>
            </div>
            `;
            $("#teamContainer").append(newMember);
            updateTeamLeaderOptions();
        });

        // Remove team member
        $(document).on("click", ".remove-member", function() {
            $(this).closest(".team-member").remove();
            updateTeamLeaderOptions();
        });

        // Update dropdown when typing
        $(document).on("keyup", ".team-member input[name='teamMembers[]']", function() {
            updateTeamLeaderOptions();
        });

        // AJAX Form Submission
        $("#newRegistrationForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to submit the research paper?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, submit it!",
                cancelButtonText: "No, cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData(this);

                    $.ajax({
                        url: "<?= base_url('participant/event/submit-participation-form') ?>", // Your controller endpoint
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Submitting...",
                                text: "Please wait",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            // refresh CSRF
                            csrfHash = response.csrfHash;
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Research paper submitted successfully!",
                            }).then(() => {
                                location.reload(); // Reload to reset form
                            });
                        },
                        error: function(xhr, status, error) {
                            try {
                                let res = JSON.parse(xhr.responseText);
                                if (res.csrfHash) {
                                    csrfHash = res.csrfHash; // always update globally
                                }
                            } catch (e) {
                                // ignore if not JSON
                            }
                            Swal.fire({
                                icon: "error",
                                title: "Submission Failed",
                                text: xhr.responseText || "Something went wrong!",
                            });
                        },
                    });
                }
            });
        });

        // AJAX Save Draft
        $("#saveDraft").click(function(event) {
            event.preventDefault(); // Prevent default behavior

            let formData = new FormData($("#newRegistrationForm")[0]);
            formData.append("is_draft", "1"); // Flag for draft submission

            Swal.fire({
                title: "Save as Draft?",
                text: "You can edit and submit later.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Save!",
                cancelButtonText: "No, Cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/event/save-participation-form-draft') ?>", // Draft save endpoint
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Saving...",
                                text: "Please wait",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Saved!",
                                text: "Your research paper is saved as a draft.",
                            }).then(() => {
                                location.reload(); // Reload to reset form
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "Save Failed",
                                text: xhr.responseText || "Something went wrong!",
                            });
                        },
                    });
                }
            });
        });

    });
</script>

<!-- Script to delete Draft Project -->
<script>
    //Remove event Field
    $(document).on('click', '.delete-btn', function() {
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';
        let id = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('participant/event/delete_draft_participation/') ?>" + id,
                    type: "DELETE",
                    data: {
                        id: id,
                        [csrfName]: csrfHash,
                    },
                    success: function(response) {
                        Swal.fire("Deleted!", response.message, "success");
                        location.reload();
                    },
                    error: function() {
                        Swal.fire("Error!", "Failed to delete record.", "error");
                    }
                });
            }
        });
    });
</script>