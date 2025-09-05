<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 (for dropdown) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 mt-3">
                <iframe src="<?= base_url($rpi->rpi_abstract) . '#toolbar=0' ?>" width="100%" height="900px" style="border-radius:1rem;"></iframe>
            </div>
            <div class="col-lg-5 mt-3">
                <div class="info-box">
                    <div class="info-box-content">
                        <h5><b><?= $rpi->rpi_title ?></b></h5>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header border-0">
                        <h3 class="card-title">Research Details</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-download"></i> </a>
                            <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-list"></i> </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($team_members as $members): ?>
                                    <tr>
                                        <td>
                                            <?= $members->rrt_name ?>
                                        </td>
                                        <td>
                                            <?= $members->rrt_role ?>
                                        </td>
                                    </tr>
                                <?PHP endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Button container aligned to the right -->
                <?php if ($rpi->rpi_status == 'Submit') : ?>

                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-success me-2" id="approveBtn">Approve</button>
                        <button class="btn btn-danger" id="returnBtn">Return</button>
                    </div>
                <?php elseif ($rpi->rpi_status == 'awaiting payment approval'): ?>
                    <div class='alert alert-warning text-center fw-bold' role='alert'>
                        Awaiting Payment Verification
                    </div>
                <?php elseif ($rpi->rpi_status == 'Payment Approved'): ?>
                    <div class='alert alert-warning text-center fw-bold' role='alert'>
                        Please Assign Reviewer for this Participant
                    </div>
                    <form id="assignReviewerForm">
                        <div class="mb-3">
                            <label for="judges" class="form-label">Select Reviewer</label>
                            <select class="form-control select2" id="judges" name="judges" required>
                                <option value="">Select reviewer</option>
                                <?php foreach ($judges_list as $judge): ?>
                                    <option value="<?= $judge->ui_au_id; ?>"><?= $judge->ui_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign Reviewer</button>
                    </form>
                <?php elseif ($rpi->rpi_status == 'Awaiting Reviewer Acceptance'): ?>
                    <div class='alert alert-warning text-center fw-bold' role='alert'>
                        Awaiting Reviewer Acceptance
                    </div>
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-light p-2 m-2">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <span class="text-muted small">Current Reviewer</span>
                                    <h4 class="mb-0 font-weight-bold"><?= $judge_name->ui_name ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="button" class="btn btn-warning" id="showReassignForm">
                        Reassign Reviewer
                    </button>

                    <!-- Hidden form (Initially hidden) -->
                    <div id="reAssignReviewerContainer" style="display: none; margin-top: 20px;">
                        <form id="reAssignReviewerForm">
                            <div class="mb-3">
                                <label for="judges" class="form-label">Change Reviewer</label>
                                <select class="form-control select2" id="judges" name="judges" required>
                                    <option value="">Select reviewer</option>
                                    <?php foreach ($judges_list as $judge): ?>
                                        <option value="<?= $judge->ui_au_id; ?>"><?= $judge->ui_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                <?php else: ?>
                    <?php if ($rpi->rpi_status === 'approved'): ?>
                        <div class='alert alert-primary text-center fw-bold' role='alert'>
                            Project Has been Approved By Admin
                        </div>
                    <?php else : ?>
                        <div class='alert alert-danger text-center fw-bold' role='alert'>
                            Project Has been Return By Admin
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        // Admin Approve User Abstract
        $("#approveBtn").click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to approve this submission.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Sending AJAX request...');

                    $.ajax({
                        url: "<?= site_url('superAdmin/review/update_status') ?>",
                        type: "POST",
                        data: {
                            id: "<?= $rpi->rpi_id ?>",
                            status: "approved"
                        },
                        success: function(response) {
                            console.log('Success:', response);
                            Swal.fire("Approved!", "The submission has been approved.", "success")
                                .then(() => location.reload());
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            console.log('Full Response:', xhr.responseText); // Log the full response
                            Swal.fire("Error!", "Something went wrong: " + xhr.responseText, "error");
                        }
                    });
                }
            });
        });

        // Admin Reject User Abstract
        $("#returnBtn").click(function() {
            Swal.fire({
                title: "Enter return remarks",
                input: "textarea",
                inputPlaceholder: "Enter your reason...",
                showCancelButton: true,
                confirmButtonText: "Submit",
                cancelButtonText: "Cancel",
                preConfirm: (remarks) => {
                    if (!remarks) {
                        Swal.showValidationMessage("Remarks are required!");
                    }
                    return remarks;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('superAdmin/review/update_status') ?>",
                        type: "POST",
                        data: {
                            id: "<?= $rpi->rpi_id ?>",
                            status: "returned",
                            remarks: result.value
                        },
                        success: function(response) {
                            Swal.fire("Returned!", "The submission has been returned.", "info")
                                .then(() => location.reload());
                        }
                    });
                }
            });
        });

        // Admin Assign Reviewer
        $("#assignReviewerForm").submit(function(e) {
            e.preventDefault();

            let reviewerId = $("#judges").val();
            if (!reviewerId) {
                Swal.fire("Error", "Please select a reviewer", "error");
                return;
            }

            $.ajax({
                url: "<?= base_url('superAdmin/review/assign_reviewer') ?>", // Your Controller URL
                type: "POST",
                data: {
                    reviewer_id: reviewerId
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire("Success!", response.message, "success")
                            .then(() => location.reload());
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }
                },
                error: function(xhr) {
                    Swal.fire("Error", "Something went wrong!", "error");
                }
            });
        });

        // Show form when button is clicked
        $("#showReassignForm").click(function() {
            $("#reAssignReviewerContainer").toggle(); // Toggle visibility
        });

        // ReAssign Reviewer
        $("#reAssignReviewerForm").submit(function(e) {
            e.preventDefault();

            let reviewerId = $("#judges").val();
            if (!reviewerId) {
                Swal.fire("Error", "Please select a reviewer", "error");
                return;
            }

            $.ajax({
                url: "<?= base_url('superAdmin/review/assign_reviewer') ?>", // Your Controller URL
                type: "POST",
                data: {
                    reviewer_id: reviewerId
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire("Success!", response.message, "success")
                            .then(() => location.reload());
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }
                },
                error: function(xhr) {
                    Swal.fire("Error", "Something went wrong!", "error");
                }
            });
        });
    });
</script>