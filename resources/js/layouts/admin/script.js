// Toggle the visibility of a dropdown menu
const toggleDropdown = (dropdown, menu, isOpen) => {
  dropdown.classList.toggle("open", isOpen);
  menu.style.height = isOpen ? `${menu.scrollHeight}px` : 0;
};

// Close all open dropdowns
const closeAllDropdowns = () => {
  document.querySelectorAll(".dropdown-container.open").forEach((openDropdown) => {
    toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
  });
};

// Check if sidebar is collapsed
const isSidebarCollapsed = () =>
  document.querySelector(".sidebar")?.classList.contains("collapsed");

// Attach click event to all dropdown toggles
document.querySelectorAll(".dropdown-toggle").forEach((dropdownToggle) => {
  dropdownToggle.addEventListener("click", (e) => {
    e.preventDefault();

    // ❌ لا تفعل شيء إذا كانت القائمة الجانبية مصغّرة
    if (isSidebarCollapsed()) return;

    const dropdown = dropdownToggle.closest(".dropdown-container");
    const menu = dropdown.querySelector(".dropdown-menu");
    const isOpen = dropdown.classList.contains("open");

    closeAllDropdowns(); // Close all others
    toggleDropdown(dropdown, menu, !isOpen); // Toggle this

  });
});

// Attach click event to sidebar toggle buttons
document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach((button) => {
  button.addEventListener("click", () => {
    closeAllDropdowns(); // Close open dropdowns

    const sidebar = document.querySelector(".sidebar");
    const processStepper = document.querySelector(".process-stepper");

    sidebar.classList.toggle("collapsed"); // Toggle sidebar collapsed

    if (sidebar.classList.contains("collapsed")) {
      processStepper.style.width = '90.5%';
    } else {
      processStepper.style.width = '82%';
    }
  });
});

// Collapse sidebar by default on small screens
if (window.innerWidth <= 1024) {
  document.querySelector(".sidebar").classList.add("collapsed");
}


/*_______________________________________________*/

