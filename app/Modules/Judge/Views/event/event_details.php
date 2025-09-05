<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 (for dropdown) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Custom CSS -->
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .event-header {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 24px;
    }

    .event-banner {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .event-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .event-details {
        padding: 20px;
    }

    .event-name {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 12px;
        color: #2c3e50;
    }

    .info-card {
        border-radius: 8px;
        padding: 20px;
        height: 100%;
        transition: transform 0.2s;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    .info-card-icon {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .info-card-title {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.7;
    }

    .info-card-value {
        font-size: 20px;
        font-weight: 600;
    }

    .content-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 24px;
    }

    .card-header {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .card-header h5 {
        font-weight: 600;
        margin: 0;
        color: #2c3e50;
    }

    .btn-custom-primary {
        background-color: #3498db;
        color: white;
        border: none;
    }

    .btn-custom-danger {
        background-color: #e74c3c;
        color: white;
        border: none;
    }

    .modal-header {
        background-color: #3498db;
        color: white;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
        border-color: #ced4da;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px;
    }

    /* DataTables Styling */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 15px;
    }

    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 15px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #3498db !important;
        color: white !important;
        border: 1px solid #3498db !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #2980b9 !important;
        color: white !important;
        border: 1px solid #2980b9 !important;
    }

    .dataTables_filter input {
        padding: 6px 10px;
        border-radius: 4px;
        border: 1px solid #ced4da;
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

        <div class="col-lg-12 pt-3">

            <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>
                        <i class="fas fa-tags me-2 text-primary"></i>
                        List of assigned project:
                    </h5>
                    <button type="button" class="btn btn-sm btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="fas fa-plus me-1"></i> Register
                    </button>
                </div>

                <div class="card-body">
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

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
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
                                                                    <button class="btn btn-success btn-sm accept-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </button>
                                                                    <button class="btn btn-danger btn-sm reject-btn" data-id="<?= $rpi->rpi_id ?>">
                                                                        <i class="fas fa-times"></i> Reject
                                                                    </button>
                                                                </div>
                                                            <?php elseif ($rpi->rpi_status == 'Awaiting Review' || $rpi->rpi_status == 'Major Correction' || $rpi->rpi_status == 'Minor Correction' || $rpi->rpi_status == 'Correction Draft'): ?>
                                                                <div class="btn-group">
                                                                    <a href="<?= base_url('judge/review/get-review-full-paper/') . $rpi->rpi_id ?>" class="btn btn-info btn-sm view-btn">
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

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addField">Add Field to Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="judgeRegisterForm">
                    <?= csrf_field() ?>
                    <input name="rj_re_id" value="<?= $event_info->re_id ?>" hidden>
                    <div class="row mb-3">
                        <label for="eventField" class="form-label">Event Field</label>
                        <select class="form-control select2" id="eventField" name="rj_rf_id">
                            <option value="">-- Select Field to Add --</option>
                            <?php foreach ($rims_field as $field): ?>
                                <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    //Prevent form submission and use AJAX with SweetAlert confirmation
    $('#judgeRegisterForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

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
                //Get form data
                var formData = new FormData(this);

                // Send AJAX request
                $.ajax({
                    url: "<?= base_url('judge/event/register_event_judge') ?>",
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
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
                        // Handle errors
                        Swal.fire('Error!', 'There was an issue with the submission. Please try again.', 'error');
                    }
                });
            }
        });
    });
</script>

<!-- Function to Accept/Reject Admin Assignment -->
<script>
    $(document).ready(function() {
        // Approve button
        $('.accept-btn').click(function() {
            var rpiId = $(this).data('id');
            confirmUpdate(rpiId, 'Accepted', 'Are you sure you want to accept the assignment?');
        });

        // Function to show confirmation dialog
        function confirmUpdate(rpiId, status, message) {
            Swal.fire({
                title: "Confirmation",
                text: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Yes, proceed!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateStatus(rpiId, status);
                }
            });
        }

        // Reject button
        $('.reject-btn').click(function() {
            var rpiId = $(this).data('id');

            Swal.fire({
                title: "Reject Payment",
                input: "textarea",
                inputPlaceholder: "Enter reason for rejection...",
                inputAttributes: {
                    "aria-label": "Enter reason for rejection"
                },
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Reject",
                cancelButtonText: "Cancel",
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage("Please enter a reason for rejection");
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    updateStatus(rpiId, 'Rejected', result.value);
                }
            });
        });

        // Function to update status via AJAX
        function updateStatus(rpiId, status, reason = '') {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            $.ajax({
                url: "<?= base_url('judge/review/update-review-status') ?>",
                type: "POST",
                data: {
                    rpi_id: rpiId,
                    status: status,
                    reason: reason, // Send rejection reason
                    [csrfName]: csrfHash,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $('#status-' + rpiId).text(status);
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Payment status updated successfully!",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to update status.",
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong!",
                    });
                }
            });
        }
    });
</script>