const navbar = document.querySelector('.navbar-custom');

if (navbar) {
	const updateNavbar = () => {
		navbar.classList.toggle('is-scrolled', window.scrollY > 0);
	};

	window.addEventListener('scroll', updateNavbar, { passive: true });
	updateNavbar();
}