document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded');
    const mobileNavToggle = document.getElementById('mobile-nav-toggle');
    const sidebar = document.querySelector('.sidebar');
    const dashboardContainer = document.querySelector('.dashboard-container');

    console.log('mobileNavToggle:', mobileNavToggle);
    console.log('sidebar:', sidebar);

    if (mobileNavToggle && sidebar && dashboardContainer) {
        mobileNavToggle.addEventListener('click', function (event) {
            console.log('Mobile nav toggle clicked');
            event.stopPropagation(); // Prevent this click from immediately closing the sidebar
            sidebar.classList.toggle('active');
            dashboardContainer.classList.toggle('sidebar-active');
            this.classList.toggle('active');

            if (this.classList.contains('active')) {
                this.innerHTML = '<i class="bi bi-x"></i>';
            } else {
                this.innerHTML = '<i class="bi bi-list"></i>';
            }
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', function (event) {
            if (!sidebar.contains(event.target) && !mobileNavToggle.contains(event.target)) {
                sidebar.classList.remove('active');
                dashboardContainer.classList.remove('sidebar-active');
                mobileNavToggle.classList.remove('active');
                mobileNavToggle.innerHTML = '<i class="bi bi-list"></i>';
            }
        });

        // Prevent clicks inside the sidebar from closing it
        sidebar.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    } else {
        console.error('Mobile nav toggle, sidebar, or dashboard container not found');
    }
});

