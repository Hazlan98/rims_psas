<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Registered Research Paper Information</h3>
                        <button type="button" class="btn btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                            <i class="fas fa-plus me-1"></i> Add Another Event as Judge
                        </button>

                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Participant</th>
                                            <th>Registration Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($event_info as $event) : ?>
                                            <tr>
                                                <td><?= esc($event->re_name) ?></td>
                                                <td><?= get_category_desc($event->re_rc_id) ?></td>
                                                <td><?= esc($event->re_start_date) ?> - <?= esc($event->re_end_date) ?></td>
                                                <td>0/<?= esc($event->re_max_participants) ?></td>
                                                <td><?= esc($event->re_registration_deadline) ?></td>
                                                <td><?= esc($event->re_status) ?></td>
                                                <td>
                                                    <a href="<?= base_url('judge/event/get_judge_event_dashboard/') . $event->re_id ?>" class="btn btn-sm btn-info">View</a>
                                                    <!-- <button class="btn btn-sm btn-warning">Edit</button> -->
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-event" data-id="<?= $event->re_id ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true,
            "autoWidth": false
        });
    });
</script>



<script>
    // Submit New Event
    //Prevent form submission and use AJAX with SweetAlert confirmation
    $('#newResearchForm').on('submit', function(e) {
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
                    url: "<?= base_url('superAdmin/event/submit_event') ?>",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            // Show success message
                            Swal.fire('Submitted!', 'Your event has been submitted successfully.', 'success');
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

    // Delete Event
    $(document).ready(function() {
        $(document).on('click', '.delete-event', function(e) {
            e.preventDefault(); // Prevent the default link action

            let eventId = $(this).data('id'); // Get event ID
            let deleteBtn = $(this); // Store reference to the button

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
                        url: "<?= base_url('superAdmin/event/delete_event/') ?>" + eventId,
                        type: "POST",
                        data: {
                            id: eventId
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire("Deleted!", response.message, "success");
                                deleteBtn.closest('tr').fadeOut(500, function() {
                                    $(this).remove();
                                }); // Remove the row from the table
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