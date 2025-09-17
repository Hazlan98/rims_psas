    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Hazlan Custom Template -->
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/table.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">
    <!-- Modern Glassmorphism Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/glassmorphism.css'); ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Particles Background -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="content-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar-check"></i>
                                Project Details
                            </h5>
                            <!-- Project Status (Now in Badge) -->
                            <?php
                            $status_classes = [
                                'approved' => 'bg-success text-white',
                                'Draft' => 'bg-warning text-dark',
                                'Full Report Draft' => 'bg-info text-white',
                                'Minor Correction' => 'bg-primary text-white',
                                'Major Correction' => 'bg-danger text-white',
                                'rejected' => 'bg-danger text-white',
                                'pending' => 'bg-secondary text-white',
                                'Payment Approved' => 'bg-info text-white'
                            ];
                            $status_class = isset($status_classes[$rpi_info->rpi_status]) ? $status_classes[$rpi_info->rpi_status] : 'bg-secondary text-white';
                            ?>
                            <div class="badge <?= $status_class ?> m-0  ms-auto">
                                <i class="fas fa-circle me-1"></i> Status: <?= ucfirst($rpi_info->rpi_status) ?>
                            </div>
                        </div>
                        <!-- <form> -->
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- Left Section -->
                                <div class="col-lg-6 border-end border-light">
                                    <h6 class="section-title">Basic Information</h6>

                                    <div class="mb-4">
                                        <label class="form-label">
                                            Research / Project Title
                                        </label>
                                        <input type="text" class="form-control bg-light" id="rpi_title" name="rpi_title" value="<?= $rpi_info->rpi_title ?>" readonly>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">
                                            Project Field
                                        </label>
                                        <input type="text" class="form-control bg-light" id="rpi_rf_id" name="rpi_rf_id" value="<?= get_field_desc($rpi_info->rpi_rf_id) ?>" readonly>
                                    </div>

                                    <h6 class="section-title mt-5">Project Documents</h6>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Abstract
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_abstract)): ?>
                                                <div class="document-container">
                                                    <a href="<?= base_url($rpi_info->rpi_abstract) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                        <i class="fas fa-file-pdf"></i>
                                                        <span>View Abstract</span>
                                                        <i class="fas fa-external-link-alt ms-auto"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <div class="no-document-alert">
                                                    <i class="fas fa-file-alt"></i>
                                                    <p>No abstract uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($rpi_info->rpi_full_paper): ?>
                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Payment Proof
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_proof_of_payment)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_proof_of_payment) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                            <span>View Payment Proof</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No payment proof uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- check if other data available or not -->
                                    <?php if ($rpi_info->rpi_full_paper): ?>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Full Paper
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_full_paper)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_full_paper) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                            <i class="fas fa-file-pdf text-danger"></i>
                                                            <span>View Full Paper</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No full paper uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Turnitin Report
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_turnitin_report)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_turnitin_report) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                            <i class="fas fa-file-pdf text-danger"></i>
                                                            <span>View Turnitin Report</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No Turnitin Report uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">
                                                <i class="fas fa-file-pdf me-2"></i>Presentation Link
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_presentation_link)): ?>
                                                <div class="document-container">
                                                    <a href="<?= base_url($rpi_info->rpi_presentation_link) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                        <i class="fas fa-link text-danger"></i>
                                                        <span>View Link</span>
                                                        <i class="fas fa-external-link-alt ms-auto"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <div class="no-document-alert">
                                                    <i class="fas fa-link"></i>
                                                    <p>No Link uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Action Required Alert -->
                                    <?php if ($rpi_info->rpi_status == 'approved'): ?>
                                        <div class="glass-alert">
                                            <div class="d-flex align-items-start">
                                                <div>
                                                    <strong>Action Required:</strong> Please upload the following items:
                                                    <ul class="mt-2 mb-0">
                                                        <li>Presentation Link</li>
                                                        <li>Turnitin Report</li>
                                                        <li>Full Report</li>
                                                        <li>Proof of Payment</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Button to Open Modal for Upload -->
                                        <button type="button" class="btn btn-primary w-100 py-2 mt-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                            <i class="fas fa-upload me-2"></i> Upload Required Items
                                        </button>

                                    <?php elseif ($rpi_info->rpi_status == 'Submit'): ?>
                                        <div class="glass-alert">
                                            <div class="d-flex align-items-start">
                                                <div>
                                                    <strong>No Action Required</strong> <br>
                                                    Your research project has been submitted. It will be reviewed within three (3) working days.<br>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($rpi_info->rpi_status == 'Payment Approved'): ?>
                                        <div class="glass-alert">
                                            <div class="d-flex align-items-start">
                                                <div>
                                                    <strong>No Action Required</strong> <br>
                                                    Your payment proof has been approved. Reviewer will be assign within three (3) working days.<br>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($rpi_info->rpi_status == 'Draft' || $rpi_info->rpi_status == 'returned'): ?>
                                        <hr>
                                        <div class="text-center mt-4">
                                            <!-- Display Update Button -->
                                            <a href="<?= base_url('participant/research_project/get-rp-update-form/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                                <i class="fas fa-edit me-2"></i> Update Project Details
                                            </a>
                                        </div>

                                    <?php elseif ($rpi_info->rpi_status == 'Full Report Draft' || $rpi_info->rpi_status == 'Payment Rejected'): ?>
                                        <hr>
                                        <div class="text-center mt-4">
                                            <!-- Display Update Button -->
                                            <a href="<?= base_url('participant/research_project/get-rp-update-full-rp-form/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                                <i class="fas fa-edit me-2"></i> Update Report Details
                                            </a>
                                        </div>
                                    <?php elseif ($rpi_info->rpi_status == 'awaiting payment approval'): ?>
                                        <div class="glass-alert">
                                            <div class="d-flex align-items-start">
                                                <div>
                                                    <strong>No Action Required</strong> <br>
                                                    Your research project has been submitted. It will be reviewed within three (3) working days.<br>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($rpi_info->rpi_status == 'Minor Correction' || $rpi_info->rpi_status == 'Major Correction' || $rpi_info->rpi_status == 'Correction Draft'): ?>
                                        <hr>
                                        <div class="text-center mt-4">
                                            <!-- Display Update Button -->
                                            <a href="<?= base_url('participant/research_project/get-rp-make-correction/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                                <i class="fas fa-edit me-2"></i> Update Report Details
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <!-- Display Nothing -->
                                    <?php endif; ?>

                                </div>

                                <!-- Right Section -->
                                <div class="col-md-6">
                                    <h6 class="section-title">Research Team</h6>

                                    <div class="card mb-4 border-0 shadow-sm">
                                        <div class="card-header table-header">
                                            <h6 class="mb-0 text-center">
                                                <i class="fas fa-user-graduate me-2"></i>Presenter
                                            </h6>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class="d-flex align-items-center justify-content-center py-3">
                                                <div class="avatar-container me-3">
                                                    <div style="width: 48px; height:48px; background-color: #1e3c72; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                                        <?= strtoupper(substr($team_presentor->rrt_name, 0, 1)) ?>
                                                    </div>
                                                </div>
                                                <div class="presenter-info">
                                                    <h5 class="mb-0"><?= $team_presentor->rrt_name ?></h5>
                                                    <span class="badge bg-primary">Main Presenter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header table-header">
                                            <h6 class="mb-0 text-center">
                                                <i class="fas fa-users me-2"></i>Team Members
                                            </h6>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($team_members as $index => $members): ?>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <div class="avatar-container me-3">
                                                            <div style="width: 36px; height: 36px; background-color: <?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                                                <?= strtoupper(substr($members->rrt_name, 0, 1)) ?>
                                                            </div>
                                                        </div>
                                                        <div class="member-info">
                                                            <h6 class="mb-0"><?= $members->rrt_name ?></h6>
                                                            <small class="text-muted">Team Member #<?= $index + 1 ?></small>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Modal with Enhanced Styling -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">
                        <i class="fas fa-upload me-2"></i>Upload Required Items
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="uploadForm" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="project_link" class="form-label">Project Presentation Link</label>
                            <input type="url" class="form-control" id="project_link" name="project_link"
                                placeholder="Enter URL to presentation" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Turnitin Report</label>
                            <div class="file-upload-container" data-target="turnitin_report">
                                <input type="file" class="file-upload-input" id="turnitin_report" name="turnitin_report" accept=".pdf" required>
                                <div class="file-upload-content">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        <div>
                                            <strong>Click to upload</strong> or drag and drop
                                            <br>
                                            <small class="text-muted">PDF files only</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="file-selected-display">
                                <div class="file-selected-info">
                                    <i class="fas fa-file-pdf file-selected-icon"></i>
                                    <div class="file-selected-details">
                                        <h6 class="file-name-display"></h6>
                                        <small class="file-size-display"></small>
                                    </div>
                                </div>
                                <button type="button" class="file-change-btn">Change file</button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Full Report</label>
                            <div class="file-upload-container" data-target="full_report">
                                <input type="file" class="file-upload-input" id="full_report" name="full_report" accept=".pdf">
                                <div class="file-upload-content">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        <div>
                                            <strong>Click to upload</strong> or drag and drop
                                            <br>
                                            <small class="text-muted">PDF files only</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="file-selected-display">
                                <div class="file-selected-info">
                                    <i class="fas fa-file-pdf file-selected-icon"></i>
                                    <div class="file-selected-details">
                                        <h6 class="file-name-display"></h6>
                                        <small class="file-size-display"></small>
                                    </div>
                                </div>
                                <button type="button" class="file-change-btn">Change file</button>
                            </div>
                        </div>
                        <!-- Admin Bank Details -->
                        <div class="mb-4 p-4 rounded bank-details">
                            <h5 class="mb-3">
                                Payment Details
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Account Name:</strong> ABC Research Conference</p>
                                    <p class="mb-2"><strong>Bank Name:</strong> XYZ Bank</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Account Number:</strong> 123-456-789</p>
                                    <p class="mb-2"><strong>Reference:</strong> [Your Project ID]</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Proof of Payment</label>
                            <div class="file-upload-container" data-target="proof_of_payment">
                                <input type="file" class="file-upload-input" id="proof_of_payment" name="proof_of_payment" accept=".pdf, .jpg, .jpeg, .png">
                                <div class="file-upload-content">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                        <div>
                                            <strong>Click to upload</strong> or drag and drop
                                            <br>
                                            <small class="text-muted">PDF, JPG, JPEG, PNG files</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="file-selected-display">
                                <div class="file-selected-info">
                                    <i class="fas fa-file file-selected-icon"></i>
                                    <div class="file-selected-details">
                                        <h6 class="file-name-display"></h6>
                                        <small class="file-size-display"></small>
                                    </div>
                                </div>
                                <button type="button" class="file-change-btn">Change file</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Close
                        </button>
                        <button type="button" class="btn btn-warning" id="draftBtn">
                            <i class="fas fa-save me-1"></i> Save as Draft
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-paper-plane me-1"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (required for Select2 and dynamic elements) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Handle form submission
            $("#uploadForm").submit(function(e) {
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
                var formData = new FormData($("#uploadForm")[0]); // Get form data

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

                        // 🔑 Refresh CSRF Token if sent back by server
                        if (response.csrfToken) {
                            $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);
                        }

                        if (response.success) {
                            Swal.fire({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                location.reload(); // Reload to reset form
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

            // Enhanced File Upload JavaScript
            $('.file-upload-container').on('click', function(e) {
                if (!$(e.target).hasClass('file-change-btn')) {
                    $(this).find('.file-upload-input').click();
                }
            });

            $('.file-upload-input').on('change', function() {
                const file = this.files[0];
                const container = $(this).closest('.mb-4');
                const uploadContainer = container.find('.file-upload-container');
                const selectedDisplay = container.find('.file-selected-display');
                const placeholder = container.find('.upload-placeholder');

                if (file) {
                    const fileName = file.name;
                    const fileSize = formatFileSize(file.size);

                    container.find('.file-name-display').text(fileName);
                    container.find('.file-size-display').text(fileSize);

                    uploadContainer.addClass('has-file');
                    placeholder.addClass('has-file');
                    selectedDisplay.addClass('show');
                } else {
                    uploadContainer.removeClass('has-file');
                    placeholder.removeClass('has-file');
                    selectedDisplay.removeClass('show');
                }
            });

            $(document).on('click', '.file-change-btn', function(e) {
                e.stopPropagation();
                const container = $(this).closest('.mb-4');
                const fileInput = container.find('.file-upload-input');
                fileInput.click();
            });

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

        });
    </script>