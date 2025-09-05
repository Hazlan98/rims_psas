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
    .corporate-form .card {
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
    }

    .corporate-form .card-header {
        border-bottom: 1px solid #e9ecef;
        padding: 1rem 1.5rem;
    }

    .corporate-form .card-body {
        padding: 1.5rem;
    }

    .corporate-form .form-label {
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        color: #495057;
    }

    .corporate-form .form-control,
    .corporate-form .form-select {
        border-radius: 4px;
        padding: 0.5rem 0.75rem;
        border-color: #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .corporate-form .form-control:focus,
    .corporate-form .form-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .corporate-form .input-group-text {
        background-color: #f8f9fa;
        border-color: #ced4da;
    }

    .corporate-form .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .corporate-form .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .corporate-form small.text-muted {
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: block;
    }

    .corporate-form .form-control-lg {
        font-size: 1.1rem;
    }
</style>
<div class="container py-4">

    <div class="row">
        <div class="col-lg-12">
            <div class="content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>
                        <i class="fas fa-user-check me-2 text-primary"></i>
                        Registered Events
                    </h5>
                    <button type="button" class="btn btn-primary btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                        <i class="fas fa-plus me-1"></i>Add Event
                    </button>
                </div>
                <div class="card-body p-2">
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
                                                <a href="javascript:void(0);" class="btn btn-danger delete-event" data-id="<?= $event->re_id ?>"><i class="fas fa-trash"></i></a>
                                            </div>
                                            <!-- <button class="btn btn-sm btn-warning">Edit</button> -->
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
                <form method="post" enctype="multipart/form-data" id="newResearchForm" class="corporate-form">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true,
            "autoWidth": false
        });
    });
</script>



<script>
    // Submit New Event
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
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
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
                        // Handle errors
                        Swal.fire('Error!', 'There was an issue with the submission. Please try again.', 'error');
                    }
                });
            }
        });
    });

    // Delete Event
    $(document).ready(function() {
        $(document).on('click', '.delete-event', function(e) {
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
    });
</script>