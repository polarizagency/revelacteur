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

	/* --- BANDEAU LOGOS PARTENAIRES (Défilement infini fluide) --- */
	var logoTrack = document.querySelector('.partenaires-logos-track');
	if (logoTrack) {
		var originals = logoTrack.querySelectorAll('[data-logo-original]');
		if (originals.length > 0) {
			// 1. Cloner les logos autant de fois que nécessaire pour remplir 3x l'écran
			function fillTrack() {
				// Retirer les anciens clones
				logoTrack.querySelectorAll('[data-logo-clone]').forEach(function (el) { el.remove(); });

				var gap = parseFloat(getComputedStyle(logoTrack).gap) || 60;
				var oneSetWidth = 0;
				originals.forEach(function (item) {
					oneSetWidth += item.offsetWidth + gap;
				});

				if (oneSetWidth === 0) return 0;

				// Combien de copies pour couvrir 3x la largeur visible
				var viewportWidth = window.innerWidth;
				var copies = Math.ceil((viewportWidth * 3) / oneSetWidth);
				if (copies < 2) copies = 2;

				for (var c = 0; c < copies; c++) {
					originals.forEach(function (item) {
						var clone = item.cloneNode(true);
						clone.removeAttribute('data-logo-original');
						clone.setAttribute('data-logo-clone', '');
						clone.setAttribute('aria-hidden', 'true');
						logoTrack.appendChild(clone);
					});
				}

				return oneSetWidth;
			}

			var oneSetWidth = fillTrack();
			var offset = 0;
			var speed = 0.5;
			var paused = false;

			window.addEventListener('resize', function () {
				oneSetWidth = fillTrack();
				offset = 0;
			});

			function tick() {
				if (!paused && oneSetWidth > 0) {
					offset -= speed;
					if (Math.abs(offset) >= oneSetWidth) {
						offset += oneSetWidth;
					}
					logoTrack.style.transform = 'translateX(' + offset + 'px)';
				}
				requestAnimationFrame(tick);
			}
			requestAnimationFrame(tick);

			// Pause au survol
			var wrapper = document.querySelector('.partenaires-logos-wrapper');
			if (wrapper) {
				wrapper.addEventListener('mouseenter', function () { paused = true; });
				wrapper.addEventListener('mouseleave', function () { paused = false; });
			}

			// Respect prefers-reduced-motion
			var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
			if (prefersReducedMotion.matches) { paused = true; }
			prefersReducedMotion.addEventListener('change', function (e) { paused = e.matches; });
		}
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