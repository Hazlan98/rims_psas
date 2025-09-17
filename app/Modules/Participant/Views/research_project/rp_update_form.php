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
    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Update Research Project
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="updateResearchProjectForm">
                        <?= csrf_field() ?>
                        <!-- Project Details Section -->
                        <div class="mb-4">
                            <label for="projectTitle" class="form-label required-field">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="<?= !empty($paper->rpi_title) ? $paper->rpi_title : '' ?>" placeholder="Enter the full title of your research project" required>
                        </div>

                        <div class="mb-4">
                            <label for="projectField" class="form-label required-field">Project Category</label>
                            <select class="form-control select2" id="projectField" name="projectField" required>
                                <option value="<?= $paper->rpi_rf_id ?>" selected><?= get_field_desc($paper->rpi_rf_id) ?></option>
                                <?php foreach ($research_field as $field): ?>
                                    <?php if ($field->rf_id != $paper->rpi_rf_id): ?>
                                        <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Abstract Section -->
                        <div class="mb-4">
                            <label class="form-label">Project Abstract</label>
                            <?php if (!empty($paper->rpi_abstract)): ?>
                                <div class="document-container">
                                    <a href="<?= base_url($paper->rpi_abstract) ?>" class="document-link" target="_blank">
                                        <i class="fas fa-file-pdf"></i> Project Abstract
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm deleteFile" data-type="abstract">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>

                            <?php else: ?>
                                <label for="paperFile" class="btn-upload">
                                    <input type="file" class="form-control" id="paperFile" name="paperFile" accept=".pdf">
                                </label>
                            <?php endif; ?>
                        </div>

                        <!-- Team Information Section -->
                        <div class="mb-4">
                            <label for="teamLeader" class="form-label required-field">Presenter</label>
                            <select class="form-control select2" id="teamLeader" name="teamLeader" required>
                                <option value="<?= $team_presenter->rrt_name ?>" selected><?= $team_presenter->rrt_name ?></option>
                                <?php foreach ($team_members as $members) : ?>
                                    <?php if ($members->rrt_id != $team_presenter->rrt_id): ?>
                                        <option value="<?= $members->rrt_name ?>"><?= $members->rrt_name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">Select the team member who will present the research</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label required-field">Team Members</label>
                            <div id="teamContainer">
                                <?php foreach ($team_members as $members) : ?>
                                    <div class="input-group mb-2 team-member">
                                        <div class="input-group-prepend">
                                            <span class="btn team-icon-button">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="teamMembers[]" value="<?= $members->rrt_name ?>" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger team-delete-icon-button remove-member">
                                                <i class="fas fa-user-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="btn btn-primary" id="addMember">
                                <i class="fas fa-user-plus"></i> Add Team Member
                            </button>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning" id="saveDraft">
                                <i class="fas fa-save"></i> Save as Draft
                            </button>
                            <button type="button" class="btn btn-primary" id="submitDraft">
                                <i class="fas fa-paper-plane"></i> Submit Paper
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Comments Section (Right) -->
        <div class="col-lg-5">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments"></i> Admin Feedback
                    </h3>
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

<!-- JavaScript -->
<script>
    $(document).ready(function() {


        // CSRF token initialization
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

        // Initialize Select2
        $('.select2').select2({
            // theme: 'bootstrap4',
            width: '100%',
            // dropdownCssClass: 'select2-dropdown-custom',
            placeholder: 'Click to select an option',
            // selectionCssClass: 'select2-selection-custom'
        }).on('select2:open', function() {
            // Add a helpful message when dropdown opens
            $('.select2-search__field').attr('placeholder', 'Type to search...');
        });

        // Form validation
        function validateForm() {
            let isValid = true;

            // Check required fields
            $('#updateResearchProjectForm input[required], #updateResearchProjectForm select[required]').each(function() {
                if ($(this).val() === '') {
                    $(this).addClass('is-invalid');
                    isValid = false;
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            return isValid;
        }

        // Validate on input change
        $('#updateResearchProjectForm input, #updateResearchProjectForm select').on('change input', function() {
            validateForm();
        });

        // Initialize validation
        validateForm();

        // Team member management
        function updateTeamLeaderOptions() {
            let teamLeaderSelect = $("#teamLeader");
            let currentLeader = teamLeaderSelect.val();
            teamLeaderSelect.empty();

            $(".team-member input[name='teamMembers[]']").each(function() {
                let memberName = $(this).val().trim();
                if (memberName !== "") {
                    let selected = (memberName === currentLeader) ? "selected" : "";
                    teamLeaderSelect.append('<option value="' + memberName + '" ' + selected + '>' + memberName + '</option>');
                }
            });

            teamLeaderSelect.trigger('change');
        }

        // Add new team member
        $("#addMember").click(function() {
            $("#teamContainer").append(`
                <div class="input-group mb-2 team-member">
                    <div class="input-group-prepend">
                        <span class="btn team-icon-button">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger team-delete-icon-button remove-member">
                            <i class="fas fa-user-minus"></i>
                        </button>
                    </div>
                </div>
            `);
            updateTeamLeaderOptions();
            validateForm();
        });

        // Remove team member
        $(document).on("click", ".remove-member", function() {
            $(this).closest(".team-member").remove();
            updateTeamLeaderOptions();
            validateForm();
        });

        // Update dropdown when typing
        $(document).on("keyup", ".team-member input[name='teamMembers[]']", function() {
            updateTeamLeaderOptions();
        });

        // AJAX Submit Final Paper
        $("#submitDraft").click(function(event) {
            event.preventDefault();

            if (!validateForm()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Form Incomplete',
                    text: 'Please fill all required fields before submitting.'
                });
                return;
            }

            let formData = new FormData($("#updateResearchProjectForm")[0]);
            formData.append("is_draft", "0"); // Flag for final submission

            Swal.fire({
                title: "Submit Research Paper",
                text: "Once submitted, you won't be able to make further changes. Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Submit",
                cancelButtonText: "Cancel",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/research_project/submit-participation-research-project') ?>",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Submitting...",
                                text: "Please wait while we process your submission",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            // 🔑 Refresh CSRF Token if sent back by server
                            if (response.csrfToken) {
                                $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);
                            }
                            try {
                                const result = JSON.parse(response);
                                if (result.status === 'success') {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Submission Successful!",
                                        text: "Your research paper has been submitted successfully.",
                                        confirmButtonColor: "#28a745"
                                    }).then(() => {
                                        window.location.href = "<?= base_url('participant/research_project/rp_details') ?>";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Submission Failed",
                                        text: result.message || "An error occurred during submission.",
                                        confirmButtonColor: "#dc3545"
                                    });
                                }
                            } catch (e) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Submission Successful!",
                                    text: "Your research paper has been submitted successfully.",
                                    confirmButtonColor: "#28a745"
                                }).then(() => {
                                    window.location.href = "<?= base_url('participant/research_project/rp_details') ?>";
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
                                icon: "error",
                                title: "Save Failed",
                                text: (resp && resp.errors) ? JSON.stringify(resp.errors) : (xhr.responseText || "Something went wrong."),
                                confirmButtonColor: "#dc3545"
                            });
                        },
                    });
                }
            });
        });

        // AJAX Save Draft
        $("#saveDraft").click(function(event) {
            event.preventDefault();

            let formData = new FormData($("#updateResearchProjectForm")[0]);
            formData.append("is_draft", "1"); // Flag for draft submission

            Swal.fire({
                title: "Save as Draft?",
                text: "Your progress will be saved and you can continue editing later.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Save Draft",
                cancelButtonText: "Cancel",
                confirmButtonColor: "#ffc107",
                cancelButtonColor: "#6c757d",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/research_project/update-participation-research-project') ?>",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Saving...",
                                text: "Please wait while we save your progress",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            // 🔑 Refresh CSRF Token if sent back by server
                            if (response.csrfToken) {
                                $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);
                            }
                            try {
                                const result = JSON.parse(response);
                                if (result.status === 'success') {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Draft Saved!",
                                        text: "Your progress has been saved successfully.",
                                        confirmButtonColor: "#28a745"
                                    }).then(() => {
                                        window.location.href = "<?= base_url('participant/research_project/rp_details') ?>";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Save Failed",
                                        text: result.message || "An error occurred while saving.",
                                        confirmButtonColor: "#dc3545"
                                    });
                                }
                            } catch (e) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Draft Saved!",
                                    text: "Your progress has been saved successfully.",
                                    confirmButtonColor: "#28a745"
                                }).then(() => {
                                    window.location.href = "<?= base_url('participant/research_project/rp_details') ?>";
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
                                icon: "error",
                                title: "Save Failed",
                                text: (resp && resp.errors) ? JSON.stringify(resp.errors) : (xhr.responseText || "Something went wrong."),
                                confirmButtonColor: "#dc3545"
                            });
                        },
                    });
                }
            });
        });

        // Delete file handler
        $(document).on("click", ".deleteFile", function() {
            let fileType = $(this).data("type");
            let button = $(this);

            Swal.fire({
                title: "Delete File?",
                text: "Are you sure you want to delete this file? This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/research_project/delete-file') ?>",
                        type: "POST",
                        data: {
                            [csrfName]: csrfHash, // Include CSRF token
                            fileType: fileType
                        },
                        dataType: "json",
                        beforeSend: function() {
                            Swal.fire({
                                title: "Deleting...",
                                text: "Please wait",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: response.message,
                                    confirmButtonColor: "#28a745"
                                });

                                button.closest("div").html('<input type="file" class="form-control" id = "paperFile" name = "paperFile" accept = ".pdf" required >');

                                // Update CSRF token after request
                                csrfName = response.csrfName;
                                csrfHash = response.csrfHash;

                                // Update CSRF token in form
                                $("#updateResearchProjectForm input[name='<?= csrf_token() ?>']").val(csrfHash);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text: response.message,
                                    confirmButtonColor: "#dc3545"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                confirmButtonColor: "#dc3545"
                            });
                        }
                    });
                }
            });
        });
    });
</script>