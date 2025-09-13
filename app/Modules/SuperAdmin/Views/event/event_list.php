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
        }

        .content-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .content-card:hover {
            /* transform: translateY(-5px); */
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            /* padding: 30px; */
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
        }

        .card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
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
            padding: 30px;
        }

        /* Table Styles */
        /* .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        } */

        .table-custom {
            margin: 0;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .table-custom thead th {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            /* padding: 20px 15px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.5px; */
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
        }

        .bg-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--accent), #0891b2) !important;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
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
            padding: 8px 12px;
            font-size: 0.75rem;
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

        .btn-outline-danger {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            color: var(--error);
            border: 2px solid var(--error);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }

        .btn-outline-danger:hover {
            background: var(--error);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268);
            color: white;
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(108, 117, 125, 0.4);
        }

        .btn-corporate-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-corporate-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
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
            line-height: 1 !important;
            font-size: 0.9rem !important;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: white;
        }

        .form-control {
            line-height: 1 !important;
            font-size: 0.9rem !important;
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

        /* .dataTables_wrapper .dataTables_paginate .paginate_button {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 2px solid var(--glass-border);
            border-radius: 12px;
            margin: 0 2px;
            padding: 8px 12px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--primary);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white !important;
        } */

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

            .card-header,
            .card-body {
                padding: 20px;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 12px 8px;
                font-size: 0.85rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 6px;
            }

            .particles { display: none; }
        }

        @media (max-width: 480px) {
            .content {
                padding: 15px 10px;
            }

            .card-header,
            .card-body {
                padding: 15px;
            }

            .card-header h5 {
                font-size: 1.2rem;
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

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-card animate-in">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>
                                <i class="fas fa-user-check me-2 text-primary"></i>
                                Registered Events
                            </h5>
                            <button type="button" class="btn btn-primary btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                                <i class="fas fa-plus me-1"></i>Add Event
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover table-custom">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Participant</th>
                                            <th>Registration Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($events as $event) : ?>
                                            <tr>
                                                <td><?= esc($event->re_name) ?></td>
                                                <td><?= get_category_desc($event->re_rc_id) ?></td>
                                                <td><?= esc($event->re_start_date) ?> - <?= esc($event->re_end_date) ?></td>
                                                <td>0/<?= esc($event->re_max_participants) ?></td>
                                                <td><?= esc($event->re_registration_deadline) ?></td>
                                                <td><?= esc($event->re_status) ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('superAdmin/event/get_event_details/') . $event->re_id ?>" class="btn btn-info btn-sm view-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm delete-event" data-id="<?= $event->re_id ?>"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newResearchModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>
                        Submit New Event
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Inside Modal -->
                    <form method="POST" enctype="multipart/form-data" id="newResearchForm" class="corporate-form">
                        <?= csrf_field() ?>

                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Event Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="eventName" class="form-label fw-bold">Event Name</label>
                                        <input type="text" class="form-control form-control-lg" id="eventName" name="re_name" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="maxParticipants" class="form-label fw-bold">Maximum Participants</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                            <input type="number" class="form-control" id="maxParticipants" name="re_max_participants" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="eventLocation" class="form-label fw-bold">Event Location</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                            <input type="text" class="form-control" id="eventLocation" name="re_location">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="eventCategory" class="form-label fw-bold">Event Category</label>
                                        <select class="form-select" id="eventCategory" name="re_category">
                                            <option value="">-- Select Category --</option>
                                            <?php foreach ($event_category as $category): ?>
                                                <option value="<?= $category->rc_id ?>"><?= $category->rc_desc ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Timeline</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="startDate" class="form-label fw-bold">Start Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                            <input type="date" class="form-control" id="startDate" name="re_start_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="endDate" class="form-label fw-bold">End Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                                            <input type="date" class="form-control" id="endDate" name="re_end_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="registrationDeadline" class="form-label fw-bold">Registration Deadline</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-x"></i></span>
                                            <input type="date" class="form-control" id="registrationDeadline" name="re_registration_deadline">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Additional Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="eventDescription" class="form-label fw-bold">Event Description</label>
                                    <textarea class="form-control" id="eventDescription" name="re_description" rows="4"></textarea>
                                    <small class="text-muted">Please provide a detailed description of the event including key discussion points and objectives.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="eventOrganizer" class="form-label fw-bold">Event Organizer</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" class="form-control" id="eventOrganizer" name="re_organizer" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="bannerImage" class="form-label fw-bold">Banner Image</label>
                                    <input type="file" class="form-control" id="bannerImage" name="re_banner_image" accept="image/*">
                                    <small class="text-muted">Recommended size: 1200x400 pixels. Max file size: 2MB.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="contactEmail" class="form-label fw-bold">Contact Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" id="contactEmail" name="re_contact_email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Submit Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            $('#eventCategory').select2({
                placeholder: "Select Category",
                allowClear: true,
                width: '100%', // fixes alignment in Bootstrap
                dropdownParent: $('#newResearchModal') // <-- parent modal ID
            });

            // Initialize DataTable with custom styling
            $('#example1').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                     '<"row"<"col-sm-12"tr>>' +
                     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search events...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>'
                    }
                }
            });

            // Add animation to table rows
            $('.table-custom tbody tr').each(function(index) {
                $(this).css('animation-delay', (index * 50) + 'ms');
                $(this).addClass('animate-in');
            });

            // Enhanced button hover effects
            $('.btn').hover(
                function() {
                    $(this).addClass('shadow-lg');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );

            //Prevent form submission and use AJAX with SweetAlert confirmation
            $('#newResearchForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                //Show SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to submit this event?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, submit it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Get form data
                        var formData = new FormData(this);

                        // Send AJAX request
                        $.ajax({
                            url: "<?= base_url('superAdmin/event/submit_event') ?>",
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
                                    Swal.fire('Submitted!', 'Your event has been submitted successfully.', 'success');
                                    // Optionally, you can redirect or reset the form
                                    location.reload();
                                } else {
                                    // Show error message
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("XHR response:", xhr.responseText); // The actual server response
                                console.log("Status:", status);                 // e.g. "error", "timeout"
                                console.log("Error:", error);                   // e.g. "Internal Server Error"
                                Swal.fire('Error!', 'There was an issue with the submission. Please try again.', 'error');
                            }

                        });
                    }
                });
            });


            // Delete event functionality
            $('.delete-event').on('click', function(e) {
                e.preventDefault();

            let eventId = $(this).data('id');
            let deleteBtn = $(this);

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
                        url: "<?= base_url('superAdmin/event/delete_event/') ?>" + eventId,
                        type: "POST",
                        data: {
                            id: eventId,
                            "<?= csrf_token() ?>": $('input[name="<?= csrf_token() ?>"]').val() // Send CSRF token
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire("Deleted!", response.message, "success");

                                // Remove the deleted row
                                deleteBtn.closest('tr').fadeOut(500, function() {
                                    $(this).remove();
                                });

                                // Update CSRF token
                                $('input[name="<?= csrf_token() ?>"]').val(response.csrf_token);
                            } else {
                                Swal.fire("Error!", response.message, "error");

                                // Update CSRF token even if failed
                                $('input[name="<?= csrf_token() ?>"]').val(response.csrf_token);
                            }
                        },
                        error: function() {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
            });

            // Enhanced modal animations
            $('#newResearchModal').on('show.bs.modal', function() {
                $(this).find('.modal-content').addClass('animate-in');
            });

            // Form field animations
            $('.form-control, .form-select').on('focus', function() {
                $(this).parent().addClass('focused');
            }).on('blur', function() {
                if ($(this).val() === '') {
                    $(this).parent().removeClass('focused');
                }
            });

            // Add floating labels effect
            $('.form-control, .form-select').each(function() {
                if ($(this).val() !== '') {
                    $(this).parent().addClass('focused');
                }
            });

            // Smooth scrolling for any anchor links
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                const target = $(this.getAttribute('href'));
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 600);
                }
            });

            // Initialize tooltips if Bootstrap tooltips are being used
            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            // Add smooth loading animation for the entire page
            setTimeout(function() {
                $('body').addClass('loaded');
            }, 100);
        });

        // Add page loaded class for final animations
        $(window).on('load', function() {
            $('body').addClass('fully-loaded');
        });
    </script>