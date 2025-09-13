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

<div class="container py-4">
    <!-- Event Header -->
    <div class="event-header">
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
    </div>

    <!-- Event Metrics -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="info-card bg-success bg-opacity-10 text-success">
                <div class="info-card-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="info-card-title">Start Date</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_start_date)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-danger bg-opacity-10 text-danger">
                <div class="info-card-icon">
                    <i class="fas fa-hourglass-end"></i>
                </div>
                <div class="info-card-title">Registration Deadline</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_registration_deadline)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-warning bg-opacity-10 text-warning">
                <div class="info-card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="info-card-title">End Date</div>
                <div class="info-card-value"><?= date("d M Y", strtotime($research_events->re_end_date)) ?></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="info-card bg-primary bg-opacity-10 text-primary">
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
                            <select class="form-control select2" id="projectField" name="projectField" required>
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
                        <select class="form-control select2" id="teamLeader" name="teamLeader" required>
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


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('#newResearchModal')
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
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Research paper submitted successfully!",
                            }).then(() => {
                                location.reload(); // Reload to reset form
                            });
                        },
                        error: function(xhr, status, error) {
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