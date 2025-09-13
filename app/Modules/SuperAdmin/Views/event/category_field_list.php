<!-- Hazlan Custom Template -->
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/event.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/modal.css'); ?>">
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


<!-- Custom CSS for corporate look -->
<style>
    .accordion-button {
        background-color: var(--secondary-color);
        color: lightgrey;
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: var(--primary-color);
        color: white;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .accordion-item {
        border: 1px solid rgba(0, 0, 0, .125);
        margin-bottom: 0.5rem;
        border-radius: var(--border-radius);
        overflow: hidden;
    }
</style>
<div class="content p-4">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>
                        <i class="fas fa-user-check me-2 text-primary"></i>
                        Registered Research Paper Information
                    </h5>
                    <button type="button" class="btn btn-primary btn-custom-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                        <i class="fas fa-plus me-1"></i> Add Field
                    </button>
                </div>
                <div class="card-body p-2">
                    <!-- For each Category -->
                    <div class="row mt-3">
                        <?php $counter = 0;
                        foreach ($category_list as $category) : ?>
                            <div class="col-12 mb-3">
                                <!-- Changed the accordion ID to be unique by using the category ID -->
                                <div class="accordion" id="accordionCategory<?= $category->rc_id ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?= $category->rc_id ?>">
                                            <!-- Modified the aria-expanded to allow toggling and removing data-bs-parent to prevent auto-close -->
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?= $category->rc_id ?>"
                                                aria-expanded="false"
                                                aria-controls="collapse<?= $category->rc_id ?>">
                                                <i class="fas fa-bookmark me-2"></i> <?= $category->rc_desc ?>
                                            </button>
                                        </h2>
                                        <!-- Changed the ID to match the category ID -->
                                        <div id="collapse<?= $category->rc_id ?>" class="accordion-collapse collapse"
                                            aria-labelledby="heading<?= $category->rc_id ?>">
                                            <div class="accordion-body p-3">
                                                <div class="table-responsive">
                                                    <!-- Changed the table ID to use category ID for uniqueness -->
                                                    <table id="dataTable<?= $category->rc_id ?>" class="table table-hover table-custom">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th>Fields Description</th>
                                                                <th width="15%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $row_counter = 1 ?>
                                                            <?php foreach ($field_list as $fields) : ?>
                                                                <?php if ($category->rc_id == $fields->rf_rc_id): ?>
                                                                    <tr>
                                                                        <td><?= $row_counter ?></td>
                                                                        <td><?= esc($fields->rf_desc) ?></td>
                                                                        <td>
                                                                            <button class="btn btn-sm btn-danger deleteFieldBtn" data-id="<?= $fields->rf_id ?>">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $row_counter++ ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++ ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Research Field Modal -->
<div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newResearchModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add New Research Field
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('superAdmin/category/insert-new-field') ?>" enctype="multipart/form-data" id="newResearchForm">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="categorySelect" class="form-label">Select Category</label>
                        <select style="width:100%;" class="form-select select2" id="categorySelect" name="category" required>
                            <option value="">Select a category</option>
                            <?php foreach ($category_list as $category) : ?>
                                <option value="<?= esc($category->rc_id) ?>"><?= esc($category->rc_desc) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fieldDescription" class="form-label">Field Description</label>
                        <input type="text" class="form-control" id="fieldDescription" name="fieldDesc" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-custom-danger" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Close
                        </button>
                        <button type="submit" class="btn btn-custom-primary">
                            <i class="fas fa-paper-plane me-1"></i> Submit
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Initialize DataTables for each accordion section
        <?php foreach ($category_list as $category) : ?>
            $('#dataTable<?= $category->rc_id ?>').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search fields...",
                    lengthMenu: "_MENU_ entries per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ fields",
                    infoEmpty: "Showing 0 to 0 of 0 fields",
                    infoFiltered: "(filtered from _MAX_ total fields)",
                    zeroRecords: "No matching fields found",
                    paginate: {
                        first: '<i class="fas fa-angle-double-left"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        next: '<i class="fas fa-angle-right"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>'
                    }
                },
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                order: [
                    [0, 'asc']
                ],
                // Set paging to true and ensure the length menu is displayed
                paging: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                lengthChange: true, // Explicitly enable length change option
            });
        <?php endforeach; ?>

        // Initialize Select2
        $('.select2').select2({
            dropdownParent: $('#newResearchModal')
        });

        // Form submission with SweetAlert confirmation
        $('#newResearchForm').on('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Submission',
                text: 'Are you sure you want to add this research field?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, submit',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#1a3c6e',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData(this);

                    $.ajax({
                        url: "<?= base_url('superAdmin/category/insert-new-field') ?>",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Research field has been added successfully.',
                                    icon: 'success',
                                    confirmButtonColor: '#1a3c6e'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message || 'An error occurred during submission.',
                                    icon: 'error',
                                    confirmButtonColor: '#1a3c6e'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an issue with the submission. Please try again.',
                                icon: 'error',
                                confirmButtonColor: '#1a3c6e'
                            });
                        }
                    });
                }
            });
        });
    });

    $(document).on('click', '.deleteFieldBtn', function() {
        // CSRF token initialization
        let csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';
        let fieldId = $(this).data('id'); // Get the field ID from the button's data attribute

        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the research field.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('superAdmin/category/delete-field') ?>",
                    type: "POST",
                    data: {
                        id: fieldId,
                        [csrfName]: csrfHash,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#1a3c6e'
                            }).then(() => {
                                location.reload(); // Refresh the page after success
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonColor: '#1a3c6e'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete the research field. Please try again.',
                            icon: 'error',
                            confirmButtonColor: '#1a3c6e'
                        });
                    }
                });
            }
        });
    });
</script>