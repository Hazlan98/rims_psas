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
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                            <i class="fas fa-plus me-1"></i> Add Research Event
                        </button>

                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Participant</th>
                                            <th>Registration Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($research as $event) : ?>
                                            <tr>
                                                <td><?= esc($event->re_name) ?></td>
                                                <td><?= esc($event->re_start_date) ?> - <?= esc($event->re_end_date) ?></td>
                                                <td>0/<?= esc($event->re_max_participants) ?></td>
                                                <td><?= esc($event->re_registration_deadline) ?></td>
                                                <td><?= esc($event->re_status) ?></td>
                                                <td>
                                                    <a href="<?= base_url('superAdmin/research/get-research-data/') . $event->re_id ?>" class="btn btn-sm btn-info">View</a>
                                                    <button class="btn btn-sm btn-warning">Edit</button>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
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

<!-- Modal -->
<div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="newResearchModalLabel">Submit New Research Paper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Inside Modal -->
                <form method="post" enctype="multipart/form-data" id="newResearchForm">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="re_name" required>
                        </div>

                        <div class="col-md-4">

                            <label for="maxParticipants" class="form-label">Maximum Participants</label>
                            <input type="number" class="form-control" id="maxParticipants" name="re_max_participants" min="1">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="re_start_date" required>
                        </div>
                        <div class="col-md-4">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="re_end_date" required>
                        </div>
                        <div class="col-md-4">
                            <label for="registrationDeadline" class="form-label">Registration Deadline</label>
                            <input type="date" class="form-control" id="registrationDeadline" name="re_registration_deadline">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="eventLocation" class="form-label">Event Location</label>
                        <input type="text" class="form-control" id="eventLocation" name="re_location">
                    </div>

                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" id="eventDescription" name="re_description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="eventOrganizer" class="form-label">Event Organizer</label>
                        <input type="text" class="form-control" id="eventOrganizer" name="re_organizer" required>
                    </div>

                    <div class="mb-3">
                        <label for="bannerImage" class="form-label">Banner Image</label>
                        <input type="file" class="form-control" id="bannerImage" name="re_banner_image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="contactEmail" name="re_contact_email">
                    </div>

                    <!-- <div class="mb-3">
                        <label for="speakers" class="form-label">Speakers</label>
                        <textarea class="form-control" id="speakers" name="re_speakers" rows="4"></textarea>
                    </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

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
    // Prevent form submission and use AJAX with SweetAlert confirmation
    $('#newResearchForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to submit this event?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Get form data
                var formData = new FormData(this);

                // Send AJAX request
                $.ajax({
                    url: "<?= base_url('superAdmin/event/submit_research_event') ?>",
                    type: 'post',
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
</script>