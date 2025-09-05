<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">

<!-- Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Select2 (for dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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

    .team-icon-button {
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .team-delete-icon-button {
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
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
        <div class="col-lg-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Update Research Project
                    </h3>
                </div>
                <div class="card-body">

                    <form method="post" enctype="multipart/form-data" id="updateResearchProjectForm">
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
                                    <input type="file" class="form-control file-input-hidden" id="paperFile" name="paperFile" accept=".pdf">
                                </label>
                            <?php endif; ?>
                        </div>

                        <!-- Team Information Section -->
                        <div class=" mb-3">
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

                        <div class="mb-3">
                            <label class="form-label required-field">Team Members</label>
                            <div id="teamContainer">
                                <?php foreach ($team_members as $members) : ?>
                                    <div class="input-group mb-2 team-member">
                                        <div class="input-group-prepend">
                                            <span class="btn btn-primary team-icon-button">
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

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-warning me-2" id="saveDraft">
                                <i class="fas fa-save mr-1"></i> Save as Draft
                            </button>
                            <button type="button" class="btn btn-primary" id="submitDraft">
                                <i class="fas fa-paper-plane mr-1"></i> Submit Paper
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

<!-- JavaScript -->
<script>
    $(document).ready(function() {
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
                        <span class="btn btn-primary team-icon-button">
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
                            Swal.fire({
                                icon: "error",
                                title: "Submission Failed",
                                text: xhr.responseText || "Something went wrong with your submission. Please try again.",
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
                            Swal.fire({
                                icon: "error",
                                title: "Save Failed",
                                text: xhr.responseText || "Something went wrong. Please try again.",
                                confirmButtonColor: "#dc3545"
                            });
                        },
                    });
                }
            });
        });
    });
</script>

<!-- Delete Attachment Function -->
<script>
    $(document).ready(function() {
        // CSRF token initialization
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

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

                                button.closest("div").html('<input type="file" class="form-control" id = "paperFile" name = "paperFile" required >');

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