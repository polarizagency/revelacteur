document.addEventListener('DOMContentLoaded', function () {
	var toggleButton = document.querySelector('.menu-toggle');
	var overlay = document.querySelector('.menu-overlay');

	if (!toggleButton || !overlay) {
		return;
	}

	var openMenu = function () {
		overlay.classList.add('menu-overlay--open');
		toggleButton.classList.add('is-active');
		document.body.classList.add('menu-open');
		overlay.setAttribute('aria-hidden', 'false');
		toggleButton.setAttribute('aria-expanded', 'true');
		toggleButton.setAttribute('aria-label', 'Fermer le menu');
	};

	var closeMenu = function () {
		overlay.classList.remove('menu-overlay--open');
		toggleButton.classList.remove('is-active');
		document.body.classList.remove('menu-open');
		overlay.setAttribute('aria-hidden', 'true');
		toggleButton.setAttribute('aria-expanded', 'false');
		toggleButton.setAttribute('aria-label', 'Ouvrir le menu');
	};

	toggleButton.addEventListener('click', function () {
		if (overlay.classList.contains('menu-overlay--open')) {
			closeMenu();
		} else {
			openMenu();
		}
	});

	overlay.addEventListener('click', function (event) {
		if (event.target === overlay) {
			closeMenu();
		}
	});

	overlay.querySelectorAll('a').forEach(function (link) {
		link.addEventListener('click', closeMenu);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && overlay.classList.contains('menu-overlay--open')) {
			closeMenu();
		}
	});
});
