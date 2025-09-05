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
    .timeline {
        margin: 0 !important;
    }

    .card-header .card-tools {
        margin-left: auto;
        /* Pushes the button to the right */
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }
</style>
<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <!-- PDF full paper / turnitin report Viewer -->
            <div class="col-lg-7 mt-3">
                <div class="card card-outline card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="fas fa-file-pdf mr-2"></i> <span id="report-title">Full Paper</span>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-secondary" id="toggle-report">
                                View Turnitin Report
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <iframe id="report-viewer" src="<?= base_url($rpi_info->rpi_full_paper) . '#toolbar=0' ?>" width="100%" height="800px" style="border: none; border-radius: 0 0 0.25rem 0.25rem;"></iframe>
                    </div>
                </div>
            </div>

            <!-- Research Information and Review Actions -->
            <div class="col-lg-5 mt-3">
                <!-- Research Title -->
                <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fas fa-microscope"></i></span>
                    <div class="info-box-content">
                        <h5 class="text-dark"><b><?= $rpi_info->rpi_title ?></b></h5>
                        <span class="info-box-text text-dark">
                            <i class="fas fa-calendar-alt mr-1"></i> Submission ID: <?= $rpi_info->rpi_id ?? 'N/A' ?>
                        </span>
                    </div>
                </div>

                <!-- Research Team Information -->
                <div class="card card-outline card-primary mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users mr-2"></i>Research Team
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#researchTeamBody" aria-expanded="true" aria-controls="reviewHistoryBody">
                                <i class="fas fa-chevron-up toggle-icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="researchTeamBody">
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
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </di>
                    </div>
                </div>

                <!-- Review Feedback Section -->
                <?php if ($rpi_info->rpi_status == 'Minor Correction' || $rpi_info->rpi_status == 'Major Correction'): ?>
                    <!-- Past Comments Section -->
                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-history mr-2"></i> Review History
                            </h3>
                        </div>
                        <div class="card-body">
                            <?php if (empty($remarks)): ?>
                                <div class="text-center py-3">
                                    <i class="fas fa-info-circle text-muted mr-1"></i> No review comments found.
                                </div>
                            <?php else: ?>
                                <!-- Timeline -->
                                <div class="timeline">
                                    <?php foreach ($remarks as $remark): ?>
                                        <!-- Timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-primary">
                                                <?= date('d M Y', strtotime($remark->rpr_created_at)); ?>
                                            </span>
                                        </div>
                                        <!-- Timeline item -->
                                        <div>
                                            <i class="fas fa-comment bg-info" style="left: 25px; position: relative;"></i>
                                            <div class="timeline-item">
                                                <span class="time">
                                                    <i class="far fa-clock"></i> <?= date('h:i A', strtotime($remark->rpr_created_at)); ?>
                                                </span>
                                                <h3 class="timeline-header">
                                                    <strong><?= $remark->ui_name; ?></strong>
                                                </h3>
                                                <div class="timeline-body">
                                                    <?= nl2br(trim($remark->rpr_remarks)); ?>
                                                </div>
                                                <div class="timeline-footer">
                                                    <span class="badge bg-<?= ($rpi_info->rpi_status == 'Minor Correction') ? 'warning' : 'danger'; ?> text-white">
                                                        <?= $rpi_info->rpi_status; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!-- End marker -->
                                    <div>
                                        <i class="far fa-clock bg-gray" style="left: 25px; position: relative;"></i>
                                    </div>
                                </div>
                                <!-- End timeline -->
                            <?php endif; ?>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Past Comments Section -->
                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-history mr-2"></i> Review History
                            </h3>
                            <?php if (!empty($remarks)): ?>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#reviewHistoryBody" aria-expanded="true" aria-controls="reviewHistoryBody">
                                        <i class="fas fa-chevron-up toggle-icon"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body collapse show" id="reviewHistoryBody">
                            <?php if (empty($remarks)): ?>
                                <div class="text-center py-3">
                                    <i class="fas fa-info-circle text-muted mr-1"></i> No review comments found.
                                </div>
                            <?php else: ?>
                                <!-- Timeline -->
                                <div class="timeline">
                                    <?php foreach ($remarks as $remark): ?>
                                        <!-- Timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-secondary text-white">
                                                <?= date('d M Y', strtotime($remark->rpr_created_at)); ?>
                                            </span>
                                        </div>
                                        <!-- Timeline item -->
                                        <div>
                                            <i class="fas fa-comment bg-warning" style="left: 15px;position: relative;border-radius: 30px;padding: 10px;"></i>
                                            <div class="timeline-item">
                                                <span class="time">
                                                    <i class="far fa-clock"></i> <?= date('h:i A', strtotime($remark->rpr_created_at)); ?>
                                                </span>
                                                <h3 class="timeline-header">
                                                    <strong><?= $remark->ui_name; ?></strong>
                                                </h3>
                                                <div class="timeline-body">
                                                    <?= nl2br(trim($remark->rpr_remarks)); ?>
                                                </div>
                                                <div class="timeline-footer">
                                                    <span class="badge bg-<?= ($rpi_info->rpi_status == 'Minor Correction') ? 'warning' : 'danger'; ?> text-white">
                                                        <?= $rpi_info->rpi_status; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!-- End marker -->
                                    <div>
                                        <i class="far fa-clock bg-warning" style="left: 15px;position: relative;border-radius: 30px;padding: 10px;"></i>
                                    </div>
                                </div>
                                <!-- End timeline -->
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- New Review Form -->
                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-clipboard-check mr-2"></i> Submit Review
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="review-status">
                                    <i class="fas fa-check-circle mr-1"></i> Review Status:
                                </label>
                                <select class="form-control" id="review-status">
                                    <option value="">-- Select Status --</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Minor Correction">Minor Correction</option>
                                    <option value="Major Correction">Major Correction</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="review-comments">
                                    <i class="fas fa-comments mr-1"></i> Reviewer Comments:
                                </label>
                                <textarea class="form-control" id="review-comments" rows="4"
                                    placeholder="Write your detailed feedback here..."></textarea>
                                <small class="form-text text-muted">
                                    <i class="fas fa-info-circle mr-1"></i> Please provide specific comments to help the research team improve their work.
                                </small>
                            </div>

                            <button class="btn btn-primary btn-lg w-100 mt-3" id="submit-review">
                                <i class="fas fa-paper-plane mr-2"></i> Submit Review
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let toggleBtn = document.getElementById('toggle-report');
        let iframe = document.getElementById('report-viewer');
        let title = document.getElementById('report-title');
        let submitBtn = document.getElementById('submit-review');

        // ✅ Ensure elements exist before adding event listeners
        if (toggleBtn && iframe && title) {
            toggleBtn.addEventListener('click', function() {
                if (iframe.src.includes("<?= base_url($rpi_info->rpi_full_paper) ?>")) {
                    iframe.src = "<?= base_url($rpi_info->rpi_turnitin_report) . '#toolbar=0' ?>";
                    title.innerText = "Turnitin Report";
                    toggleBtn.innerText = "View Full Paper";
                } else {
                    iframe.src = "<?= base_url($rpi_info->rpi_full_paper) . '#toolbar=0' ?>";
                    title.innerText = "Full Paper";
                    toggleBtn.innerText = "View Turnitin Report";
                }
            });
        } else {
            console.warn("Toggle report elements not found. Ensure IDs match.");
        }

        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                let csrfName = '<?= csrf_token() ?>';
                let csrfHash = '<?= csrf_hash() ?>';
                let comments = document.getElementById('review-comments')?.value.trim();
                let status = document.getElementById('review-status')?.value.trim();

                if (!comments || !status) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Incomplete Submission',
                        text: 'Please provide your comments and select a review status before submitting.',
                        confirmButtonColor: '#3085d6',
                    });
                    return;
                }

                Swal.fire({
                    title: 'Confirm Submission',
                    text: 'Are you sure you want to submit your review?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('judge/review/submit-review') ?>", // Change this to your actual backend route
                            type: "POST",
                            data: {
                                review_comments: comments,
                                review_status: status,
                                submission_id: "<?= $rpi_info->rpi_id ?>", // Passing the submission ID
                                [csrfName]: csrfHash,
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Review Submitted',
                                        text: 'Your review has been successfully submitted.',
                                        confirmButtonColor: '#3085d6',
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Submission Failed',
                                        text: response.message || 'Unexpected error occurred.',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", status, error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Something went wrong. Please try again later.',
                                });
                            }
                        });
                    }
                });
            });
        } else {
            console.warn("Submit review button not found. Ensure ID matches.");
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.querySelector('[data-bs-toggle="collapse"]');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-minus');
                icon.classList.toggle('fa-plus');
            });
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>