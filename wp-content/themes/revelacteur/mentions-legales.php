<?php
/*
Template Name: Page Mentions Légales
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="page-hero">
            <h1 class="page-hero__title">Mentions Légales</h1>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                class="page-hero__shape" />
        </div>

        <div class="association-content mentions-legales-content">

            <section class="mentions-section">
                <h2>1. Édition du site</h2>
                <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie
                    numérique, il est précisé aux utilisateurs du site l'identité de l'éditeur :</p>
                <p><strong>Nom de l'association :</strong> Revel'Acteur</p>
                <p><strong>Forme juridique :</strong> Association loi 1901</p>
                <p><strong>Siège social :</strong> [Adresse complète à compléter]</p>
                <p><strong>Numéro RNA :</strong> [Numéro en W... à compléter]</p>
                <p><strong>N° SIRET :</strong> [Numéro SIRET à compléter ou supprimer si néant]</p>
                <p><strong>Email :</strong> <a
                        href="mailto:association.revelacteur@gmail.com">association.revelacteur@gmail.com</a></p>
                <p><strong>Téléphone :</strong> [Numéro de téléphone à compléter]</p>
                <p><strong>Directeur de la publication :</strong> ANDREOTTI Arnaud</p>
            </section>

            <section class="mentions-section">
                <h2>2. Hébergement</h2>
                <p>Le site est hébergé par la société <strong>[Nom de l'hébergeur - ex: OVH / Hostinger]</strong>.</p>
                <p><strong>Adresse :</strong> [Adresse postale complète de l'hébergeur]</p>
                <p><strong>Téléphone :</strong> [Numéro de téléphone de l'hébergeur]</p>
            </section>

            <section class="mentions-section">
                <h2>3. Propriété intellectuelle</h2>
                <p>L'association <strong>Revel'Acteur</strong> est propriétaire des droits de propriété intellectuelle
                    ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment : les textes,
                    les images, les graphismes, le logo et les icônes.</p>
                <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des
                    éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation
                    écrite préalable de l'association.</p>
            </section>

            <section class="mentions-section">
                <h2>4. Protection des données personnelles (RGPD)</h2>
                <p>L’association s’engage à ce que la collecte et le traitement de vos données soient conformes au
                    Règlement Général sur la Protection des Données (RGPD).</p>

                <h3>4.1. Responsable du traitement</h3>
                <p>Le responsable du traitement des données personnelles est l'association
                    <strong>Revel'Acteur</strong>, représentée par son Directeur de la publication, ANDREOTTI Arnaud.
                </p>

                <h3>4.2. Finalité et Droits</h3>
                <p>Les données collectées via nos formulaires (Nom, Email, Message) sont utilisées exclusivement pour
                    répondre à vos demandes et gérer vos adhésions. Conformément au RGPD, vous disposez d'un droit
                    d'accès, de rectification et de suppression de vos données.</p>
                <p>Pour exercer ce droit, contactez-nous à : <a
                        href="mailto:contact@revelacteur.fr">contact@revelacteur.fr</a>.</p>
            </section>

            <section class="mentions-section">
                <h2>5. Cookies</h2>
                <p>Ce site utilise des cookies techniques nécessaires à son bon fonctionnement. Nous pouvons également
                    utiliser des cookies de mesure d'audience pour améliorer votre expérience. Vous pouvez configurer
                    votre navigateur pour refuser ces cookies, ce qui pourrait limiter l'accès à certaines
                    fonctionnalités.</p>
            </section>

            <section class="mentions-section">
                <h2>6. Droit applicable et juridiction compétente</h2>
                <p>Tout litige en relation avec l’utilisation du site est soumis au droit français. Il est fait
                    attribution exclusive de juridiction aux tribunaux français compétents.</p>
            </section>

            <section class="mentions-section">
                <h2>7. Crédits</h2>
                <p><strong>Conception et réalisation :</strong> [Nom du développeur ou de l'agence]</p>
                <p><strong>Visuels :</strong> Association Revel'Acteur / [Source images]</p>
            </section>

            <section class="mentions-section">
                <p class="mentions-update"><em>Dernière mise à jour : <?php echo date('d/m/Y'); ?></em></p>
            </section>

        </div>
    </main>
</div>

<?php get_footer(); ?>