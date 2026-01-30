<?php
/*
Template Name: Page Mécénat & Partenariat
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div>
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Mécénat & Partenariat</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>

            <div class="mecenat-content">
                <h2 class="mecenat-title">Pourquoi rejoindre l'aventure ?</h2>
                <div class="mecenat-cards-grid">
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Pour la Jeunesse et l'Éducation Populaire</h3>
                        <p class="mecenat-card__text">Contribuez à créer un espace où les jeunes peuvent s'exprimer,
                            apprendre et développer leur citoyenneté à travers des ateliers pédagogiques et artistiques.
                        </p>
                    </div>
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Pour la Sauvegarde du Patrimoine</h3>
                        <p class="mecenat-card__text">Participez à la restauration d'un lieu historique datant de 1525.
                            Plus qu'un bâtiment, le Manoir de l'Estracelles deviendra un outil de transmission entre les
                            générations.</p>
                    </div>
                    <div class="mecenat-card">
                        <h3 class="mecenat-card__title">Pour le Dynamisme du Territoire</h3>
                        <p class="mecenat-card__text">Soutenez une initiative locale qui renforce le lien social à
                            Beuvry et dans l'agglomération, en favorisant l'économie sociale et solidaire (ESS).</p>
                    </div>
                </div>

            </div>

            <div class="mecenat-soutien-section">
                <div class="mecenat-soutien-content">
                    <h2 class="mecenat-soutien-title">Comment nous soutenir ?</h2>
                    <div class="mecenat-soutien-cards-grid">
                        <div class="mecenat-soutien-card">
                            <h3 class="mecenat-soutien-card__title">Mécénat Financier</h3>
                            <p class="mecenat-soutien-card__text">Aidez-nous à financer les travaux de rénovation
                                (toiture,
                                aménagements intérieurs) et l'achat de matériel pédagogique pour les ateliers.</p>
                        </div>
                        <div class="mecenat-soutien-card">
                            <h3 class="mecenat-soutien-card__title">Mécénat en Nature</h3>
                            <p class="mecenat-soutien-card__text">Vous êtes une entreprise du bâtiment ou un fournisseur
                                ?
                                Vos dons de matériaux (bois, peinture, outillage) sont précieux pour la réhabilitation
                                du
                                manoir.</p>
                        </div>
                        <div class="mecenat-soutien-card">
                            <h3 class="mecenat-soutien-card__title">Mécénat de Compétences</h3>
                            <p class="mecenat-soutien-card__text">Mettez l'expertise de vos collaborateurs au service du
                                projet (juridique, communication, artisanat, gestion de projet).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mecenat-avantage-section">
                <div class="mecenat-avantage-content">
                    <h2 class="mecenat-avantage-title">Vos Avantages</h2>
                    <div class="mecenat-avantage-items">
                        <div class="mecenat-avantage-item">
                            <div class="mecenat-avantage-icon">
                                <span class="dashicons dashicons-awards"></span>
                            </div>
                            <div class="mecenat-avantage-text">
                                <h3 class="mecenat-avantage-item-title">Réduction fiscale</h3>
                                <p class="mecenat-avantage-item-text">Bénéficiez d'une réduction d'impôt jusqu'à 60% du
                                    montant de votre don, dans la limite de 5‰ du chiffre d'affaires annuel HT.</p>
                            </div>
                        </div>

                        <div class="mecenat-avantage-item">
                            <div class="mecenat-avantage-icon">
                                <span class="dashicons dashicons-chart-bar"></span>
                            </div>
                            <div class="mecenat-avantage-text">
                                <h3 class="mecenat-avantage-item-title">Visibilité accrue</h3>
                                <p class="mecenat-avantage-item-text">Augmentez votre visibilité grâce à notre réseau,
                                    nos événements et notre communication régulière auprès de nos partenaires prenantes.
                                </p>
                            </div>
                        </div>

                        <div class="mecenat-avantage-item">
                            <div class="mecenat-avantage-icon">
                                <span class="dashicons dashicons-megaphone"></span>
                            </div>
                            <div class="mecenat-avantage-text">
                                <h3 class="mecenat-avantage-item-title">Bénéfice RSE</h3>
                                <p class="mecenat-avantage-item-text">Valorisez votre engagement sociétal et renforcez
                                    votre image de marque auprès de vos clients, collaborateurs et partenaires.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
</div>

<?php get_footer(); ?>