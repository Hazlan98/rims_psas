<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (required for Select2 and dynamic elements) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 (for dropdown) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    :root {
        --primary-color: #1a3b69;
        --secondary-color: #e6eef7;
        --accent-color: #3d7ab8;
        --text-color: #333;
        --light-gray: #f8f9fa;
        --border-radius: 6px;
    }

    body {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        color: var(--text-color);
        background-color: #f5f7fa;
    }

    .page-header {
        background-color: var(--primary-color);
        color: white;
        padding: 30px 0;
        margin-bottom: 30px;
        position: relative;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--accent-color), var(--primary-color));
    }

    .category-header {
        border-left: 5px solid var(--accent-color);
        padding-left: 15px;
        margin-bottom: 20px;
        color: var(--primary-color);
        font-weight: 600;
    }

    .event-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: var(--border-radius);
        overflow: hidden;
        height: 100%;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    .card-img-container {
        height: 180px;
        overflow: hidden;
        position: relative;
    }

    .card-img-top {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .event-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(26, 59, 105, 0.8);
        color: white;
        padding: 5px 10px;
        border-bottom-left-radius: var(--border-radius);
        font-size: 0.8rem;
    }

    .card-body {
        padding: 1.5rem;
        background-color: white;
    }

    .card-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 15px;
        font-size: 1.1rem;
        line-height: 1.4;
    }

    .deadline-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #6c757d;
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .deadline-badge {
        background-color: var(--primary-color);
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
    }

    .view-details-btn {
        width: 100%;
        background-color: var(--accent-color);
        border: none;
        margin-top: 15px;
        transition: background-color 0.3s ease;
    }

    .view-details-btn:hover {
        background-color: var(--primary-color);
    }

    .event-category {
        margin-bottom: 50px;
    }

    .section-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
        margin: 30px 0;
    }

    .no-events {
        padding: 30px;
        text-align: center;
        background-color: var(--light-gray);
        border-radius: var(--border-radius);
    }
</style>

<div class="page-header">
    <div class="container">
        <h1><i class="fas fa-calendar-alt me-2"></i> PSAS Events</h1>
        <p class="lead mb-0">Discover and register for our upcoming events</p>
    </div>
</div>

<div class="content py-4">
    <div class="container">
        <?php foreach ($event_categories as $category): ?>
            <div class="event-category">
                <h3 class="category-header">
                    <?= $category->rc_desc ?>
                </h3>

                <div class="row g-4">
                    <?php
                    $hasEvents = false;
                    foreach ($events as $event):
                        if ($event->re_rc_id == $category->rc_id):
                            $hasEvents = true;
                    ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="event-card card h-100">
                                    <div class="card-img-container">
                                        <img src="<?= base_url('uploads/events/' . $event->re_banner_image) ?>" class="card-img-top" alt="<?= $event->re_name ?>">
                                        <div class="card-overlay">
                                            <i class="fas fa-star me-1"></i> Featured
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?= $event->re_name ?></h5>

                                        <div class="mt-auto">
                                            <div class="deadline-label">
                                                <i class="far fa-clock"></i> Registration Deadline:
                                            </div>
                                            <div class="deadline-badge">
                                                <i class="fas fa-calendar-day me-1"></i>
                                                <?= date('d M Y', strtotime($event->re_registration_deadline)) ?>
                                            </div>

                                            <a href="<?= base_url('participant/event/get_participant_event_dashboard/') . $event->re_id ?>" class="btn btn-primary view-details-btn mt-3">
                                                <i class="fas fa-info-circle me-1"></i> View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif;
                    endforeach;

                    if (!$hasEvents):
                        ?>
                        <div class="col-12">
                            <div class="no-events">
                                <i class="fas fa-calendar-times fa-3x mb-3 text-muted"></i>
                                <h5>No events available in this category</h5>
                                <p class="text-muted">Check back later for upcoming events.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="section-divider"></div>
        <?php endforeach; ?>
    </div>
</div>