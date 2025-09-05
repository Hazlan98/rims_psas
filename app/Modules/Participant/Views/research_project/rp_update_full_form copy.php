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
                        <form id="updateForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="project_link" class="form-label">Project Link</label>
                                    <input type="url" class="form-control" id="project_link" name="project_link"
                                        value="<?= !empty($rpi_info->rpi_presentation_link) ? $rpi_info->rpi_presentation_link : '' ?>"
                                        placeholder="Enter project link" required>
                                </div>

                                <!-- Turnitin Report -->
                                <div class="mb-3">
                                    <label class="form-label">Turnitin Report (PDF)</label>
                                    <?php if (!empty($rpi_info->rpi_turnitin_report)): ?>
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url($rpi_info->rpi_turnitin_report) ?>" target="_blank" class="btn btn-outline-primary flex-grow-1">
                                                <i class="fas fa-file-pdf"></i> View Turnitin Report
                                            </a>
                                            <button type="button" class="btn btn-danger ms-2 deleteFile" data-type="turnitin_report">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <input type="file" class="form-control" id="turnitin_report" name="turnitin_report" accept=".pdf">
                                    <?php endif; ?>
                                </div>

                                <!-- Full Report -->
                                <div class="mb-3">
                                    <label class="form-label">Full Report (PDF)</label>
                                    <?php if (!empty($rpi_info->rpi_full_paper)): ?>
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url($rpi_info->rpi_full_paper) ?>" target="_blank" class="btn btn-outline-primary flex-grow-1">
                                                <i class="fas fa-file-pdf"></i> View Full Report
                                            </a>
                                            <button type="button" class="btn btn-danger ms-2 deleteFile" data-type="full_report">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <input type="file" class="form-control" id="full_report" name="full_report" accept=".pdf">
                                    <?php endif; ?>
                                </div>

                                <!-- Proof of Payment -->
                                <div class="mb-3">
                                    <label class="form-label">Proof of Payment (PDF/Image)</label>
                                    <?php if (!empty($rpi_info->rpi_proof_of_payment)): ?>
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url($rpi_info->rpi_proof_of_payment) ?>" target="_blank" class="btn btn-outline-success flex-grow-1">
                                                <i class="fas fa-receipt"></i> View Proof of Payment
                                            </a>

                                            <?php if ($rpi_info->rpi_status == 'Full Report Draft'): // Only allow deletion if not "Approved" 
                                            ?>
                                                <button type="button" class="btn btn-danger ms-2 deleteFile" data-type="proof_of_payment">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <input type="file" class="form-control" id="proofOfPayment" name="proofOfPayment" accept=".pdf, .jpg, .jpeg, .png">
                                    <?php endif; ?>
                                </div>


                                <div id="uploadStatus"></div> <!-- Message area -->
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-warning" id="draftBtn">Save as Draft</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Upload</button>
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
                    url: "<?= base_url('participant/research_project/delete-file') ?>",
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