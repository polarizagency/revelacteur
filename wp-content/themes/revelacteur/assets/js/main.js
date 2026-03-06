document.addEventListener('DOMContentLoaded', function () {
	/* --- GESTION DU MENU (Ton code existant) --- */
	var toggleButton = document.querySelector('.menu-toggle');
	var overlay = document.querySelector('.menu-overlay');

	if (toggleButton && overlay) {
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
	}

	/* --- BANDEAU LOGOS PARTENAIRES (Défilement infini) --- */
	var logoTrack = document.querySelector('.partenaires-logos-track');
	if (logoTrack) {
		// Ajuste la vitesse en fonction du nombre de logos
		var items = logoTrack.querySelectorAll('.partenaires-logo-item');
		var totalItems = items.length;
		// La moitié sont les originaux, l'autre moitié les clones
		var speed = Math.max(15, (totalItems / 2) * 4); // ~4s par logo
		logoTrack.style.animationDuration = speed + 's';

		// Support des préférences de mouvement réduit
		var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
		if (prefersReducedMotion.matches) {
			logoTrack.style.animationPlayState = 'paused';
		}
		prefersReducedMotion.addEventListener('change', function (e) {
			logoTrack.style.animationPlayState = e.matches ? 'paused' : 'running';
		});
	}

	/* --- FILTRAGE DES PROJET (Nouveau code) --- */
	var filterBtns = document.querySelectorAll('.filter-btn');
	var projectCards = document.querySelectorAll('.project-card-wrapper');

	if (filterBtns.length > 0) {
		filterBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				// 1. Activer le bon bouton
				filterBtns.forEach(function (b) { b.classList.remove('active'); });
				this.classList.add('active');

				var targetCategory = this.getAttribute('data-category');

				// 2. Filtrer les cartes
				projectCards.forEach(function (card) {
					var cardCategories = card.getAttribute('data-categories').split(' ');

					if (targetCategory === 'all' || cardCategories.includes(targetCategory)) {
						card.style.display = 'block';
					} else {
						card.style.display = 'none';
					}
				});
			});
		});
	}
});