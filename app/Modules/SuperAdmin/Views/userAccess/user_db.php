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
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%); */
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

    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-card animate-in">
                        <div class="card-header">
                            <h5>
                                <i class="fas fa-users"></i>
                                User Management
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover table-custom">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>User Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user_info as $user) : ?>
                                            <tr id="row-<?= $user->ui_au_id ?>">
                                                <td><?= esc($user->ui_name) ?></td>
                                                <td><?= esc($user->ui_email) ?></td>
                                                <td>0<?= esc($user->ui_phone_number) ?></td>
                                                <td><?= esc($user->ui_address) ?></td>
                                                <td id="role-<?= $user->ui_au_id ?>">
                                                    <?php $role = get_user_role($user->ui_au_id); ?>
                                                    <?php if (empty($role) || $role == "No Role"): ?>
                                                        No Role
                                                    <?php else: ?>
                                                        <?= $role ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="action-buttons">
                                                    <button class="btn btn-sm btn-outline-primary assign-role" data-user="<?= $user->ui_au_id ?>" title="Assign Role">
                                                        <i class="fas fa-user-tag"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger remove-role" data-user="<?= $user->ui_au_id ?>" title="Remove Role">
                                                        <i class="fas fa-user-slash"></i>
                                                    </button>
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
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModalLabel">
                        <i class="fas fa-user-tag"></i>Assign Role to User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="assignRoleForm" method="POST" action="<?= site_url('superAdmin/userAccess/assignRole') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="mb-3">
                            <label for="role" class="form-label">Select Role</label>
                            <select id="role" name="role" class="form-select">
                                    <option value=""> --Please Select Role-- </option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role->ag_id ?>"><?= esc($role->ag_name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-corporate-primary">
                                <i class="fas fa-save me-1"></i> Assign Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (required for Select2 and dynamic elements) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            // Initialize DataTable
            $('#userTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ users",
                    infoEmpty: "Showing 0 to 0 of 0 users",
                    infoFiltered: "(filtered from _MAX_ total users)",
                    zeroRecords: "No matching users found",
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
                order: [[0, 'asc']],
                paging: true, // Change this based on your PHP condition
                pageLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });

            // Open the modal and set the user ID
            $(".assign-role").click(function() {
                let userId = $(this).data("user");
                $("#user_id").val(userId);
                $("#roleModal").modal("show");
            });

            // Handle Assign Role Form Submission
            $("#assignRoleForm").submit(function(e) {

                e.preventDefault();
                let userId = $("#user_id").val();
                let roleId = $("#role").val();

                // Client-side validation
                if (!userId) {
                    Swal.fire({
                        title: "Error",
                        text: "User ID is missing",
                        icon: "error",
                        confirmButtonColor: "#6366f1"
                    });
                    return;
                }

                if (!roleId) {
                    Swal.fire({
                        title: "Error", 
                        text: "Please select a role",
                        icon: "error",
                        confirmButtonColor: "#6366f1"
                    });
                    return;
                }

                $.ajax({
                    url: "<?= site_url('superAdmin/userAccess/assignRole') ?>",
                    type: "POST",
                    data: {
                        user_id: userId,
                        role_id: roleId,
                        [csrfName]: csrfHash,
                    },
                    success: function(response) {
                        // refresh CSRF
                        csrfHash = response.csrfHash;

                        $("#roleModal").modal("hide");
                        $("#role-" + userId).html(response.updated_role);
                        Swal.fire({
                            title: "Success",
                            text: "Role assigned successfully!",
                            icon: "success",
                            confirmButtonColor: "#6366f1"
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("XHR:", xhr.responseText);
                        console.log("Status:", status);
                        console.log("Error:", error);
                        Swal.fire({
                            title: "Error",
                            text: "Failed to assign role.",
                            icon: "error"
                        });
                    }

                });
            });

            // Handle Remove Role Button Click
            $(".remove-role").click(function() {
                let userId = $(this).data("user");

                Swal.fire({
                    title: "Are you sure?",
                    text: "This will remove the user's role.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, remove it!",
                    cancelButtonText: "Cancel",
                    confirmButtonColor: "#6366f1",
                    cancelButtonColor: "#6c757d"
                }).then((result) => {
                    if (result.isConfirmed) {
                       
                        $.ajax({
                            url: "<?= site_url('superAdmin/userAccess/removeRole') ?>",
                            type: "POST",
                            data: {
                                user_id: userId,
                                [csrfName]: csrfHash,
                            },
                            success: function(response) {
                                // refresh CSRF
                                csrfHash = response.csrfHash;
                                $("#role-" + userId).html('<span class="badge bg-secondary text-white">No Role</span>');

                                Swal.fire({
                                    title: "Success",
                                    text: "Role removed successfully!",
                                    icon: "success",
                                    confirmButtonColor: "#6366f1"
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    title: "Error",
                                    text: "Failed to remove role.",
                                    icon: "error",
                                    confirmButtonColor: "#6366f1"
                                });
                            }
                        });
                    }
                });
            });

            $('#role').select2({
                placeholder: "Select a role",
                allowClear: true,
                width: '100%', // fixes alignment in Bootstrap
                dropdownParent: $('#roleModal') // <-- parent modal ID
            });
            // Add smooth animations to table rows
            $('.table-custom tbody tr').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
                $(this).addClass('animate-in');
            });

            // Add hover effects to badges
            $('.badge').hover(
                function() {
                    $(this).css('transform', 'scale(1.05)');
                },
                function() {
                    $(this).css('transform', 'scale(1)');
                }
            );
        });

        // // Add loading state to buttons
        // function addLoadingState(button) {
        //     let originalHtml = button.html();
        //     button.html('<i class="fas fa-spinner fa-spin me-1"></i> Loading...');
        //     button.prop('disabled', true);
            
        //     setTimeout(() => {
        //         button.html(originalHtml);
        //         button.prop('disabled', false);
        //     }, 2000);
        // }

        // // Enhanced button interactions
        // $('.btn').on('click', function() {
        //     if (!$(this).hasClass('btn-close')) {
        //         addLoadingState($(this));
        //     }
        // });
    </script>