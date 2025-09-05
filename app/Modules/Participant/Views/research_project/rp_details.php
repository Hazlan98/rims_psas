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
        /* font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif; */
        color: #2d3748;
        line-height: 1.5;
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

    /*
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
    } */

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

    .document-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .document-link i {
        margin-right: 0.5rem;
        font-size: 1rem;
        /* color: var(--accent-color); */
    }

    .document-link>i:hover {
        margin-right: 0.5rem;
        font-size: 1rem;
        color: white !important;
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
            <div class="card  card-primary card-outline">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
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
                        'pending' => 'bg-secondary text-white'
                    ];
                    $status_class = isset($status_classes[$rpi_info->rpi_status]) ? $status_classes[$rpi_info->rpi_status] : 'bg-secondary text-white';
                    ?>
                    <div class="status-badge <?= $status_class ?> m-0  ms-auto">
                        <i class="fas fa-circle me-1"></i> Status: <?= ucfirst($rpi_info->rpi_status) ?>
                    </div>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row g-4">
                            <!-- Left Section -->
                            <div class="col-md-6 border-end">

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
                    <div class="mb-4">
                        <label for="project_link" class="form-label">Project Presentation Link</label>
                        <input type="url" class="form-control" id="project_link" name="project_link"
                            placeholder="Enter URL to presentation" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Turnitin Report</label>
                        <label for="turnitin_report" class="btn-upload">
                            <input type="file" class="form-control" id="turnitin_report" name="turnitin_report" accept=".pdf" required>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Full Report</label>
                        <label for="full_report" class="btn-upload">
                            <input type="file" class="form-control" id="full_report" name="full_report">
                        </label>
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
                        <label for="proofOfPayment" class="btn-upload">
                            <input type="file" class="form-control file-input-hidden" id="proof_of_payment" name="proof_of_payment" accept=".pdf, .jpg, .jpeg, .png">
                        </label>
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
    });
</script>