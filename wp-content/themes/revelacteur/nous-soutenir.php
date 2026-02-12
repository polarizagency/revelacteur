<?php
/*
Template Name: Page Nous Soutenir
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div>
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Nous soutenir</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>

            <div class="mecenat-intro"> 
                <h1 class="mecenat-intro-title">Soutenez une association qui agit concrètement pour la jeunesse et le territoire !</h1> 
                <p class="mecenat-intro-text">Votre soutien permet <strong>d’éduquer</strong>, de <strong>préserver le patrimoine</strong>
                    <strong></strong>et de <strong>dynamiser l’économie locale.</strong></p>
            </div>

            <div class="mecenat-content">
                <h2 class="mecenat-title">Pourquoi nous soutenir?</h2>
                <div class="mecenat-cards-grid">
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Impact social</h3>
                        <p class="mecenat-card__text">Éducation populaire, transmission et accès à la culture pour les jeunes.</p>
                    </div>
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Impact patrimonial</h3>
                        <p class="mecenat-card__text">Sauvegarde et réhabilitation du Manoir de l’Escrime, lieu de transmission intergénérationnelle.</p>
                    </div>
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Impact territorial</h3>
                        <p class="mecenat-card__text">Soutien à l’économie locale, ESS et dynamique rurale.</p>
                    </div>
                </div>

            </div>

            <div class="mecenat-soutien-section">
                <div class="mecenat-soutien-content">
                    <h2 class="mecenat-soutien-title">Comment nous soutenir ?</h2>
                    <div class="mecenat-soutien-cards-grid">
                        <!-- Carte 1: Faire un don -->
                        <div class="mecenat-soutien-card">
                            <div class="mecenat-soutien-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </div>
                            <div class="mecenat-soutien-card-content">
                                <h3 class="mecenat-soutien-card-title">Faire un don</h3>
                                <p class="mecenat-soutien-card-text">Don ponctuel ou régulier, 100 % dédié aux projets terrain. Simple, rapide et direct.</p>
                                <a href="#" class="mecenat-soutien-btn">Faire un don</a>
                            </div>
                        </div>

                        <!-- Carte 2: Devenir mécène -->
                        <div class="mecenat-soutien-card">
                            <div class="mecenat-soutien-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 7h-3a2 2 0 0 1-2-2V2"></path>
                                    <path d="M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"></path>
                                    <path d="M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"></path>
                                </svg>
                            </div>
                            <div class="mecenat-soutien-card-content">
                                <h3 class="mecenat-soutien-card-title">Devenir mécène</h3>
                                <div class="mecenat-soutien-tags">
                                    <span class="mecenat-tag">Financier</span>
                                    <span class="mecenat-tag">Nature</span>
                                    <span class="mecenat-tag">Compétences</span>
                                </div>
                            </div>
                        </div>

                        <!-- Carte 3: Devenir bénévole -->
                        <div class="mecenat-soutien-card">
                            <div class="mecenat-soutien-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 7h-3a2 2 0 0 1-2-2V2"></path>
                                    <path d="M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"></path>
                                    <path d="M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"></path>
                                </svg>
                            </div>
                            <div class="mecenat-soutien-card-content">
                                <h3 class="mecenat-soutien-card-title">Devenir bénévole</h3>
                                <div class="mecenat-soutien-tags">
                                    <span class="mecenat-tag">Soutien</span>
                                    <span class="mecenat-tag">Nature</span>
                                    <span class="mecenat-tag">Compétences</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Section Partager -->
                <div class="mecenat-partager-section">
                    <h2 class="mecenat-partager-title">Partager notre mission</h2>
                    <p class="mecenat-partager-text">Parlez de nous autour de vous et sur les réseaux sociaux pour élargir notre impact.</p>
                </div>

            <div class="mecenat-confiance-section">
                <h2 class="mecenat-confiance-title">Confiance & transparence</h2>
                <div class="mecenat-confiance-grid">
                    <div class="mecenat-confiance-pill">100 % des dons utilises pour nos actions</div>
                    <div class="mecenat-confiance-pill">Transparence totale des financements</div>
                    <div class="mecenat-confiance-pill">Recu fiscal selon la legislation en vigueur</div>
                </div>
            </div>

        </div>

    </main>
</div>

<?php get_footer(); ?>