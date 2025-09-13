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

<style>
    @media (min-width: 1920px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 1620px;
        }
    }
</style>

<div class="container py-4">
    <div class="row">
        <div class="content-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Your Registered Event</h5>
                <a href="<?= base_url('participant/event/active_event_list') ?>" type="button" class="btn btn-primary ms-auto">
                    <i class="fas fa-user-check me-2 text-white"></i>Join Other Event
                </a>
            </div>

            <div class="card-body p-2">
                <div class="table-responsive">
                    <table id="event_list_table" class="table table-hover table-custom">
                        <thead>
                            <tr>
                                <th style="width:53px;">No.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Abstract</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;
                            foreach ($events as $paper): ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                    <td><?= $paper->rc_desc; ?></td>
                                    <td><?= $paper->rpi_title ?></td>
                                    <td><a href="<?= base_url($paper->rpi_abstract) ?>" target="_blank" class="btn btn-outline-success w-100 document-link"> <i class="fas fa-file-alt"></i> Abstract</td>
                                    <td>
                                        <center>
                                            <?= get_rims_participant_status($paper->rpi_status) ?>
                                        </center>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('participant/research_project/get_rp_details/') . $paper->rpi_id ?>" class="btn btn-outline-primary btn-sm view-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php if ($paper->rpi_submitted_at == null || $paper->rpi_status == 'returned'): ?>
                                                <a href="<?= base_url('participant/research_project/get-rp-update-form/') . $paper->rpi_id ?>" class="btn btn-warning btn-sm update-btn">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($paper->rpi_status == 'Draft'): ?>
                                                <button data-id="<?= $paper->rpi_id; ?>" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            <?php endif; ?>
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

<!-- Helper function for status color -->
<script>
    // Initialize DataTables and Select2
    $(document).ready(function() {
        // Initialize participant table with DataTables
        $('#event_list_table').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search events...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ events",
                infoEmpty: "Showing 0 to 0 of 0 events",
                infoFiltered: "(filtered from _MAX_ total events)",
                zeroRecords: "No matching events found",
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
            ], // Default sort by the first column
            // Only add pagination if there are enough entries
            paging: <?= (count($events) > 10) ? 'true' : 'false' ?>,
            pageLength: 10,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });

        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('#newResearchModal')
        });
    });
</script>