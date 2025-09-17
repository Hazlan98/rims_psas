<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    :root {
        --primary-color: #0a4275;
        --primary-hover: #0d3c66;
        --accent-color: #3474b4;
        --neutral-light: #f2f5f8;
        --neutral-dark: #78849e;
        --border-color: #e2e8f0;
        --danger-color: #dc3545;
        --warning-color: #f59e0b;
    }

    body {
        background-color: #f0f2f5;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        color: #2d3748;
        line-height: 1.5;
    }

    .app-container {
        max-width: 1280px;
        margin: 0 auto;
        background-color: transparent;
    }

    .app-header {
        background-color: white;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .app-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .app-subtitle {
        color: var(--neutral-dark);
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .card {
        background-color: white;
        border: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border-radius: 0.5rem;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--border-color);
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .card-title i {
        margin-right: 0.5rem;
        color: var(--accent-color);
        font-size: 1.125rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        font-size: 0.875rem;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 1px solid var(--border-color);
        border-radius: 0.375rem;
        padding: 0.625rem 0.875rem;
        font-size: 0.875rem;
        color: #2d3748;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 116, 180, 0.15);
    }

    .document-container {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        background-color: var(--neutral-light);
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }

    .document-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: var(--primary-color);
        font-size: 0.875rem;
        font-weight: 500;
        flex-grow: 1;
    }

    .document-link i {
        margin-right: 0.5rem;
        font-size: 1rem;
        color: var(--accent-color);
    }

    .btn-upload {
        width: 100%;
        background-color: white;
        border: 1px dashed var(--border-color);
        color: var(--neutral-dark);
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 0.375rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .btn-upload i {
        margin-right: 0.5rem;
    }

    .btn-upload:hover {
        background-color: var(--neutral-light);
        border-color: var(--accent-color);
        color: var(--accent-color);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 0.375rem;
    }

    .btn-primary:hover {
        background-color: var(--primary-hover);
    }

    .btn-warning {
        background-color: var(--warning-color);
        border: none;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 0.375rem;
    }

    .btn-danger {
        background-color: var(--danger-color);
        border: none;
        padding: 0.5rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.75rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }

    .comment-item {
        padding: 1rem;
        border-left: 3px solid var(--accent-color);
        background-color: var(--neutral-light);
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .comment-author {
        font-weight: 600;
        font-size: 0.875rem;
        color: var(--primary-color);
        display: flex;
        align-items: center;
    }

    .comment-author i {
        margin-right: 0.375rem;
        color: var(--accent-color);
    }

    .comment-date {
        font-size: 0.75rem;
        color: var(--neutral-dark);
    }

    .comment-body {
        font-size: 0.875rem;
        color: #4a5568;
    }

    .no-comments {
        text-align: center;
        padding: 2rem;
        color: var(--neutral-dark);
        font-style: italic;
        font-size: 0.875rem;
    }

    /* For good spacing on mobile */
    @media (max-width: 768px) {
        .app-container {
            padding: 0 1rem;
        }

        .card-body {
            padding: 1.25rem;
        }
    }
</style>

<div class="content p-4">
    <!-- <div class="app-header">
        <h1 class="app-title">Research Project Management</h1>
        <p class="app-subtitle">Project ID: RPM-2023-<?= $rpi_info->rpi_id ?? '001' ?></p>
    </div> -->

    <div class="row">
        <!-- Form Section (Left) -->
        <div class="col-lg-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-edit"></i> Update Research Project
                    </h2>
                </div>
                <div class="card-body">
                    <form id="updateForm" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-4">
                            <label for="project_link" class="form-label">Project Presentation Link</label>
                            <input type="url" class="form-control" id="project_link" name="project_link"
                                value="<?= !empty($rpi_info->rpi_presentation_link) ? $rpi_info->rpi_presentation_link : '' ?>"
                                placeholder="Enter URL to presentation" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Turnitin Report</label>
                            <?php if (!empty($rpi_info->rpi_turnitin_report)): ?>
                                <div class="document-container">
                                    <a href="<?= base_url($rpi_info->rpi_turnitin_report) ?>" target="_blank" class="document-link">
                                        <i class="fas fa-file-pdf"></i> Turnitin Report
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm deleteFile" data-type="turnitin_report">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            <?php else: ?>
                                <label for="turnitin_report" class="btn-upload">
                                    <input type="file" class="form-control file-input-hidden" id="turnitin_report" name="turnitin_report">
                                </label>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Full Report</label>
                            <?php if (!empty($rpi_info->rpi_full_paper)): ?>
                                <div class="document-container">
                                    <a href="<?= base_url($rpi_info->rpi_full_paper) ?>" target="_blank" class="document-link">
                                        <i class="fas fa-file-pdf"></i> Full Report
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm deleteFile" data-type="full_report">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            <?php else: ?>
                                <label for="full_report" class="btn-upload">
                                    <input type="file" class="form-control file-input-hidden" id="full_report" name="full_report">
                                </label>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Proof of Payment</label>
                            <?php if (!empty($rpi_info->rpi_proof_of_payment)): ?>
                                <div class="document-container">
                                    <a href="<?= base_url($rpi_info->rpi_proof_of_payment) ?>" target="_blank" class="document-link">
                                        <i class="fas fa-receipt"></i> Proof of Payment
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm deleteFile" data-type="proof_of_payment">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            <?php else: ?>
                                <label for="proofOfPayment" class="btn-upload">
                                    <input type="file" class="form-control file-input-hidden" id="proofOfPayment" name="proof_of_payment" accept=".pdf, .jpg, .jpeg, .png">
                                </label>
                            <?php endif; ?>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning" id="draftBtn">
                                <i class="fas fa-save"></i> Save Draft
                            </button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-check"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Comments Section (Right) -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-comments"></i> Admin Feedback
                    </h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($admin_comments)): ?>
                        <div class="comments-container">
                            <?php foreach ($admin_comments as $comment): ?>
                                <div class="comment-item">
                                    <div class="comment-header">
                                        <span class="comment-author">
                                            <i class="fas fa-user-shield"></i> <?= $comment->ui_name ?>
                                        </span>
                                        <span class="comment-date">
                                            <?= date('d M Y H:i', strtotime($comment->rpr_created_at)) ?>
                                        </span>
                                    </div>
                                    <div class="comment-body">
                                        <?= $comment->rpr_remarks ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="no-comments">
                            <i class="fas fa-info-circle"></i> No admin feedback available
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // CSRF token initialization
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

        // Delete file handler
        $(document).on("click", ".deleteFile", function() {
            let fileType = $(this).data("type"); // abstract or payment
            let button = $(this);

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/research_project/delete-file') ?>",
                        type: "POST",
                        data: {
                            [csrfName]: csrfHash,
                            fileType: fileType
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire("Deleted!", response.message, "success");
                                button.closest("div").html('<input type="file" class="form-control" name="' + fileType + '" required>');
                                // Update CSRF token after request
                                csrfName = response.csrfName;
                                csrfHash = response.csrfHash;

                                // Update CSRF token in form
                                $("#updateForm input[name='<?= csrf_token() ?>']").val(csrfHash);
                            } else {
                                Swal.fire("Error!", response.message, "error");
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


<!-- Submission Function -->
<script>
    $(document).ready(function() {
        // Handle form submission
        $("#updateForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to submit this research project?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, submit it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm("<?= base_url('participant/research_project/update_full_researh_project') ?>");
                }
            });
        });

        // Handle draft button click
        $("#draftBtn").click(function() {
            Swal.fire({
                title: "Save as Draft?",
                text: "Your progress will be saved as a draft.",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#ffc107",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Save as Draft"
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm("<?= base_url('participant/research_project/draft_full_research_project') ?>");
                }
            });
        });

        function submitForm(url) {
            var formData = new FormData($("#updateForm")[0]); // Get form data

            $.ajax({
                url: url, // CI4 Controller
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    $("#uploadStatus").html('<p class="text-info">Processing...</p>');
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            window.location.href = '<?= base_url("participant/research_project/rp_details"); ?>';
                            // $("#uploadForm")[0].reset(); // Reset form
                            // $("#uploadModal").modal("hide"); // Close modal
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred: " + error,
                        icon: "error"
                    });
                }
            });
        }
    });
</script>