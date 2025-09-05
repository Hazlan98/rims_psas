<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 16px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-success {
        background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
        border: none;
        transition: all 0.3s;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #4caf50 0%, #2e7d32 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .table-header {
        background: linear-gradient(135deg, #0288d1 0%, #29b6f6 100%);
        color: white;
    }

    .form-control:focus {
        border-color: #1e3c72;
        box-shadow: 0 0 0 0.25rem rgba(30, 60, 114, 0.25);
    }

    .document-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        border-radius: 6px;
        transition: all 0.3s;
    }

    .document-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .document-link i {
        margin-right: 8px;
        font-size: 1.2em;
    }

    .status-badge {
        padding: 8px 12px;
        border-radius: 50px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 15px;
    }

    .modal-content {
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .bank-details {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ef 100%);
        border-left: 4px solid #1e3c72;
    }

    .section-title {
        border-left: 4px solid #1e3c72;
        padding-left: 10px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .loading-spinner {
        display: inline-block;
        width: 1.5rem;
        height: 1.5rem;
        border: 0.25rem solid rgba(30, 60, 114, 0.3);
        border-radius: 50%;
        border-top-color: #1e3c72;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-header position-relative">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-project-diagram me-2"></i>Project Details
                    </h5>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row g-4">
                            <!-- Left Section -->
                            <div class="col-md-6 border-end">
                                <!-- Project Status (Now in Badge) -->
                                <div class="mb-4">
                                    <?php
                                    $status_classes = [
                                        'approved' => 'bg-success text-white',
                                        'Draft' => 'bg-warning text-dark',
                                        'Full Report Draft' => 'bg-info text-white',
                                        'Minor Correction' => 'bg-primary text-white',
                                        'Major Correction' => 'bg-danger text-white',
                                        'rejected' => 'bg-danger text-white',
                                        'pending' => 'bg-secondary text-white'
                                    ];
                                    $status_class = isset($status_classes[$rpi_info->rpi_status]) ? $status_classes[$rpi_info->rpi_status] : 'bg-secondary text-white';
                                    ?>
                                    <div class="status-badge <?= $status_class ?>">
                                        <i class="fas fa-circle me-1"></i> Status: <?= ucfirst($rpi_info->rpi_status) ?>
                                    </div>
                                </div>

                                <h6 class="section-title">Basic Information</h6>

                                <div class="mb-4">
                                    <label for="rpi_title" class="form-label fw-bold">
                                        Research / Project Title
                                    </label>
                                    <input type="text" class="form-control bg-light" id="rpi_title" name="rpi_title" value="<?= $rpi_info->rpi_title ?>" readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="rpi_rf_id" class="form-label fw-bold">
                                        Project Field
                                    </label>
                                    <input type="text" class="form-control bg-light" id="rpi_rf_id" name="rpi_rf_id" value="<?= get_field_desc($rpi_info->rpi_rf_id) ?>" readonly>
                                </div>

                                <h6 class="section-title mt-4">Project Documents</h6>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="rpi_abstract" class="form-label fw-bold">
                                            Abstract
                                        </label>
                                        <?php if (!empty($rpi_info->rpi_abstract)): ?>
                                            <a href="<?= base_url($rpi_info->rpi_abstract) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                <i class="fas fa-file-alt"></i> View Abstract
                                            </a>
                                        <?php else: ?>
                                            <div class="alert alert-light text-center py-3 border">
                                                <i class="fas fa-file-alt text-muted fs-4 mb-2"></i>
                                                <p class="text-muted mb-0">No abstract uploaded</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($rpi_info->rpi_full_paper): ?>
                                        <div class="col-md-6">
                                            <label for="rpi_proof_of_payment" class="form-label fw-bold">
                                                Payment Proof
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_proof_of_payment)): ?>
                                                <a href="<?= base_url($rpi_info->rpi_proof_of_payment) ?>" target="_blank" class="btn btn-outline-success w-100 document-link">
                                                    <i class="fas fa-receipt"></i> View Payment Proof
                                                </a>
                                            <?php else: ?>
                                                <div class="alert alert-light text-center py-3 border">
                                                    <i class="fas fa-receipt text-muted fs-4 mb-2"></i>
                                                    <p class="text-muted mb-0">No payment proof uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- check if other data available or not -->
                                <?php if ($rpi_info->rpi_full_paper): ?>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label for="rpi_full_paper" class="form-label fw-bold">
                                                Full Paper
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_full_paper)): ?>
                                                <a href="<?= base_url($rpi_info->rpi_full_paper) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                    <i class="fas fa-file-pdf"></i> View Full Paper
                                                </a>
                                            <?php else: ?>
                                                <div class="alert alert-light text-center py-3 border">
                                                    <i class="fas fa-file-pdf text-muted fs-4 mb-2"></i>
                                                    <p class="text-muted mb-0">No full paper uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="rpi_turnitin_report" class="form-label fw-bold">
                                                Turnitin Report
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_turnitin_report)): ?>
                                                <a href="<?= base_url($rpi_info->rpi_turnitin_report) ?>" target="_blank" class="btn btn-outline-success w-100 document-link">
                                                    <i class="fas fa-check-circle"></i> Turnitin Report
                                                </a>
                                            <?php else: ?>
                                                <div class="alert alert-light text-center py-3 border">
                                                    <i class="fas fa-check-circle text-muted fs-4 mb-2"></i>
                                                    <p class="text-muted mb-0">No Turnitin Report uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="rpi_presentation_link" class="form-label fw-bold">
                                            <i class="fas fa-link me-1"></i> Presentation Link
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light" id="rpi_presentation_link" name="rpi_presentation_link" value="<?= $rpi_info->rpi_presentation_link ?>" readonly>
                                            <?php if (!empty($rpi_info->rpi_presentation_link)): ?>
                                                <button class="btn btn-outline-secondary" type="button" onclick="window.open('<?= $rpi_info->rpi_presentation_link ?>', '_blank')">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($rpi_info->rpi_status == 'approved'): ?>
                                    <!-- Alert for Upload Requirements -->
                                    <div class="alert alert-warning border-start border-4 border-warning animate__animated animate__pulse animate__infinite">
                                        <div class="d-flex">
                                            <div class="me-3 fs-3">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
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
                </form>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="project_link" class="form-label fw-bold">
                                    Project Presentation Link
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-globe"></i></span>
                                    <input type="url" class="form-control" id="project_link" name="project_link" placeholder="Enter presentation link" required>
                                </div>
                                <small class="form-text text-muted">Enter the URL for your project presentation later</small>
                            </div>

                            <div class="mb-4">
                                <label for="turnitin_report" class="form-label fw-bold">
                                    Turnitin Report (PDF)
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-file-pdf"></i></span>
                                    <input type="file" class="form-control" id="turnitin_report" name="turnitin_report" accept=".pdf" required>
                                </div>
                                <small class="form-text text-muted">Upload the Turnitin similarity report</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="full_report" class="form-label fw-bold">
                                    Full Report (PDF)
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-file-pdf"></i></span>
                                    <input type="file" class="form-control" id="full_report" name="full_report" accept=".pdf" required>
                                </div>
                                <small class="form-text text-muted">Upload the complete research report</small>
                            </div>

                            <div class="mb-4">
                                <label for="proofOfPayment" class="form-label fw-bold">
                                    Proof of Payment (PDF)
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-file-invoice-dollar"></i></span>
                                    <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" accept=".pdf" required>
                                </div>
                                <small class="form-text text-muted">Upload receipt or screenshot of payment</small>
                            </div>
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

                    <div id="uploadStatus" class="alert d-none"></div>
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
    });
</script>