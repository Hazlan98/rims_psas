<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    :root {
        --primary-color: #3f51b5;
        --primary-light: #757de8;
        --primary-dark: #002984;
        --accent-color: #ff4081;
        --warning-color: #ff9800;
        --success-color: #4caf50;
        --danger-color: #f44336;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-500: #adb5bd;
        --gray-600: #6c757d;
        --gray-700: #495057;
        --gray-800: #343a40;
        --gray-900: #212529;
    }

    body {
        margin: 0;
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--gray-800);
        text-align: left;
        background-color: var(--gray-100);
    }

    /* Card Styles */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .card:hover {
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--gray-200);
        background-color: white;
    }

    .card-title {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 1.1rem;
        margin: 0;
        color: var(--gray-800);
    }

    .card-title i {
        margin-right: 8px;
        color: var(--primary-color);
    }

    .card-header-actions {
        display: flex;
        gap: 8px;
    }

    /* Notification Styles */
    .notification-list {
        padding: 0;
    }

    .notification-item {
        display: flex;
        padding: 16px 20px;
        border-bottom: 1px solid var(--gray-200);
        transition: all 0.2s;
    }

    .notification-item:hover {
        background-color: rgba(63, 81, 181, 0.04);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        background-color: var(--primary-light);
        color: white;
    }

    .notification-icon.success {
        background-color: var(--success-color);
    }

    .notification-icon.warning {
        background-color: var(--warning-color);
    }

    .notification-icon.danger {
        background-color: var(--danger-color);
    }

    .notification-content {
        flex-grow: 1;
        min-width: 0;
    }

    .notification-title {
        font-weight: 600;
        margin: 0 0 4px 0;
        color: var(--gray-800);
    }

    .notification-description {
        color: var(--gray-600);
        margin: 0 0 8px 0;
        font-size: 0.9rem;
    }

    .notification-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }

    .notification-time {
        font-size: 0.85rem;
        color: var(--gray-500);
    }

    .notification-actions {
        display: flex;
        gap: 8px;
    }

    /* Event Card Styles */
    .event-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .event-card {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        border: none;
        background-color: white;
        transition: all 0.3s;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .event-card.research {
        border-top: 4px solid var(--primary-color);
    }

    .event-card.innovation {
        border-top: 4px solid var(--warning-color);
    }

    .event-header {
        padding: 20px;
        position: relative;
    }

    .event-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        opacity: 0.8;
    }

    .event-type {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .event-type.research {
        background-color: rgba(63, 81, 181, 0.1);
        color: var(--primary-color);
    }

    .event-type.innovation {
        background-color: rgba(255, 152, 0, 0.1);
        color: var(--warning-color);
    }

    .event-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: var(--gray-800);
    }

    .event-date {
        font-size: 0.85rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }

    .event-date i {
        margin-right: 6px;
    }

    .event-description {
        color: var(--gray-700);
        margin-bottom: 24px;
    }

    .event-actions {
        display: flex;
        gap: 10px;
        padding: 0 20px 20px 20px;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
    }

    .btn i {
        margin-right: 6px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        box-shadow: 0 4px 12px rgba(63, 81, 181, 0.2);
    }

    .btn-outline-primary {
        background-color: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .btn-outline-primary:hover {
        background-color: rgba(63, 81, 181, 1);
    }

    .btn-success {
        background-color: var(--success-color);
        color: white;
    }

    .btn-success:hover {
        background-color: #388e3c;
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
    }

    .btn-warning {
        background-color: var(--warning-color);
        color: white;
    }

    .btn-warning:hover {
        background-color: #f57c00;
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.2);
    }

    .btn-secondary {
        background-color: var(--gray-500);
        color: white;
    }

    .btn-secondary:hover {
        background-color: var(--gray-600);
    }

    .btn-link {
        background: none;
        color: var(--primary-color);
        padding: 4px 8px;
    }

    .btn-link:hover {
        text-decoration: underline;
    }

    .btn-sm {
        padding: 4px 12px;
        font-size: 0.85rem;
    }

    .btn-block {
        display: flex;
        width: 100%;
    }

    /* Empty State Styles */
    .empty-state {
        padding: 40px 20px;
        text-align: center;
        color: var(--gray-600);
    }

    .empty-state-icon {
        font-size: 3rem;
        color: var(--gray-400);
        margin-bottom: 16px;
    }

    .empty-state-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--gray-700);
    }

    .empty-state-description {
        font-size: 0.95rem;
        max-width: 300px;
        margin: 0 auto;
    }

    /* Badge Styles */
    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .badge-counter {
        position: absolute;
        top: -8px;
        right: -8px;
        min-width: 20px;
        height: 20px;
        border-radius: 10px;
        padding: 0 6px;
        font-size: 0.75rem;
        background-color: var(--danger-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <!-- Notifications Column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <i class="fas fa-bell"></i> Notifications
                        </div>
                        <button id="markAllRead" class="btn btn-outline-primary btn-sm ms-auto">
                            <i class="fas fa-check-double"></i> Mark All Read
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <?php if ($notification && count($notification) > 0): ?>
                            <div class="notification-list">
                                <?php foreach ($notification as $notify): ?>
                                    <?php
                                    $iconClass = 'fas fa-info-circle';
                                    $typeClass = '';

                                    // Determine icon and background based on content
                                    if (
                                        stripos($notify->rn_title, 'approved') !== false ||
                                        stripos($notify->rn_description, 'approved') !== false
                                    ) {
                                        $iconClass = 'fas fa-check-circle';
                                        $typeClass = 'success';
                                    } elseif (
                                        stripos($notify->rn_title, 'rejected') !== false ||
                                        stripos($notify->rn_description, 'rejected') !== false ||
                                        stripos($notify->rn_title, 'return') !== false
                                    ) {
                                        $iconClass = 'fas fa-times-circle';
                                        $typeClass = 'danger';
                                    } elseif (
                                        stripos($notify->rn_title, 'update') !== false ||
                                        stripos($notify->rn_description, 'update') !== false
                                    ) {
                                        $iconClass = 'fas fa-sync';
                                        $typeClass = 'warning';
                                    }
                                    ?>
                                    <div class="notification-item">
                                        <div class="notification-icon <?= $typeClass ?>">
                                            <i class="<?= $iconClass ?>"></i>
                                        </div>
                                        <div class="notification-content">
                                            <h5 class="notification-title"><?= $notify->rn_title ?></h5>
                                            <p class="notification-description"><?= $notify->rn_description ?></p>
                                            <div class="notification-meta">
                                                <span class="notification-time">
                                                    <i class="fas fa-clock fa-sm"></i> <?= timeAgo($notify->rn_created_at); ?>
                                                </span>
                                                <div class="notification-actions">
                                                    <button class="btn btn-outline-primary btn-sm mark-read" data-id="<?= $notify->rn_id; ?>">
                                                        <i class="fas fa-check"></i> Mark Read
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-bell-slash"></i>
                                </div>
                                <h4 class="empty-state-title">No Notifications</h4>
                                <p class="empty-state-description">You're all caught up! New notifications will appear here.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Events Column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fas fa-calendar-alt"></i> Events & Research
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (empty($event)): ?>
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-calendar-times"></i>
                                </div>
                                <h4 class="empty-state-title">No Events Available</h4>
                                <p class="empty-state-description">There are currently no active events. Check back later!</p>
                            </div>
                        <?php else: ?>
                            <div class="event-container">
                                <?php foreach ($event as $e): ?>
                                    <?php if ($e->re_type === 'research'): ?>
                                        <div class="event-card research">
                                            <div class="event-header">
                                                <span class="event-type research">Research Project</span>
                                                <h3 class="event-title"><?= $e->re_name ?></h3>
                                                <div class="event-date">
                                                    <i class="fas fa-calendar-day"></i>
                                                    <?= isset($e->re_date) ? date('M d, Y', strtotime($e->re_date)) : 'Ongoing' ?>
                                                </div>
                                                <p class="event-description"><?= $e->re_description ?></p>
                                                <svg class="event-icon" fill="<?= "var(--primary-color)" ?>" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 3.75A1.75 1.75 0 015.75 2h8.5A1.75 1.75 0 0116 3.75V6h3.25A1.75 1.75 0 0121 7.75v12.5A1.75 1.75 0 0119.25 22H5.75A1.75 1.75 0 014 20.25V3.75zM6.5 4.5v15h12V8H14.75A1.75 1.75 0 0113 6.25V4.5H6.5z" />
                                                </svg>
                                            </div>
                                            <div class="event-actions">
                                                <a href="<?= base_url('participant/event/get_participant_event_dashboard/') . $e->re_id ?>"
                                                    class="btn btn-primary btn-block">
                                                    <i class="fas fa-user-friends"></i>
                                                    Join as Participant
                                                </a>
                                                <a href="<?= base_url('judge/event/get_judge_event_dashboard/') . $e->re_id ?>"
                                                    class="btn btn-warning btn-block">
                                                    <i class="fas fa-gavel"></i>
                                                    Join as Reviewer
                                                </a>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="event-card innovation">
                                            <div class="event-header">
                                                <span class="event-type innovation">Innovation</span>
                                                <h3 class="event-title">Product Profile (Innovation)</h3>
                                                <div class="event-date">
                                                    <i class="fas fa-calendar-day"></i>
                                                    <?= isset($e->re_date) ? date('M d, Y', strtotime($e->re_date)) : 'Ongoing' ?>
                                                </div>
                                                <p class="event-description">
                                                    Showcase your innovative products and solutions.
                                                    Join this opportunity to present your ideas to experts and gain valuable feedback.
                                                </p>
                                                <svg class="event-icon" fill="<?= "var(--warning-color)" ?>" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2a5.5 5.5 0 00-5.5 5.5c0 1.856.87 3.486 2.25 4.533V14h6.5v-1.967A5.5 5.5 0 0012 2zm-4 9a4 4 0 018 0H8z" />
                                                    <path d="M9.5 15a.5.5 0 01.5.5v1.25a2 2 0 001 1.732V20a.5.5 0 01-1 0v-1a2 2 0 00-1-1.732V15.5a.5.5 0 01.5-.5zM13 17.5a.5.5 0 01.5.5v1a.5.5 0 01-1 0v-1a.5.5 0 01.5-.5z" />
                                                </svg>
                                            </div>
                                            <div class="event-actions">
                                                <a href="#" class="btn btn-outline-primary btn-block">
                                                    <i class="fas fa-info-circle"></i>
                                                    More Details
                                                </a>
                                                <a href="#" class="btn btn-success btn-block">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                    Register Now
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let csrfName = '<?= csrf_token() ?>'; // CSRF Token Name
        let csrfHash = '<?= csrf_hash() ?>'; // CSRF Hash

        function updateCsrfToken(newToken) {
            csrfHash = newToken; // Update CSRF token
        }

        $(".mark-read").click(function() {
            let notificationId = $(this).data("id");
            let button = $(this);

            $.ajax({
                url: "<?= base_url('user/notification/mark-as-read'); ?>",
                type: "POST",
                data: {
                    [csrfName]: csrfHash,
                    id: notificationId
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Marked as Read',
                            text: 'Notification has been marked as read.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            button.closest('.notification-item').fadeOut();
                        });

                        // Update CSRF token
                        updateCsrfToken(response.csrf_token);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again later.'
                    });
                }
            });
        });

        $("#markAllRead").click(function() {
            Swal.fire({
                title: "Mark All as Read?",
                text: "This will mark all your notifications as read.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Mark All"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('user/notification/mark-all-read') ?>",
                        type: "POST",
                        data: {
                            [csrfName]: csrfHash
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Marked All as Read",
                                    text: "All notifications have been updated.",
                                    confirmButtonColor: "#3085d6"
                                }).then(() => {
                                    $(".notification-item").fadeOut();
                                });

                                // Update CSRF token
                                updateCsrfToken(response.csrf_token);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Failed",
                                    text: response.message
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong. Please try again."
                            });
                        }
                    });
                }
            });
        });
    });
</script>