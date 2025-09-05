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
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <a href="<?= base_url('uploads/events/') . $event_info->re_banner_image ?>" target="_blank">
                            <img src="<?= base_url('uploads/events/') . $event_info->re_banner_image ?>" alt="Icon" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                        </a>
                    </span>
                    <div class="info-box-content">
                        <h5><b><?= $event_info->re_name ?></b></h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <span class="info-box-text"><strong>Contact:</strong> <?= $event_info->re_contact_email ?></span>
                            <span class="info-box-text"><strong>Location:</strong> <?= $event_info->re_location ?></span>
                        </div>
                        <span class="info-box-number"><?= $event_info->re_description ?></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box text-bg-success">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Start Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($event_info->re_start_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-danger">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Registration Deadline</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($event_info->re_registration_deadline)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-warning">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">End Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($event_info->re_end_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-primary">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Participant</span>
                                <span class="info-box-number">0/<?= $event_info->re_max_participants ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9 pt-3">

                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Your Registered participant:</h3>
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
                                                <th>Abstract</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1;
                                            foreach ($registered_participant as $participant): ?>
                                                <tr>
                                                    <td><?= $counter++; ?></td>
                                                    <td><?= get_field_desc($participant->rpi_rf_id); ?></td>
                                                    <td><?= $participant->rpi_title ?></td>
                                                    <td><a href="<?= base_url($participant->rpi_abstract) ?>" class="btn btn-sm btn-info" target="_blank">abstract</a></td>
                                                    <td><?= get_rims_admin_status($participant->rpi_status) ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('superAdmin/participant/get-participation-data/') . $participant->rpi_id ?>" class="btn btn-info btn-sm view-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
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
            <div class="col-lg-3 pt-3">

                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Field For This Event:</h3>
                        <button type="button" class="btn btn-sm btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addField">
                            <i class="fas fa-plus me-1"></i> Add Field
                        </button>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Field</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $field_counter = 1;
                                            foreach ($event_field as $field): ?>
                                                <tr>
                                                    <td><?= $field->rf_desc; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <!-- <a href="<?= base_url('superAdmin/research/get-participant-research-data/') . $field->rf_desc; ?>" class="btn btn-info btn-sm view-btn text-white">
                                                                <i class="fas fa-eye"></i>
                                                            </a> -->
                                                            <button data-id="<?= $field->ref_id; ?>" class="btn btn-danger btn-sm delete-btn">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
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

<!-- Modal -->
<div class="modal fade" id="addField" tabindex="-1" aria-labelledby="addField" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addField">Add Field to Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Inside Modal -->
                <form method="post" enctype="multipart/form-data" id="addFieldForm">

                    <input name="ref_re_id" value="<?= $event_info->re_id ?>" hidden>
                    <div class="row mb-3">
                        <label for="eventField" class="form-label">Event Field</label>
                        <select class="form-control select2" id="eventField" name="ref_rf_id">
                            <option value="">-- Select Field to Add --</option>
                            <?php foreach ($rims_field as $field): ?>
                                <option value="<?= $field->rf_id ?>"><?= $field->rf_desc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    //Prevent form submission and use AJAX with SweetAlert confirmation
    $('#addFieldForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        //Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to submit this event?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                //Get form data
                var formData = new FormData(this);

                // Send AJAX request
                $.ajax({
                    url: "<?= base_url('superAdmin/event/add_event_field') ?>",
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            // Show success message
                            Swal.fire('Submitted!', 'Event field Has been added', 'success');
                            // Optionally, you can redirect or reset the form
                            location.reload();
                        } else {
                            // Show error message
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        Swal.fire('Error!', 'There was an issue with the submission. Please try again.', 'error');
                    }
                });
            }
        });
    });

    //Remove event Field
    $(document).on('click', '.delete-btn', function() {
        let id = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('superAdmin/event/remove_event_fields/') ?>" + id,
                    type: "DELETE",
                    success: function(response) {
                        Swal.fire("Deleted!", response.message, "success");
                        location.reload();
                    },
                    error: function() {
                        Swal.fire("Error!", "Failed to delete record.", "error");
                    }
                });
            }
        });
    });
</script>