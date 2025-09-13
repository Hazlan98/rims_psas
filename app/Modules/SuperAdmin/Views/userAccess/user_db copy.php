<!-- Hazlan Custom Template -->
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/modal.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/button.css'); ?>">

<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 CSS and JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 (for dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 CSS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>
                        <i class="fas fa-users me-2"></i>
                        User Management
                    </h5>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="userTable" class="table table-hover table-custom">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user me-2"></i>Name</th>
                                    <th><i class="fas fa-envelope me-2"></i>E-mail</th>
                                    <th><i class="fas fa-phone me-2"></i>Phone</th>
                                    <th><i class="fas fa-map-marker-alt me-2"></i>Address</th>
                                    <th><i class="fas fa-id-badge me-2"></i>User Role</th>
                                    <th><i class="fas fa-cogs me-2"></i>Actions</th>
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
                                                <span class="badge bg-secondary text-white">No Role</span>
                                            <?php else: ?>
                                                <?= $role ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="action-buttons">
                                            <button class="btn btn-sm btn-outline-primary assign-role me-1" data-user="<?= $user->ui_au_id ?>" title="Assign Role">
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
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel"><i class="fas fa-user-tag me-2"></i>Assign Role to User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assignRoleForm">
                    <?= csrf_field() ?>
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select id="role" name="role" class="form-select">
                            <option value="">Select a Role</option>
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

<script>
    $(document).ready(function() {
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
            order: [
                [0, 'asc']
            ], // Default sort by the first column
            // Only add pagination if there are enough entries
            paging: <?= (count($user_info) > 10) ? 'true' : 'false' ?>,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
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
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            if (!roleId) {
                Swal.fire({
                    title: "Error",
                    text: "Please select a role",
                    icon: "error"
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
                    $("#roleModal").modal("hide");

                    // Update role in table with proper styling
                    let roleHtml = '<span class="badge bg-info text-white">' + response.updated_role + '</span>';
                    $("#role-" + userId).html(roleHtml);

                    Swal.fire({
                        title: "Success",
                        text: "Role assigned successfully!",
                        icon: "success",
                        confirmButtonColor: "#0a4275"
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error",
                        text: "Failed to assign role.",
                        icon: "error",
                        confirmButtonColor: "#0a4275"
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
                confirmButtonColor: "#0a4275",
                cancelButtonColor: "#6c757d"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('superAdmin/userAccess/removeRole') ?>",
                        type: "POST",
                        data: {
                            user_id: userId
                        },
                        success: function(response) {
                            // Update role in table with proper styling
                            $("#role-" + userId).html('<span class="badge bg-secondary text-white">No Role</span>');

                            Swal.fire({
                                title: "Success",
                                text: "Role removed successfully!",
                                icon: "success",
                                confirmButtonColor: "#0a4275"
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error",
                                text: "Failed to remove role.",
                                icon: "error",
                                confirmButtonColor: "#0a4275"
                            });
                        }
                    });
                }
            });
        });
    });
</script>