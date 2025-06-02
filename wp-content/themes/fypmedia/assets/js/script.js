// Mobile Menu Toggle
const overlayMobileMenu = document.getElementById('overlay-mobile-menu');
const sidebarMenu = document.getElementById('sidebar-menu');
const mobileMenuButton = document.getElementById('mobile-menu-button');
const closeMenuButton = document.getElementById('close-menu-button');

mobileMenuButton.addEventListener('click', function () {
	overlayMobileMenu.classList.remove('hidden');

	setTimeout(() => {
		sidebarMenu.classList.remove('-translate-x-full');
		sidebarMenu.classList.add('translate-x-0');
	}, 10);
});

const overlayMobileMenuClose = (event) => {
	event.stopPropagation();

	sidebarMenu.classList.remove('translate-x-0');
	sidebarMenu.classList.add('-translate-x-full');

	setTimeout(() => {
		overlayMobileMenu.classList.add('hidden');
	}, 500);
};

closeMenuButton.addEventListener('click', (event) => {
	overlayMobileMenuClose(event);
});

overlayMobileMenu.addEventListener('click', (event) => {
	overlayMobileMenuClose(event);
});

// Prevent bubbling when clicking inside the sidebar
sidebarMenu.addEventListener('click', (event) => {
	event.stopPropagation();
});

// Dropdown Menu Toggle
const dropdownMenu = document.querySelectorAll('.dropdown-menu');
dropdownMenu.forEach((menu) => {
	menu.addEventListener('click', function (e) {
		e.stopPropagation();
		const dropdownContent = this.querySelector('div');
		dropdownContent.classList.toggle('hidden');
	});
});
