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
            <div class="col-lg-7 mt-3">
                <iframe src="<?= base_url($rpi->rpi_abstract) . '#toolbar=0' ?>" width="100%" height="900px" style="border-radius:1rem;"></iframe>
            </div>
            <div class="col-lg-5 mt-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <img src="your-image-url.jpg" alt="Icon" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                    </span>

                    <div class="info-box-content">
                        <h5><i class="fas fa-info"></i><b><?= $rpi->rpi_title ?></b></h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <span class="info-box-text"><strong>Presentor:</strong> <?= $rpi->rpi_title ?></span>
                            <span class="info-box-text"><strong>Location:</strong> <?= $rpi->rpi_title ?></span>
                        </div>
                        <span class="info-box-number"><?= $rpi->rpi_title ?></span>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header border-0">
                        <h3 class="card-title">Research Details</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-download"></i> </a>
                            <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-list"></i> </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($team_members as $members): ?>
                                    <tr>
                                        <td>
                                            <?= $members->rrt_name ?>
                                        </td>
                                        <td>
                                            <?= $members->rrt_role ?>
                                        </td>
                                    </tr>
                                <?PHP endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Button container aligned to the right -->
                <?php if ($rpi->rpi_status !== 'approved' && $rpi->rpi_status !== 'returned') : ?>
                    <?php if ($rpi->rpi_payment_verification == '1') : ?>

                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-success me-2" id="approveBtn">Approve</button>
                            <button class="btn btn-danger" id="returnBtn">Return</button>
                        </div>
                    <?php else: ?>
                        <div class="mt-3 text-danger fw-bold">
                            Waiting financial officer verification on payment.
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="mt-3 text-success fw-bold">
                        <?= ($rpi->rpi_status === 'approved') ? "This has already been approved." : "This has been returned." ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $("#approveBtn").click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to approve this submission.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Sending AJAX request...');

                    $.ajax({
                        url: "<?= site_url('superAdmin/review/update_status') ?>",
                        type: "POST",
                        data: {
                            id: "<?= $rpi->rpi_id ?>",
                            status: "approved"
                        },
                        success: function(response) {
                            console.log('Success:', response);
                            Swal.fire("Approved!", "The submission has been approved.", "success")
                                .then(() => location.reload());
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            console.log('Full Response:', xhr.responseText); // Log the full response
                            Swal.fire("Error!", "Something went wrong: " + xhr.responseText, "error");
                        }
                    });
                }
            });
        });

        $("#returnBtn").click(function() {
            Swal.fire({
                title: "Enter return remarks",
                input: "textarea",
                inputPlaceholder: "Enter your reason...",
                showCancelButton: true,
                confirmButtonText: "Submit",
                cancelButtonText: "Cancel",
                preConfirm: (remarks) => {
                    if (!remarks) {
                        Swal.showValidationMessage("Remarks are required!");
                    }
                    return remarks;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('superAdmin/review/update_status') ?>",
                        type: "POST",
                        data: {
                            id: "<?= $rpi->rpi_id ?>",
                            status: "returned",
                            remarks: result.value
                        },
                        success: function(response) {
                            Swal.fire("Returned!", "The submission has been returned.", "info")
                                .then(() => location.reload());
                        }
                    });
                }
            });
        });
    });
</script>