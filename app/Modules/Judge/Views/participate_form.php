<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 (for dropdown) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    /* Override the Select2 container */
    .select2-container {
        width: 100% !important;
    }

    /* Override the Select2 input */
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
        /* Match Bootstrap's input height */
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
        line-height: 1.5 !important;
        /* Match Bootstrap's line height */
        border-radius: 0.375rem !important;
        /* Match Bootstrap's border radius */
        border: 1px solid #ced4da !important;
        /* Match Bootstrap's border color */
        background-color: #fff !important;
        /* Match Bootstrap's background color */
    }

    /* Override Select2 dropdown */
    .select2-container .select2-dropdown {
        border-radius: 0.375rem !important;
        /* Match Bootstrap's border radius */
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        /* Match Bootstrap's shadow */
        border: 1px solid #ced4da !important;
        /* Match Bootstrap's border color */
    }

    /* Override Select2 search box */
    .select2-container .select2-search--dropdown .select2-search__field {
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's input padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
    }

    /* Option styling for Select2 */
    .select2-container .select2-results__option {
        padding: 0.375rem 0.75rem !important;
        /* Match Bootstrap's padding */
        font-size: 1rem !important;
        /* Match Bootstrap's font size */
    }

    /* Hover effect for options */
    .select2-container .select2-results__option--highlighted {
        background-color: rgb(168, 211, 255) !important;
        /* Match Bootstrap's hover background */
    }
</style>

<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info">
                        <img src="your-image-url.jpg" alt="Icon" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                    </span>

                    <div class="info-box-content">
                        <h5><i class="fas fa-info"></i><b><?= $research_events->re_name ?></b></h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <span class="info-box-text"><strong>Contact:</strong> <?= $research_events->re_contact_email ?></span>
                            <span class="info-box-text"><strong>Location:</strong> <?= $research_events->re_location ?></span>
                        </div>
                        <span class="info-box-number"><?= $research_events->re_description ?></span>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box text-bg-success">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Start Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_start_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-danger">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Registration Deadline</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_registration_deadline)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-warning">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">End Date</span>
                                <span class="info-box-number"><?= date("d M Y", strtotime($research_events->re_end_date)) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box text-bg-primary">
                            <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Participant</span>
                                <span class="info-box-number">0/<?= $research_events->re_max_participants ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 pt-3">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Your Registered Paper</h3>
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#newResearchModal">
                            New Research Paper
                        </button>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button class="btn btn-secondary">Copy</button>
                                        <button class="btn btn-secondary">CSV</button>
                                        <button class="btn btn-secondary">Excel</button>
                                        <button class="btn btn-secondary">PDF</button>
                                        <button class="btn btn-secondary">Print</button>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination mb-0">
                                            <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="paginate_button page-item next"><a href="#" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Abstract</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1;
                                            foreach ($research_papers as $paper): ?>
                                                <tr>
                                                    <td><?= $counter++; ?></td>
                                                    <td><?= get_category_desc($paper->rpi_rc_id); ?></td>
                                                    <td><?= $paper->rpi_title ?></td>
                                                    <td><?= $paper->rpi_abstract ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-info btn-sm view-btn" data-id="<?= $paper->rpi_id; ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <?php if ($paper->rpi_submitted_at == null): ?>
                                                                <a href="<?= base_url('participant/get-rpi-update-form/') . $paper->rpi_id ?>" class="btn btn-warning btn-sm update-btn">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
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

            </div>

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- New Registration Modal -->
<div class="modal fade" id="newResearchModal" tabindex="-1" aria-labelledby="newResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newResearchModalLabel">Submit New Research Paper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Inside Modal -->
                <form action="<?= base_url('participant/submit-research-paper') ?>" method="post" enctype="multipart/form-data" id="newResearchForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="projectTitle" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
                        </div>
                        <div class="col-md-6">
                            <label for="projectCategory" class="form-label">Project Category</label><br>
                            <select class="form-control select2" id="projectCategory" name="projectCategory" required>
                                <option value="">Select Category</option>
                                <?php foreach ($research_category as $category): ?>
                                    <option value="<?= $category->rc_id ?>"><?= $category->rc_desc ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="paperFile" class="form-label">Upload Project Abstract (PDF)</label>
                        <input type="file" class="form-control" id="paperFile" name="paperFile" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Team Members</label>
                        <div id="teamContainer">
                            <div class="input-group mb-2 team-member">
                                <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                                <button type="button" class="btn btn-danger remove-member" style="display:none;">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" id="addMember">Add Another</button>
                    </div>

                    <!-- New Selection Input -->
                    <div class="mb-3">
                        <label for="teamLeader" class="form-label">Select Presenter</label>
                        <select class="form-control select2" id="teamLeader" name="teamLeader" required>
                            <option value="">Select a Team Member</option>
                        </select>
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
                        <input type="file" class="form-control" id="proofOfPayment" name="proofOfPayment" accept=".pdf, .jpg, .jpeg, .png" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" id="saveDraft">Save</button>
                        <button type="submit" class="btn btn-primary">Submit Paper</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Research Paper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Project Title:</strong> <span id="viewProjectTitle"></span></p>
                <p><strong>Category:</strong> <span id="viewCategory"></span></p>

                <h6><strong>Team Members:</strong></h6>
                <ul id="viewTeamMembers" class="list-group mb-3"></ul>

                <h6><strong>Abstract:</strong></h6>
                <a id="viewAbstract" class="btn btn-primary" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i> View Abstract
                </a>


                <h6><strong>Submitted At:</strong> <span id="viewSubmittedAt"></span></h6>
                <h6><strong>Status:</strong> <span id="viewStatus" class="badge bg-info"></span></h6>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<!-- Update Modal -->
<!-- Update Modal -->
<!-- <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Research Paper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm">
                <div class="modal-body">
                    <input type="hidden" id="updateRpiId" name="rpi_id">

                    <div class="mb-3">
                        <label for="updateProjectTitle" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="updateProjectTitle" name="projectTitle" required>
                    </div>

                    <div class="mb-3">
                        <label for="updateCategory" class="form-label">Category</label>
                        <select class="form-control" id="updateCategory" name="projectCategory" required></select>
                    </div>

                    <div class="mb-3">
                        <label for="updatePresenter" class="form-label">Presenter</label>
                        <select class="form-control" id="updatePresenter" name="teamLeader" required></select>
                    </div>

                    <div class="mb-3">
                        <label for="updateTeamMembers" class="form-label">Team Members</label>
                        <input type="text" class="form-control" id="updateTeamMembers" name="teamMembers" required>
                    </div>

                    <div class="mb-3">
                        <label for="updatePaperFile" class="form-label">Upload Updated Paper (PDF, Max: 2MB)</label>
                        <input type="file" class="form-control" id="updatePaperFile" name="paperFile" accept=".pdf">
                    </div>

                    <div class="mb-3">
                        <label for="updateProofOfPayment" class="form-label">Proof of Payment (Optional)</label>
                        <input type="file" class="form-control" id="updateProofOfPayment" name="proofOfPayment" accept=".pdf">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> -->


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof jQuery === 'undefined') {
            console.error("jQuery is not loaded. Make sure to include it before running this script.");
            return;
        }

        $('.select2').select2({
            placeholder: 'Select Category',
            allowClear: true,
            dropdownParent: $('#newResearchModal') // Specify the modal as the parent for the Select2 dropdown
        });

    });
</script>
<!-- JavaScript to Update Selection List -->
<script>
    $(document).ready(function() {
        // Function to update the Presentor dropdown
        function updateTeamLeaderOptions() {
            let teamLeaderSelect = $("#teamLeader");
            teamLeaderSelect.empty();
            teamLeaderSelect.append('<option value="">Select a Team Member</option>');

            $(".team-member input[name='teamMembers[]']").each(function() {
                let memberName = $(this).val();
                if (memberName.trim() !== "") {
                    teamLeaderSelect.append('<option value="' + memberName + '">' + memberName + '</option>');
                }
            });
        }

        // Add new team member input
        $("#addMember").click(function() {
            let newMember = `
            <div class="input-group mb-2 team-member">
                <input type="text" class="form-control" name="teamMembers[]" placeholder="Enter team member name" required>
                <button type="button" class="btn btn-danger remove-member">Remove</button>
            </div>
        `;
            $("#teamContainer").append(newMember);
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

        // AJAX Form Submission
        $("#newResearchForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to submit the research paper?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, submit it!",
                cancelButtonText: "No, cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData(this);

                    $.ajax({
                        url: "<?= base_url('participant/submit-research-paper') ?>", // Your controller endpoint
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Submitting...",
                                text: "Please wait",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Research paper submitted successfully!",
                            }).then(() => {
                                location.reload(); // Reload to reset form
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "Submission Failed",
                                text: xhr.responseText || "Something went wrong!",
                            });
                        },
                    });
                }
            });
        });

        // AJAX Save Draft
        $("#saveDraft").click(function(event) {
            event.preventDefault(); // Prevent default behavior

            let formData = new FormData($("#newResearchForm")[0]);
            formData.append("is_draft", "1"); // Flag for draft submission

            Swal.fire({
                title: "Save as Draft?",
                text: "You can edit and submit later.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Save!",
                cancelButtonText: "No, Cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('participant/save-research-draft') ?>", // Draft save endpoint
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: "Saving...",
                                text: "Please wait",
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Saved!",
                                text: "Your research paper is saved as a draft.",
                            }).then(() => {
                                location.reload(); // Reload to reset form
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "Save Failed",
                                text: xhr.responseText || "Something went wrong!",
                            });
                        },
                    });
                }
            });
        });

    });
</script>


<!-- JavaScript to View Research Paper -->
<script>
    $(document).ready(function() {
        // View Research Paper
        $(".view-btn").click(function() {
            let rpi_id = $(this).data("id");

            $.ajax({
                url: "<?= base_url('participant/get-research-paper') ?>",
                type: "GET",
                data: {
                    rpi_id: rpi_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        let paper = response.response.paper;
                        let teamMembers = response.response.team_members;

                        // Set paper details
                        $("#viewProjectTitle").text(paper.rpi_title);
                        $("#viewCategory").text(paper.category_desc); // Adjust if category name is needed
                        // $("#viewAbstract").text(paper.rpi_abstract);
                        // Set the Abstract button link
                        $("#viewAbstract").attr("href", "<?= base_url('') ?>" + paper.rpi_abstract);

                        $("#viewSubmittedAt").text(paper.rpi_submitted_at ?? "Not Submitted");
                        $("#viewStatus").text(paper.rpi_status);

                        // Populate team members list
                        let teamList = $("#viewTeamMembers");
                        teamList.empty(); // Clear previous data

                        if (teamMembers.length > 0) {
                            teamMembers.forEach(member => {
                                teamList.append(`<li class="list-group-item">${member.rrt_name} - ${member.rrt_role}</li>`);
                            });
                        } else {
                            teamList.append(`<li class="list-group-item text-muted">No team members found</li>`);
                        }

                        // Show modal
                        $("#viewModal").modal("show");
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to fetch data", "error");
                }
            });
        });
        // Load existing data into the update form
        // $(".update-btn").click(function() {
        //     let rpi_id = $(this).data("id");

        //     $.ajax({
        //         url: "<?= base_url('participant/get-research-paper') ?>",
        //         type: "GET",
        //         data: {
        //             rpi_id: rpi_id
        //         },
        //         dataType: "json",
        //         success: function(response) {
        //             if (response.success) {

        //                 let paper = response.response.paper;
        //                 let teamMembers = response.response.team_members;

        //                 $("#updateRpiId").val(paper.rpi_id);
        //                 $("#updateProjectTitle").val(paper.rpi_title);

        //                 // Populate category dropdown
        //                 $("#updateCategory").html(`<option value="${paper.category_desc}">${paper.category_desc}</option>`);

        //                 // Populate team members list
        //                 // let teamList = $("#viewTeamMembers");
        //                 // teamList.empty(); // Clear previous data

        //                 if (teamMembers.length > 0) {
        //                     teamMembers.forEach(member => {
        //                         // Populate presenter dropdown
        //                         $("#updatePresenter").html(`<option value="${teamMembers.rrt_name}">${teamMembers.rrt_n}</option>`);
        //                     });
        //                 } else {
        //                     // teamList.append(`<li class="list-group-item text-muted">No team members found</li>`);
        //                 }

        //                 // Populate team members
        //                 $("#updateTeamMembers").val(teamMembers.rrt_name);

        //                 $("#updateModal").modal("show");
        //             } else {
        //                 Swal.fire("Error", response.message, "error");
        //             }
        //         },
        //         error: function() {
        //             Swal.fire("Error", "Failed to fetch data", "error");
        //         }
        //     });
        // });

        // Handle Update Form Submission
        // $("#updateForm").submit(function(event) {
        //     event.preventDefault(); // Prevent default form submission

        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "Do you want to update the research paper details?",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonText: "Yes, update it!",
        //         cancelButtonText: "No, cancel",
        //         reverseButtons: true
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             let formData = new FormData(this);

        //             $.ajax({
        //                 url: "<?= base_url('participant/update-research-paper') ?>", // Update Controller
        //                 type: "POST",
        //                 data: formData,
        //                 processData: false,
        //                 contentType: false,
        //                 beforeSend: function() {
        //                     Swal.fire({
        //                         title: "Updating...",
        //                         text: "Please wait",
        //                         allowOutsideClick: false,
        //                         didOpen: () => {
        //                             Swal.showLoading();
        //                         },
        //                     });
        //                 },
        //                 success: function(response) {
        //                     Swal.fire({
        //                         icon: "success",
        //                         title: "Updated",
        //                         text: "Research paper updated successfully!",
        //                     }).then(() => {
        //                         location.reload(); // Reload to reflect updates
        //                     });
        //                 },
        //                 error: function(xhr) {
        //                     Swal.fire({
        //                         icon: "error",
        //                         title: "Update Failed",
        //                         text: xhr.responseText || "Something went wrong!",
        //                     });
        //                 },
        //             });
        //         }
        //     });
        // });
    });
</script>