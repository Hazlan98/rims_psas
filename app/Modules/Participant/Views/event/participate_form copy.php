<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 (for dropdown) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* Override the Select2 container */
    .select2-container {
        width: 100% !important;
    }

    /* Override the Select2 input */
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
        /* Match Bootstrap's input height */
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
        line-height: 1.5 !important;
        /* Match Bootstrap's line height */
        border-radius: 0.375rem !important;
        /* Match Bootstrap's border radius */
        border: 1px solid #ced4da !important;
        /* Match Bootstrap's border color */
        background-color: #fff !important;
        /* Match Bootstrap's background color */
    }

    /* Override Select2 dropdown */
    .select2-container .select2-dropdown {
        border-radius: 0.375rem !important;
        /* Match Bootstrap's border radius */
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        /* Match Bootstrap's shadow */
        border: 1px solid #ced4da !important;
        /* Match Bootstrap's border color */
    }

    /* Override Select2 search box */
    .select2-container .select2-search--dropdown .select2-search__field {
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's input padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
    }

    /* Option styling for Select2 */
    .select2-container .select2-results__option {
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
    }

    /* Hover effect for options */
    .select2-container .select2-results__option--highlighted {
        background-color: rgb(168, 211, 255) !important;
        /* Match Bootstrap's hover background */
    }
</style>

<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <img src="<?= base_url('uploads/events/' . $research_events->re_banner_image) ?>" alt="Icon" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                    </span>

                    <div class="info-box-content">
                        <h5><b><?= $research_events->re_name ?></b></h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <span class="info-box-text"><strong>Contact:</strong> <?= $research_events->re_contact_email ?></span>
                            <span class="info-box-text"><strong>Location:</strong> <?= $research_events->re_location ?></span>
                        </div>
                        <span class="info-box-number"><?= $research_events->re_description ?></span>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box text-bg-success">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Start Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_start_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-danger">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Registration Deadline</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_registration_deadline)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-warning">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">End Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_end_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-primary">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Participant</span>
                                <span class="info-box-number"><?= $research_participant_count ?>/<?= $research_events->re_max_participants ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 pt-3">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Your Registered Paper</h3>
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                            Register Form
                        </button>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button class="btn btn-secondary">Copy</button>
                                        <button class="btn btn-secondary">CSV</button>
                                        <button class="btn btn-secondary">Excel</button>
                                        <button class="btn btn-secondary">PDF</button>
                                        <button class="btn btn-secondary">Print</button>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination mb-0">
                                            <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="paginate_button page-item next"><a href="#" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
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
                                                            <?php if ($paper->rpi_submitted_at == null): ?>
                                                                <a href="<?= base_url('participant/research_project/get-rpi-update-form/') . $paper->rpi_id ?>" class="btn btn-warning btn-sm update-btn">
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

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- New Registration Modal -->
<div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newResearchModalLabel">Submit New Research Paper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Inside Modal -->
                <form action="<?= base_url('participant/research/submit-research-paper') ?>" method="post" enctype="multipart/form-data" id="newRegistrationForm">

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
                        <button type="button" class="btn btn-success" id="addMember">Add Another</button>
                    </div>

                    <!-- New Selection Input -->
                    <div class="mb-3">
                        <label for="teamLeader" class="form-label">Select Presenter</label>
                        <select class="form-control select2" id="teamLeader" name="teamLeader" required>
                            <option value="">Select a Team Member</option>
                        </select>
                    </div>

                    <!-- Admin Bank Details -->
                    <!-- <div class="mb-3 p-3 border rounded bg-light">
                        <h5 class="mb-2">Admin Bank Details</h5>
                        <p><strong>Account Name:</strong> ABC Research Conference</p>
                        <p><strong>Bank Name:</strong> XYZ Bank</p>
                        <p><strong>Account Number:</strong> 123-456-789</p>
                    </div> -->

                    <!-- Proof of Payment Upload -->
                    <!-- <div class="mb-3">
                        <label for="proofOfPayment" class="form-label">Upload Proof of Payment (PDF/Image)</label>
                        <input type="file" class="form-control" id="proofOfPayment" name="proofOfPayment" accept=".pdf, .jpg, .jpeg, .png" required>
                    </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="saveDraft">Save</button>
                        <button type="submit" class="btn btn-primary">Submit Paper</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
                <button type="button" class="btn btn-danger remove-member">Remove</button>
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