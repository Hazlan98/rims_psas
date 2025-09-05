<!-- Hazlan Custom Template -->
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">
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

<!-- Custom CSS -->
<style>
    .form-section {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #ffc107;
    }

    .section-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9ecef;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    }

    .team-member {
        transition: all 0.3s ease;
    }

    .team-member:hover {
        background-color: #f8f9fa;
    }

    .file-preview {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 10px;
    }

    .required-field::after {
        content: " *";
        color: #dc3545;
    }

    .badge-info {
        background-color: #17a2b8;
    }

    /* Add this to your existing style section */
    .admin-comments-container {
        max-height: 300px;
        overflow-y: auto;
        border-radius: 4px;
        padding-right: 5px;
    }

    .admin-comments-container::-webkit-scrollbar {
        width: 6px;
    }

    .admin-comments-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .admin-comments-container::-webkit-scrollbar-thumb {
        background: #ffc107;
        border-radius: 4px;
    }

    .admin-comments-container .alert {
        border-left: 4px solid #ffc107;
    }

    .comment-text {
        white-space: pre-line;
        padding: 8px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 4px;
    }
</style>

<div class="content p-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">
                            <i class="fas fa-file-alt mr-2"></i> Research Project Submission
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle mr-2"></i> Please complete all required fields marked with an asterisk (*). Your research project information will be reviewed by our committee.
                        </div>

                        <?php if (!empty($admin_comments)): ?>
                            <!-- Admin Comments Section - Add this right after the alert at the beginning of the form -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-comments mr-2"></i> Admin Feedback
                                </h4>
                                <div class="admin-comments-container">
                                    <?php foreach ($admin_comments as $comment): ?>
                                        <div class="alert alert-warning mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <strong><i class="fas fa-user-shield mr-2"></i> <?= $comment->ui_name ?></strong>
                                                <small class="text-muted"><?= date('d M Y H:i', strtotime($comment->rpr_created_at)) ?></small>
                                            </div>
                                            <div class="comment-text">
                                                <?= $comment->rpr_remarks ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" id="updateResearchProjectForm">
                            <?= csrf_field() ?>

                            <!-- Project Details Section -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-project-diagram mr-2"></i> Project Details
                                </h4>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="projectTitle" class="form-label required-field">Project Title</label>
                                        <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="<?= $paper->rpi_title ?>" required>
                                        <small class="text-muted">Enter the full title of your research project</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectField" class="form-label required-field">Project Category</label>
                                        <select class="form-control select2" id="projectField" name="projectField" required>
                                            <option value="<?= $paper->rpi_rf_id ?>" selected><?= get_field_desc($paper->rpi_rf_id) ?></option>
                                            <?php foreach ($research_field as $field): ?>
                                                <?php if ($field->rf_id != $paper->rpi_rf_id): ?>
                                                    <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                                                <?php endif; ?>
                                            <?php endforeach ?>
                                        </select>
                                        <small class="text-muted">Select the category that best describes your research</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Abstract Section -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-file-pdf mr-2"></i> Project Abstract
                                </h4>
                                <div class="mb-3">
                                    <label for="paperFile" class="form-label required-field">Upload Project Abstract (PDF)</label>
                                    <?php if (!empty($paper->rpi_abstract)): ?>
                                        <div class="file-preview d-flex align-items-center">
                                            <span class="badge badge-info me-2">PDF</span>
                                            <span class="file-name me-2"><?= basename($paper->rpi_abstract) ?></span>
                                            <div class="ms-auto d-flex align-items-center">
                                                <a href="<?= base_url($paper->rpi_abstract) ?>" class="btn btn-sm btn-custom-info me-2" target="_blank">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <button type="button" class="btn btn-sm btn-custom-danger deleteFile" data-type="abstract">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </div>

                                    <?php else: ?>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="paperFile" name="paperFile" accept=".pdf" required>
                                            <!-- <label class="custom-file-label" for="paperFile">Choose file</label> -->
                                        </div>
                                        <small class="text-muted">Maximum file size: 5MB</small>
                                        <div id="abstractPreview" class="mt-2"></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Team Information Section -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-users mr-2"></i> Team Information
                                </h4>
                                <div class="mb-3">
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
                                                    <span class="btn btn-primary">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="teamMembers[]" value="<?= $members->rrt_name ?>" required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-member">
                                                        <i class="fas fa-user-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <button type="button" class="btn btn-custom-normal" id="addMember">
                                        <i class="fas fa-user-plus"></i> Add Team Member
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-custom-warning me-2" id="saveDraft">
                                    <i class="fas fa-save mr-1"></i> Save as Draft
                                </button>
                                <button type="button" class="btn btn-custom-primary" id="submitDraft">
                                    <i class="fas fa-paper-plane mr-1"></i> Submit Paper
                                </button>
                            </div>
                        </form>
                    </div>
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

        // Initialize file input
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);

            if (this.id === 'paperFile') {
                $('#abstractPreview').html('<div class="alert alert-success mt-2"><i class="fas fa-check-circle"></i> File selected: ' + fileName + '</div>');
            }
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
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-member">
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

                                // Replace with file upload input
                                if (fileType === 'abstract') {
                                    button.closest(".file-preview").replaceWith(`
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="paperFile" name="paperFile" accept=".pdf" required>
                                            <label class="custom-file-label" for="paperFile">Choose file</label>
                                        </div>
                                        <small class="text-muted">Maximum file size: 5MB</small>
                                        <div id="abstractPreview" class="mt-2"></div>
                                    `);

                                    // Reinitialize file input
                                    $('input[type="file"]').change(function(e) {
                                        var fileName = e.target.files[0].name;
                                        $(this).next('.custom-file-label').html(fileName);

                                        if (this.id === 'paperFile') {
                                            $('#abstractPreview').html('<div class="alert alert-success mt-2"><i class="fas fa-check-circle"></i> File selected: ' + fileName + '</div>');
                                        }
                                    });
                                }

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