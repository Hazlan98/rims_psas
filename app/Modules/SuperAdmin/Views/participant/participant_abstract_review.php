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
            <!-- PDF Abstract Viewer -->
            <div class="col-lg-7 mt-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-file-pdf mr-2"></i>Abstract Preview
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <iframe src="<?= base_url($rpi->rpi_abstract) . '#toolbar=0' ?>" width="100%" height="800px" style="border: none; border-radius: 0 0 0.25rem 0.25rem;"></iframe>
                    </div>
                </div>
            </div>

            <!-- Research Information and Review Actions -->
            <div class="col-lg-5 mt-3">
                <!-- Research Title -->
                <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fas fa-microscope"></i></span>
                    <div class="info-box-content">
                        <h5 class="text-dark"><b><?= $rpi->rpi_title ?></b></h5>
                        <span class="info-box-text text-dark">
                            <i class="fas fa-calendar-alt mr-1"></i> Submission ID: <?= $rpi->rpi_id ?? 'N/A' ?>
                        </span>
                    </div>
                </div>

                <!-- Research Team Information -->
                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users mr-2"></i>Research Team
                        </h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th><i class="fas fa-user mr-1"></i> Name</th>
                                    <th><i class="fas fa-briefcase mr-1"></i> Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($team_members as $members): ?>
                                    <tr>
                                        <td>
                                            <span class="font-weight-medium"><?= $members->rrt_name ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary text-white"><?= $members->rrt_role ?></span>
                                        </td>
                                    </tr>
                                <?PHP endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Status Based Content -->
                <?php if ($rpi->rpi_status == 'Submit') : ?>
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info-circle"></i> Review Required</h5>
                        <p>This research project requires your review. Please approve or return with comments.</p>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-success mr-2" id="approveBtn">
                            <i class="fas fa-check mr-1"></i> Approve
                        </button>
                        <button class="btn btn-danger" id="returnBtn">
                            <i class="fas fa-undo mr-1"></i> Return for Revision
                        </button>
                    </div>

                <?php elseif ($rpi->rpi_status == 'awaiting payment approval'): ?>
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-exclamation-triangle"></i> Payment Pending</h5>
                        <p>This submission is awaiting payment verification before proceeding.</p>
                    </div>

                <?php elseif ($rpi->rpi_status == 'Payment Approved'): ?>
                    <div class="callout callout-info">
                        <h5><i class="fas fa-user-check"></i> Reviewer Assignment</h5>
                        <p>Payment has been verified. Please assign a reviewer to evaluate this research.</p>
                    </div>
                    <br>
                    <form id="assignReviewerForm" class="card card-outline card-primary">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judge1">Reviewer 1</label>
                                <select class="form-control select2" id="judge1" name="judge1" required>
                                    <option value="">-- Choose Reviewer 1 --</option>
                                    <?php foreach ($judges_list as $judge): ?>
                                        <option value="<?= $judge->ui_au_id; ?>"><?= $judge->ui_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="judge2">Reviewer 2</label>
                                <select class="form-control select2" id="judge2" name="judge2" required>
                                    <option value="">-- Choose Reviewer 2 --</option>
                                    <?php foreach ($judges_list as $judge): ?>
                                        <option value="<?= $judge->ui_au_id; ?>"><?= $judge->ui_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-user-plus mr-1"></i> Assign Reviewer
                            </button>
                        </div>
                    </form>

                <?php elseif ($rpi->rpi_status == 'Awaiting Reviewer Acceptance'): ?>
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-clock"></i> Pending Acceptance</h5>
                        <p>A reviewer has been assigned and we're waiting for their acceptance.</p>
                    </div>
                    <br>

                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-check mr-2"></i>Assigned Reviewer
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="bg-gradient-primary text-white rounded-circle p-3" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                                <div>
                                    <?php if (!empty($judge_name)): ?>
                                        <?php foreach ($judge_name as $judge): ?>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="mr-3">
                                                    <div class="bg-gradient-primary text-white rounded-circle p-3"
                                                        style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fas fa-user-graduate"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="text-muted">Reviewer</span>
                                                    <h4 class="mb-0 font-weight-bold"><?= $judge['name'] ?></h4>
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar-alt mr-1"></i> Assigned: <?= date('M d, Y') ?>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No reviewers assigned yet.</p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-warning btn-block" id="showReassignForm">
                        <i class="fas fa-exchange-alt mr-1"></i> Reassign Reviewer
                    </button>

                    <!-- Hidden form (Initially hidden) -->
                    <div id="reAssignReviewerContainer" style="display: none;" class="mt-3 card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Reassign Reviewer</h3>
                        </div>
                        <div class="card-body">
                            <form id="reAssignReviewerForm">
                                <?= csrf_field() ?>

                                <!-- Reviewer to Replace -->
                                <div class="form-group">
                                    <label for="reviewer_to_replace">
                                        <i class="fas fa-user-minus mr-1"></i> Select Reviewer to Replace
                                    </label>
                                    <select class="form-control select2" id="reviewer_to_replace" name="reviewer_to_replace" required>
                                        <option value="">-- Choose reviewer to replace --</option>
                                        <?php foreach ($judge_name as $judge): ?>
                                            <option value="<?= $judge['id']; ?>"><?= $judge['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- New Reviewer -->
                                <div class="form-group mt-3">
                                    <label for="new_reviewer">
                                        <i class="fas fa-user-plus mr-1"></i> Select New Reviewer
                                    </label>
                                    <select class="form-control select2" id="new_reviewer" name="new_reviewer" required>
                                        <option value="0">-- Choose a new reviewer --</option>

                                        <?php foreach ($judges_list as $judge): ?>
                                            <option value="<?= $judge->ui_au_id; ?>"><?= $judge->ui_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-save mr-1"></i> Confirm Reassignment
                                </button>
                            </form>

                        </div>
                    </div>

                <?php else: ?>
                    <?php if ($rpi->rpi_status === 'approved'): ?>
                        <div class="callout callout-success">
                            <h5><i class="fas fa-check-circle"></i> Project Approved</h5>
                            <p>This research project has been reviewed and approved by the administration.</p>
                            <span class="badge bg-success text-white p-2">
                                <i class="fas fa-check-double mr-1"></i> APPROVED
                            </span>
                        </div>
                    <?php else : ?>
                        <div class="callout callout-danger">
                            <h5><i class="fas fa-times-circle"></i> Revision Required</h5>
                            <p>This research project has been returned by the administration for revision.</p>
                            <span class="badge bg-danger text-white p-2">
                                <i class="fas fa-undo-alt mr-1"></i> RETURNED
                            </span>
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

        $('.select2').select2({
            placeholder: "Select a reviewer",
            width: '100%'
        });

        // Admin Approve User Abstract
        $("#approveBtn").click(function() {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';
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
                            status: "approved",
                            [csrfName]: csrfHash,
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
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';
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
                            remarks: result.value,
                            [csrfName]: csrfHash,
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

            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            let reviewer1 = $("#judge1").val();
            let reviewer2 = $("#judge2").val();

            if (!reviewer1 || !reviewer2) {
                Swal.fire("Error", "Please select both reviewers", "error");
                return;
            }
            if (reviewer1 === reviewer2) {
                Swal.fire("Error", "Reviewer 1 and Reviewer 2 must be different", "error");
                return;
            }

            $.ajax({
                url: "<?= base_url('superAdmin/review/assign_reviewer') ?>", // Your Controller URL
                type: "POST",
                data: {
                    paper_id: "<?= $rpi->rpi_id ?>",
                    reviewer1: reviewer1,
                    reviewer2: reviewer2,
                    [csrfName]: csrfHash,
                },
                dataType: "json",
                success: function(response) {

                    // 🔑 Refresh CSRF Token if sent back by server
                    if (response.csrfToken) {
                        $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);
                    }

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

            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            let reviewerToReplace = $("#reviewer_to_replace").val();
            let newReviewer = $("#new_reviewer").val();
            let rpiId = "<?= $rpi->rpi_id ?>"; // assuming you have a hidden input for this
            console.log(rpiId);

            if (!reviewerToReplace || !newReviewer) {
                console.log("One of the reviewers is empty", {
                    reviewerToReplace: reviewerToReplace,
                    newReviewer: newReviewer
                });

                Swal.fire("Error", "Please select both reviewers", "error");
                return;
            }

            $.ajax({
                url: "<?= base_url('superAdmin/review/reassign_reviewer') ?>",
                type: "POST",
                data: {
                    reviewer_to_replace: reviewerToReplace,
                    new_reviewer: newReviewer,
                    rpi_id: rpiId,
                    [csrfName]: csrfHash
                },
                dataType: "json",
                beforeSend: function() {
                    console.log("Sending data:", {
                        reviewer_to_replace: reviewerToReplace,
                        new_reviewer: newReviewer,
                        rpi_id: rpiId,
                        [csrfName]: csrfHash
                    });
                },
                success: function(response) {
                    console.log("Response received:", response);

                    if (response.status === "success") {
                        Swal.fire("Success!", response.message, "success")
                            .then(() => location.reload());
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }

                    // 🔄 Refresh CSRF hash after every response
                    if (response.csrf_token) {
                        csrfHash = response.csrf_token;
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", {
                        status: status,
                        error: error,
                        responseText: xhr.responseText
                    });
                    Swal.fire("Error", "Something went wrong!", "error");
                }
            });

        });


    });
</script>