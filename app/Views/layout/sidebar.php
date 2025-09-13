<aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand p-3 border-bottom border-secondary">
    <!--begin::Brand Link-->
    <a href="./index.html" class="brand-link d-flex align-items-center">
      <!--begin::Brand Image-->
      <img
        src="<?= base_url() ?>/assets/AdminLte/dist/assets/img/rims_logo.png"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow me-2" />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-bold text-light">RiMS PSAS</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false">
        <?php if (canAccess([1])): ?>
          <li class="nav-header text-uppercase fw-bold text-light-emphasis mb-1">Super Admin</li>

          <li class="nav-item mb-1">
            <a href="#" class="nav-link text-light">
              <i class="nav-icon bi bi-person-lock me-2"></i>
              <p>User Access Control</p>
              <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
            </a>
            <ul class="nav nav-treeview ps-3">
              <li class="nav-item">
                <a href="<?= base_url('superAdmin/userAccess/list-of-user') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-clipboard-check me-2"></i>
                  <p>Finance Admin</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item mb-1">
            <a href="#" class="nav-link text-light">
              <i class="nav-icon bi bi-calendar-event me-2"></i>
              <p>Event Management</p>
              <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
            </a>
            <ul class="nav nav-treeview ps-3">
              <li class="nav-item">
                <a href="<?= base_url('superAdmin/event/event_list') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-calendar-check me-2"></i>
                  <p>Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('superAdmin/event/event_category_and_field') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-tags me-2"></i>
                  <p>Category / Field</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Research Paper section commented out as in original -->
          <hr class="my-2 border-secondary opacity-50">
        <?php endif; ?>

        <?php if (canAccess([3])): ?>
          <li class="nav-header text-uppercase fw-bold text-light-emphasis mb-1">Finance</li>
          <li class="nav-item mb-1">
            <a href="#" class="nav-link text-light">
              <i class="nav-icon bi bi-cash-coin me-2"></i>
              <p>Payment Validation</p>
              <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
            </a>
            <ul class="nav nav-treeview ps-3">
              <li class="nav-item">
                <a href="<?= base_url('finance/research_project/finance-research-db') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-receipt me-2"></i>
                  <p>Payment</p>
                </a>
              </li>
            </ul>
          </li>
          <hr class="my-2 border-secondary opacity-50">
        <?php endif; ?>

        <?php if (canAccess([4])): ?>
          <li class="nav-header text-uppercase fw-bold text-light-emphasis mb-1">Reviewer</li>
          <li class="nav-item mb-1">
            <a href="#" class="nav-link text-light">
              <i class="nav-icon bi bi-shield-lock me-2"></i>
              <p>Review</p>
              <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
            </a>
            <ul class="nav nav-treeview ps-3">
              <li class="nav-item">
                <a href="<?= base_url('judge/event/assigned-event') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-list-check me-2"></i>
                  <p>Review List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('judge/review/Innovations') ?>" class="nav-link text-light-emphasis">
                  <i class="nav-icon bi bi-journal-check me-2"></i>
                  <p>Review Record</p>
                </a>
              </li>
            </ul>
          </li>
          <hr class="my-2 border-secondary opacity-50">
        <?php endif; ?>

        <li class="nav-header text-uppercase fw-bold text-light-emphasis mb-1">Participant</li>
        <li class="nav-item mb-1">
          <a href="#" class="nav-link text-light">
            <i class="nav-icon bi bi-journal me-2"></i>
            <p>Event</p>
            <i class="nav-arrow bi bi-chevron-right ms-auto"></i>
          </a>
          <ul class="nav nav-treeview ps-3">
            <li class="nav-item">
              <a href="<?= base_url('participant/event/get_joined_event') ?>" class="nav-link text-light-emphasis">
                <i class="nav-icon bi bi-calendar-plus me-2"></i>
                <p>Join Event</p>
              </a>
            </li>
          </ul>
        </li>
        <hr class="my-2 border-secondary opacity-50">

        <!-- Log out -->
        <li class="nav-item mt-3">
          <a href="#" class="nav-link text-danger" onclick="confirmLogout(event)">
            <i class="nav-icon bi bi-box-arrow-right me-2"></i>
            <p>Sign Out</p>
          </a>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>

<script>
  function confirmLogout(event) {
    event.preventDefault();
    Swal.fire({
      title: "Confirm Logout",
      text: "Are you sure you want to end your session?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#dc3545",
      cancelButtonColor: "#6c757d",
      confirmButtonText: "Yes, logout",
      cancelButtonText: "Cancel"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= base_url('auth/logout') ?>";
      }
    });
  }

  // Add active state to current page
  document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(function(link) {
      const href = link.getAttribute('href');
      if (href && currentPath.includes(href)) {
        link.classList.add('active');

        // If it's a submenu item, expand its parent menu
        const parentItem = link.closest('.nav-treeview').previousElementSibling;
        if (parentItem) {
          parentItem.classList.add('active');
        }
      }
    });
  });
</script>

