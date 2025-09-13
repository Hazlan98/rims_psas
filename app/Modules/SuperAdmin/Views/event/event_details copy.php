<!-- Hazlan Custom Template -->
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/event.css'); ?>">
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

<style>
    #fieldsTable_filter {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }

    #fieldsTable_filter input {
        width: auto !important;
        max-width: 150px;
        /* Adjust this value as needed */
    }
</style>
<div class="container py-4">
    <!-- Event Header -->
    <div class="event-header">
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
    </div>

    <!-- Event Metrics -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="info-card bg-success bg-opacity-10 text-success">
                <div class="info-card-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="info-card-title">Start Date</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_start_date)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-danger bg-opacity-10 text-danger">
                <div class="info-card-icon">
                    <i class="fas fa-hourglass-end"></i>
                </div>
                <div class="info-card-title">Registration Deadline</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_registration_deadline)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-warning bg-opacity-10 text-warning">
                <div class="info-card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="info-card-title">End Date</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($event_info->re_end_date)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-primary bg-opacity-10 text-primary">
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
                        <i class="fas fa-user-check me-2 text-primary"></i>
                        Registered Participants
                    </h5>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="participantTable" class="table table-hover table-custom">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Category</th>
                                    <th width="20%">Title</th>
                                    <th width="15%">Abstract</th>
                                    <th width="15%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($registered_participant)): ?>

                                    <?php $counter = 1;
                                    foreach ($registered_participant as $participant): ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= get_field_desc($participant->rpi_rf_id); ?></td>
                                            <td><?= $participant->rpi_title ?></td>
                                            <td>
                                                <a href="<?= base_url($participant->rpi_abstract) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="fas fa-file-alt me-1"></i> View
                                                </a>
                                            </td>
                                            <td>
                                                <?= get_rims_admin_status($participant->rpi_status) ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('superAdmin/participant/get-participation-data/') . $participant->rpi_id ?>" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Fields -->
        <div class="col-lg-3 mb-4">
            <div class="content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>
                        <i class="fas fa-tags me-2 text-primary"></i>
                        Event Fields
                    </h5>
                    <button type="button" class="btn btn-sm btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addField">
                        <i class="fas fa-plus me-1"></i> Add
                    </button>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table id="fieldsTable" class="table table-hover table-custom">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($event_field)): ?>
                                    <?php foreach ($event_field as $field): ?>
                                        <tr>
                                            <td><?= $field->rf_desc; ?></td>
                                            <td>
                                                <button data-id="<?= $field->ref_id; ?>" class="btn btn-sm btn-custom-danger delete-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Field Modal -->
<div class="modal fade" id="addField" tabindex="-1" aria-labelledby="addFieldLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFieldLabel">
                    <i class="fas fa-plus-circle me-2"></i>
                    Add Field to Event
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="addFieldForm">
                    <?= csrf_field() ?>
                    <input name="ref_re_id" value="<?= $event_info->re_id ?>" hidden>
                    <div class="mb-3">
                        <label for="eventField" class="form-label">Select Field</label>
                        <select class="form-select select2" id="eventField" name="ref_rf_id">
                            <option value="">-- Select Field to Add --</option>
                            <?php foreach ($rims_field as $field): ?>
                                <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-custom-primary">
                            <i class="fas fa-save me-1"></i> Save Field
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
            paging: <?= (count($registered_participant) > 10) ? 'true' : 'false' ?>,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });

        // Initialize fields table with DataTables
        $('#fieldsTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search fields...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ / _TOTAL_",
                infoEmpty: "Showing 0 to 0 of 0 fields",
                infoFiltered: "(filtered from _MAX_ total fields)",
                zeroRecords: "No matching fields found",
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
            paging: <?= (count($event_field) > 10) ? 'true' : 'false' ?>,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });

        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('#addField')
        });

        // Add Field Form Submission
        $(document).on('submit', '#addFieldForm', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to add this field to the event?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, add it',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData(this);
                    $.ajax({
                        url: "<?= base_url('superAdmin/event/add_event_field') ?>",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Event field has been added.',
                                    icon: 'success',
                                    confirmButtonColor: '#3498db'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message,
                                    icon: 'error',
                                    confirmButtonColor: '#3498db'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an issue with the submission. Please try again.',
                                icon: 'error',
                                confirmButtonColor: '#3498db'
                            });
                        }
                    });
                }
            });
        });

        // Delete Event Field
        $(document).on('click', '.delete-btn', function() {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';
            let id = $(this).data('id');

            Swal.fire({
                title: "Remove Field?",
                text: "This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e74c3c",
                cancelButtonColor: "#3498db",
                confirmButtonText: "Yes, remove it",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('superAdmin/event/remove_event_fields/') ?>" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            [csrfName]: csrfHash,
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Removed!",
                                text: "The field has been removed successfully.",
                                icon: "success",
                                confirmButtonColor: "#3498db"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error!",
                                text: "Failed to remove the field.",
                                icon: "error",
                                confirmButtonColor: "#3498db"
                            });
                        }
                    });
                }
            });
        });
    });
</script>