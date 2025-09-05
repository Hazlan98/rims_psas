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
                                                <th>Status</th>
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
                                                    <td><?= $paper->rpi_status ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('superAdmin/research/get-participant-research-data/') . $paper->rpi_id ?>" class="btn btn-info btn-sm view-btn">
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
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>