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
            <div class="col-lg-12 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box text-bg-success">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Start Date</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-danger">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Registration Deadline</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-warning">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">End Date</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-primary">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Participant</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 pt-3">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Your Registered Paper</h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Payment Proof</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1;
                                            foreach ($rpi_info as $paper): ?>
                                                <tr id="row-<?= $paper->rpi_id ?>">
                                                    <td><?= $counter++; ?></td>
                                                    <td><?= get_field_desc($paper->rpi_rf_id); ?></td>
                                                    <td><?= $paper->rpi_title ?></td>
                                                    <td>
                                                        <a href="<?= base_url($paper->rpi_proof_of_payment) ?>" class="btn btn-primary" target="_blank">
                                                            File
                                                        </a>
                                                    </td>
                                                    <td id="status-<?= $paper->rpi_id ?>">
                                                        <?php if ($paper->rpi_payment_verification == 1): ?>
                                                            <span class="badge text-white bg-primary">Payment Accepted</span>
                                                        <?php elseif ($paper->rpi_payment_verification == NULL): ?>
                                                            <span class="badge text-white bg-warning">Pending</span>
                                                        <?php elseif ($paper->rpi_payment_verification == 0): ?>
                                                            <span class="badge text-white bg-danger">Proof Rejected</span>
                                                        <?php else: ?>
                                                            <span class="badge text-white bg-danger">Proof Rejected</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($paper->rpi_payment_verification == '1' || $paper->rpi_payment_verification == '0'): ?>
                                                            <span class="badge text-white bg-success">No Action Needed</span>
                                                        <?php else: ?>

                                                            <div class="btn-group">
                                                                <button class="btn btn-success btn-sm approve-btn" data-id="<?= $paper->rpi_id ?>">
                                                                    <i class="fas fa-check"></i> Approve
                                                                </button>
                                                                <button class="btn btn-danger btn-sm reject-btn" data-id="<?= $paper->rpi_id ?>">
                                                                    <i class="fas fa-times"></i> Reject
                                                                </button>
                                                            </div>
                                                        <?php endif ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Approve button
        $('.approve-btn').click(function() {
            var paperId = $(this).data('id');
            confirmUpdate(paperId, 'Approved', 'Are you sure you want to approve this payment?');
        });

        // Function to show confirmation dialog
        function confirmUpdate(paperId, status, message) {
            Swal.fire({
                title: "Confirmation",
                text: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Yes, proceed!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateStatus(paperId, status);
                }
            });
        }

        // Reject button with reason input
        $('.reject-btn').click(function() {
            var paperId = $(this).data('id');

            Swal.fire({
                title: "Reject Payment",
                input: "textarea",
                inputPlaceholder: "Enter reason for rejection...",
                inputAttributes: {
                    "aria-label": "Enter reason for rejection"
                },
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Reject",
                cancelButtonText: "Cancel",
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage("Please enter a reason for rejection");
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    updateStatus(paperId, 'Rejected', result.value);
                }
            });
        });

        // Function to update status via AJAX
        function updateStatus(paperId, status, reason = '') {
            let csrfName = '<?= csrf_token() ?>';
            let csrfHash = '<?= csrf_hash() ?>';

            $.ajax({
                url: "<?= base_url('finance/research_project/update-payment-status') ?>",
                type: "POST",
                data: {
                    rpi_id: paperId,
                    status: status,
                    reason: reason, // Send rejection reason
                    [csrfName]: csrfHash,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $('#status-' + paperId).html('<span class="badge text-white bg-danger">Proof Rejected</span>');

                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Payment status updated successfully!",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to update status.",
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong!",
                    });
                }
            });
        }
    });
</script>