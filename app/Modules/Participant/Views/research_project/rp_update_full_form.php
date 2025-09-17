<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    :root {
        --primary: #6366f1;
        --primary-dark: #4338ca;
        --primary-light: #8b5cf6;
        --accent: #06b6d4;
        --accent-pink: #ec4899;
        --text-dark: #0f172a;
        --text-light: #64748b;
        --border: #e2e8f0;
        --success: #10b981;
        --error: #ef4444;
        --warning: #f59e0b;
        --surface: #ffffff;
        --glass-bg: rgba(255, 255, 255, 0.25);
        --glass-border: rgba(255, 255, 255, 0.18);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
        color: var(--text-dark);
    }

    @keyframes gradientShift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    /* Particles background */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }

    .particle:nth-child(odd) {
        animation-direction: reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }

        10%,
        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(-100px) rotate(360deg);
        }
    }

    .particle:nth-child(1) {
        width: 8px;
        height: 8px;
        left: 10%;
        animation-delay: 0s;
        animation-duration: 6s;
    }

    .particle:nth-child(2) {
        width: 12px;
        height: 12px;
        left: 20%;
        animation-delay: 1s;
        animation-duration: 8s;
    }

    .particle:nth-child(3) {
        width: 6px;
        height: 6px;
        left: 30%;
        animation-delay: 2s;
        animation-duration: 7s;
    }

    .particle:nth-child(4) {
        width: 10px;
        height: 10px;
        left: 40%;
        animation-delay: 3s;
        animation-duration: 9s;
    }

    .particle:nth-child(5) {
        width: 14px;
        height: 14px;
        left: 50%;
        animation-delay: 4s;
        animation-duration: 6s;
    }

    .particle:nth-child(6) {
        width: 10px;
        height: 10px;
        left: 60%;
        animation-delay: 2.5s;
        animation-duration: 7s;
    }

    .particle:nth-child(7) {
        width: 8px;
        height: 8px;
        left: 70%;
        animation-delay: 4s;
        animation-duration: 9s;
    }

    .particle:nth-child(8) {
        width: 6px;
        height: 6px;
        left: 80%;
        animation-delay: 1.5s;
        animation-duration: 6s;
    }

    .particle:nth-child(9) {
        width: 12px;
        height: 12px;
        left: 90%;
        animation-delay: 3.5s;
        animation-duration: 8s;
    }

    .content {
        padding: 30px;
        position: relative;
        z-index: 10;
        min-height: 100vh;
    }

    /* App Header */
    /* .app-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px 20px 0 0;
        border: 1px solid var(--glass-border);
        padding: 25px 30px;
        margin-bottom: 0;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    } */

    .app-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .app-title i {
        margin-right: 12px;
        color: var(--primary);
    }

    .app-subtitle {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-top: 8px;
    }

    /* Card Styles */
    .card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid var(--glass-border);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        margin-bottom: 25px;
    }

    .card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        z-index: -1;
    }

    .card:hover {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        padding: 25px 30px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        border-bottom: 1px solid var(--glass-border);
        backdrop-filter: blur(10px);
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .card-title i {
        margin-right: 12px;
        color: var(--primary);
        font-size: 1.2rem;
    }

    .card-body {
        padding: 30px;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: var(--text-dark);
        margin-bottom: 8px;
        display: block;
    }

    .required-field::after {
        content: ' *';
        color: var(--error);
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.9);
        /* backdrop-filter: blur(10px); */
        /* border: 2px solid var(--glass-border); */
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.9rem;
        color: var(--text-dark);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control:focus,
    .form-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        background: white;
        /* transform: translateY(-2px); */
    }

    .form-control.is-invalid {
        border-color: var(--error);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    /* Select2 Styling */
    .select2-container--default .select2-selection--single {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 2px solid var(--glass-border);
        border-radius: 12px;
        height: auto;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }

    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--text-dark);
        line-height: 1.5;
        padding: 0;
    }

    .select2-dropdown {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 2px solid var(--glass-border);
        border-radius: 12px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Document Container */
    .document-container {
        display: flex;
        align-items: center;
        padding: 16px 20px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
        backdrop-filter: blur(10px);
        border-radius: 12px;
        margin-bottom: 20px;
        border: 1px solid var(--glass-border);
        transition: all 0.3s ease;
    }

    .document-container:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2);
    }

    .document-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: var(--primary);
        font-size: 0.9rem;
        font-weight: 600;
        flex-grow: 1;
        transition: color 0.3s ease;
    }

    .document-link:hover {
        color: var(--primary-dark);
    }

    .document-link i {
        margin-right: 12px;
        font-size: 1.1rem;
        color: var(--accent);
    }

    /* Upload Button */
    .btn-upload {
        width: 100%;
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 2px dashed var(--glass-border);
        color: var(--text-light);
        padding: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .btn-upload i {
        margin-right: 12px;
        font-size: 1.2rem;
    }

    .btn-upload:hover {
        background: rgba(99, 102, 241, 0.1);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2);
    }

    .file-input-hidden {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        border: none;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        color: white;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning), #d97706);
        color: white;
        box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
    }

    .btn-warning:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(245, 158, 11, 0.4);
        color: white;
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--error), #dc2626);
        color: white;
        padding: 8px 12px;
        font-size: 0.8rem;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        color: white;
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 0.8rem;
    }

    /* Team Member Styles */
    .team-member {
        margin-bottom: 15px;
    }

    .input-group {
        display: flex;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .input-group:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .input-group-prepend .btn,
    .input-group-append .btn {
        border-radius: 0;
        border: none;
        backdrop-filter: blur(10px);
    }

    .team-icon-button {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 17px 16px;
    }

    .team-icon-button:hover {
        color: white;
    }

    .team-delete-icon-button {
        background: linear-gradient(135deg, var(--error), #dc2626);
        color: white;
        padding: 17px 16px;
        transition: all 0.3s ease;
    }

    .team-delete-icon-button:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: scale(1.05);
    }

    .input-group .form-control {
        border-radius: 0;
        border-left: none;
        border-right: none;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid var(--glass-border);
    }

    /* Comment Styles */
    .comment-item {
        padding: 20px;
        border-left: 4px solid var(--primary);
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(139, 92, 246, 0.08));
        backdrop-filter: blur(10px);
        border-radius: 12px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        border: 1px solid var(--glass-border);
    }

    .comment-item:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.15);
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .comment-author {
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--primary);
        display: flex;
        align-items: center;
    }

    .comment-author i {
        margin-right: 8px;
        color: var(--accent);
    }

    .comment-date {
        font-size: 0.8rem;
        color: var(--text-light);
        font-weight: 500;
    }

    .comment-body {
        font-size: 0.9rem;
        color: var(--text-dark);
        line-height: 1.6;
    }

    .no-comments {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-light);
        font-style: italic;
        font-size: 0.9rem;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        backdrop-filter: blur(10px);
        border-radius: 12px;
        border: 1px solid var(--glass-border);
    }

    .no-comments i {
        font-size: 2rem;
        margin-bottom: 15px;
        color: var(--primary);
        opacity: 0.5;
    }

    /* Animation classes */
    .animate-in {
        animation: slideInUp 0.6s ease-out;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .content {
            padding: 20px 15px;
        }

        .card-header,
        .card-body {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
            gap: 10px;
        }

        .particles {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .content {
            padding: 15px 10px;
        }

        .card-header,
        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

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
    <!-- <div class="app-header">
        <h1 class="app-title">Research Project Management</h1>
        <p class="app-subtitle">Project ID: RPM-2023-<?= $rpi_info->rpi_id ?? '001' ?></p>
    </div> -->

    <div class="row">
        <!-- Form Section (Left) -->
        <div class="col-lg-7 mb-4">
            <div class="card animate-in">
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
                                    <input type="file" class="form-control" id="turnitin_report" name="turnitin_report" accept=".pdf" required>
                                </label>
                            <?php endif; ?>
                        </div>

                        <div class=" mb-4">
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
                                    <input type="file" class="form-control" id="full_report" name="full_report" accept=".pdf" required>
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
                                    <input type="file" class="form-control" id="proofOfPayment" name="proof_of_payment" accept=".pdf">
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
                                button.closest("div").html('<input type="file" class="form-control" name="' + fileType + '" accept=".pdf" required>');
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

        // CSRF token initialization
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

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
                    let resp = xhr.responseJSON; // ✅ parse JSON from server

                    // 🔑 Refresh CSRF Token if sent back by server
                    if (resp && resp.csrfToken) {
                        $('input[name="<?= csrf_token() ?>"]').val(resp.csrfToken);
                    }

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