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

    <div class="content p-3">
        <div class="container-fluid">
            <div class="row">
                <!-- Info Cards Section -->
                <div class="col-lg-12 mt-3">
                    <div class="row animate-in">
                        <div class="col-md-3">
                            <div class="info-card success">
                                <div class="info-card-icon">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="info-card-title">Start Date</div>
                                <div class="info-card-value"><?= $event_info->start_date ?? 'TBA' ?></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-card danger">
                                <div class="info-card-icon">
                                    <i class="fas fa-calendar-times"></i>
                                </div>
                                <div class="info-card-title">Registration Deadline</div>
                                <div class="info-card-value"><?= $event_info->registration_deadline ?? 'TBA' ?></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-card warning">
                                <div class="info-card-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="info-card-title">End Date</div>
                                <div class="info-card-value"><?= $event_info->end_date ?? 'TBA' ?></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-card primary">
                                <div class="info-card-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="info-card-title">Participants</div>
                                <div class="info-card-value"><?= $total_participants ?? '0' ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Card -->
                <div class="col-lg-12 pt-3">
                    <div class="content-card animate-in">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">
                                <i class="fas fa-file-alt"></i>
                                Your Registered Papers
                            </h3>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Category</th>
                                                        <th>Title</th>
                                                        <th>Payment Proof</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $counter = 1;
                                                    foreach ($rpi_info as $paper): ?>
                                                        <tr id="row-<?= $paper->rpi_id ?>">
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= get_field_desc($paper->rpi_rf_id); ?></td>
                                                            <td><?= $paper->rpi_title ?></td>
                                                            <td>
                                                                <a href="<?= base_url($paper->rpi_proof_of_payment) ?>" class="btn btn-primary btn-sm" target="_blank">
                                                                    <i class="fas fa-file-pdf me-1"></i>
                                                                    View File
                                                                </a>
                                                            </td>
                                                            <td id="status-<?= $paper->rpi_id ?>">
                                                                <?php if ($paper->rpi_payment_verification == 1): ?>
                                                                    <span class="badge text-white bg-success">Payment Accepted</span>
                                                                <?php elseif ($paper->rpi_payment_verification == NULL): ?>
                                                                    <span class="badge text-white bg-warning">Pending</span>
                                                                <?php elseif ($paper->rpi_payment_verification == 0): ?>
                                                                    <span class="badge text-white bg-danger">Proof Rejected</span>
                                                                <?php else: ?>
                                                                    <span class="badge text-white bg-danger">Proof Rejected</span>
                                                                <?php endif ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($paper->rpi_payment_verification == '1' || $paper->rpi_payment_verification == '0'): ?>
                                                                    <span class="badge text-white bg-info">No Action Needed</span>
                                                                <?php else: ?>
                                                                    <div class="btn-group">
                                                                        <button class="btn btn-success btn-sm approve-btn" data-id="<?= $paper->rpi_id ?>">
                                                                            <i class="fas fa-check me-1"></i> Approve
                                                                        </button>
                                                                        <button class="btn btn-danger btn-sm reject-btn" data-id="<?= $paper->rpi_id ?>">
                                                                            <i class="fas fa-times me-1"></i> Reject
                                                                        </button>
                                                                    </div>
                                                                <?php endif ?>
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
            </div>
        </div>
    </div>

    <!-- jQuery (required for Select2 and dynamic elements) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#example1').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Search papers:",
                    lengthMenu: "Show _MENU_ papers per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ papers",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });

            // Approve button
            $('.approve-btn').click(function() {
                var paperId = $(this).data('id');
                confirmUpdate(paperId, 'Approved', 'Are you sure you want to approve this payment?');
            });

            // Function to show confirmation dialog
            function confirmUpdate(paperId, status, message) {
                Swal.fire({
                    title: "Confirmation",
                    text: message,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#10b981",
                    cancelButtonColor: "#ef4444",
                    confirmButtonText: "Yes, proceed!",
                    cancelButtonText: "Cancel",
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.4)',
                    customClass: {
                        popup: 'rounded-4 border-0 shadow-lg'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateStatus(paperId, status);
                    }
                });
            }

            // Reject button with reason input
            $('.reject-btn').click(function() {
                var paperId = $(this).data('id');

                Swal.fire({
                    title: "Reject Payment",
                    input: "textarea",
                    inputPlaceholder: "Enter reason for rejection...",
                    inputAttributes: {
                        "aria-label": "Enter reason for rejection",
                        "style": "border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px;"
                    },
                    showCancelButton: true,
                    confirmButtonColor: "#ef4444",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Reject",
                    cancelButtonText: "Cancel",
                    background: 'rgba(255, 255, 255, 0.95)',
                    backdrop: 'rgba(0, 0, 0, 0.4)',
                    customClass: {
                        popup: 'rounded-4 border-0 shadow-lg'
                    },
                    preConfirm: (reason) => {
                        if (!reason) {
                            Swal.showValidationMessage("Please enter a reason for rejection");
                        }
                        return reason;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateStatus(paperId, 'Rejected', result.value);
                    }
                });
            });

            // Function to update status via AJAX
            function updateStatus(paperId, status, reason = '') {
                let csrfName = '<?= csrf_token() ?>';
                let csrfHash = '<?= csrf_hash() ?>';

                $.ajax({
                    url: "<?= base_url('finance/research_project/update-payment-status') ?>",
                    type: "POST",
                    data: {
                        rpi_id: paperId,
                        status: status,
                        reason: reason, // Send rejection reason
                        [csrfName]: csrfHash,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            if (status === 'Approved') {
                                $('#status-' + paperId).html('<span class="badge text-white bg-success">Payment Accepted</span>');
                                $('#row-' + paperId + ' td:last-child').html('<span class="badge text-white bg-info">No Action Needed</span>');
                            } else {
                                $('#status-' + paperId).html('<span class="badge text-white bg-danger">Proof Rejected</span>');
                                $('#row-' + paperId + ' td:last-child').html('<span class="badge text-white bg-secondary">No Action Needed</span>');
                            }

                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Payment status updated successfully!",
                                timer: 2000,
                                showConfirmButton: false,
                                background: 'rgba(255, 255, 255, 0.95)',
                                backdrop: 'rgba(0, 0, 0, 0.4)',
                                customClass: {
                                    popup: 'rounded-4 border-0 shadow-lg'
                                }
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Failed to update status.",
                                background: 'rgba(255, 255, 255, 0.95)',
                                backdrop: 'rgba(0, 0, 0, 0.4)',
                                customClass: {
                                    popup: 'rounded-4 border-0 shadow-lg'
                                }
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Something went wrong!",
                            background: 'rgba(255, 255, 255, 0.95)',
                            backdrop: 'rgba(0, 0, 0, 0.4)',
                            customClass: {
                                popup: 'rounded-4 border-0 shadow-lg'
                            }
                        });
                    }
                });
            }

            // Add smooth animations on page load
            setTimeout(() => {
                $('.info-card').each(function(index) {
                    $(this).delay(index * 100).queue(function() {
                        $(this).addClass('animate-in').dequeue();
                    });
                });
            }, 200);
        });
    </script>