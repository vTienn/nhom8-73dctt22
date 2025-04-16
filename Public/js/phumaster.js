// Select sidebar, toggle button, and main content
const sidebar = document.querySelector('.sidebar');
const toggleButton = document.getElementById('toggleSidebar');
const mainContent = document.querySelector('.main-content');

// Toggle sidebar when button is clicked
toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
});


