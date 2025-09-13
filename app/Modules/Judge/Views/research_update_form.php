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
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">General Elements</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= base_url('participant/submit-research-paper') ?>" method="POST" enctype="multipart/form-data" id="newResearchForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="projectTitle" class="form-label">Project Title</label>
                                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="<?= $paper->rpi_title ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="projectCategory" class="form-label">Project Category</label><br>
                                    <select class="form-control select2" id="projectCategory" name="projectCategory" required>
                                        <option value="<?= $paper->rpi_rc_id ?>" selected><?= get_category_desc($paper->rpi_rc_id) ?></option>
                                        <?php foreach ($research_category as $category): ?>
                                            <?php if ($category->rc_id != $paper->rpi_rc_id): ?>
                                                <option value="<?= $category->rc_id ?>"><?= $category->rc_desc ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="paperFile" class="form-label">Upload Project Abstract (PDF)</label>
                                <?php if (!empty($paper->rpi_abstract)): ?>
                                    <div class="d-flex align-items-center">
                                        <a href="<?= base_url($paper->rpi_abstract) ?>" class="btn btn-info me-2" target="_blank">View</a>
                                        <button type="button" class="btn btn-danger deleteFile" data-type="abstract">Delete</button>
                                    </div>
                                <?php else: ?>
                                    <input type="file" class="form-control" id="paperFile" name="paperFile" accept=".pdf" required>
                                <?php endif; ?>
                            </div>
                            <!-- New Selection Input -->
                            <div class="mb-3">
                                <label for="teamLeader" class="form-label">Presenter</label>
                                <select class="form-control select2" id="teamLeader" name="teamLeader" required>
                                    <option value="<?= $team_presenter->rrt_name ?>" selected><?= $team_presenter->rrt_name ?></option>
                                    <?php foreach ($team_members as $members) : ?>
                                        <?php if ($members->rrt_id != $team_presenter->rrt_id): ?>
                                            <option value="<?= $members->rrt_name ?>"><?= $members->rrt_name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Team Members</label>
                                <div id="teamContainer">
                                    <?php foreach ($team_members as $members) : ?>
                                        <?php if ($members->rrt_id != $team_presenter->rrt_id): ?>
                                            <div class="input-group mb-2 team-member">
                                                <input type="text" class="form-control" name="teamMembers[]" value="<?= $members->rrt_name ?>" required>
                                                <button type="button" class="btn btn-danger remove-member">Remove</button>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="btn btn-success" id="addMember">Add Another</button>
                            </div>

                            <!-- Admin Bank Details -->
                            <div class="mb-3 p-3 border rounded bg-light">
                                <h5 class="mb-2">Admin Bank Details</h5>
                                <p><strong>Account Name:</strong> ABC Research Conference</p>
                                <p><strong>Bank Name:</strong> XYZ Bank</p>
                                <p><strong>Account Number:</strong> 123-456-789</p>
                            </div>

                            <!-- Proof of Payment Upload -->
                            <div class="mb-3">
                                <label for="proofOfPayment" class="form-label">Upload Proof of Payment (PDF/Image)</label>
                                <?php if (!empty($paper->proof_of_payment)): ?>
                                    <div class="d-flex align-items-center">
                                        <a href="<?= base_url($paper->proof_of_payment) ?>" class="btn btn-info me-2" target="_blank">View</a>
                                        <button type="button" class="btn btn-danger deleteFile" data-type="payment">Delete</button>
                                    </div>
                                <?php else: ?>
                                    <input type="file" class="form-control" id="proofOfPayment" name="proofOfPayment" accept=".pdf, .jpg, .jpeg, .png" required>
                                <?php endif; ?>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning" id="saveDraft">Save</button>
                                <button type="submit" class="btn btn-primary">Submit Paper</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- JavaScript to Update Selection List -->
<script>
    $(document).ready(function() {
        function updateTeamLeaderOptions() {
            let teamLeaderSelect = $("#teamLeader");
            let currentLeader = teamLeaderSelect.val();
            teamLeaderSelect.empty();
            teamLeaderSelect.append('<option value="">Select a Team Member</option>');

            $(".team-member input[name='teamMembers[]']").each(function() {
                let memberName = $(this).val().trim();
                if (memberName !== "") {
                    let selected = (memberName === currentLeader) ? "selected" : "";
                    teamLeaderSelect.append('<option value="' + memberName + '" ' + selected + '>' + memberName + '</option>');
                }
            });
        }

        // Add new team member
        $("#addMember").click(function() {
            $("#teamContainer").append(`
            <div class="input-group mb-2 team-member">
                <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                <button type="button" class="btn btn-danger remove-member">Remove</button>
            </div>
        `);
            updateTeamLeaderOptions();
        });

        // Remove team member
        $(document).on("click", ".remove-member", function() {
            $(this).closest(".team-member").remove();
            updateTeamLeaderOptions();
        });

        // Update dropdown when typing
        $(document).on("keyup", ".team-member input[name='teamMembers[]']", function() {
            updateTeamLeaderOptions();
        });

        // Submit form data via AJAX
        $("#teamForm").submit(function(e) {
            e.preventDefault();

            let teamLeader = $("#teamLeader").val();
            let teamMembers = [];

            $("input[name='teamMembers[]']").each(function() {
                teamMembers.push($(this).val().trim());
            });

            $.ajax({
                url: "<?= base_url('participant/update_team') ?>",
                type: "POST",
                data: {
                    rpi_id: <?= $paper->rpi_id ?>, // Assuming this is the paper ID
                    presenter: teamLeader,
                    teamMembers: teamMembers
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        Swal.fire("Success!", response.message, "success");
                    } else {
                        Swal.fire("Error!", response.message, "error");
                    }
                },
                error: function() {
                    Swal.fire("Error!", "Failed to update the team.", "error");
                }
            });
        });
    });
</script>

<!-- Delete Attachment Function -->
<script>
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
                    url: "<?= base_url('participant/delete-file') ?>",
                    type: "POST",
                    data: {
                        fileType: fileType
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire("Deleted!", response.message, "success");
                            button.closest("div").html('<input type="file" class="form-control" name="' + fileType + '" required>');
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
</script>