<?php
/*  
Template Name: Page Association
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div>
            
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Qui sommes nous ?</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte page-hero__shape" />
            </div>

            <div class="association-content">
                <div class="association-intro">
                    <div>
                        <p>Fondée en <strong>2006</strong> à Beuvry (Pas-de-Calais), Révél'Acteur est bien plus qu'une association : c'est un <strong>moteur d'engagement local.</strong></p>
                        <p>Notre mission est claire : <strong>accompagner les jeunes </strong> à chaque étape de leur vie en leur offrant des  <strong>opportunités de création et d'expression </strong>, tout en tissant des liens forts avec les adultes et les habitants du territoire.</p>
                        <p>Portée par son fondateur <strong>Arnaud Andreotti et une équipe passionnée</strong> , notre action repose sur <strong>4 piliers fondamentaux :</strong></p>

                    </div>
                    <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/association-image.png" alt="Image de l'association" />
                    </div>
                    
                </div>
                <div class="association-section-bloc-explication">
                    <div class="association-blocs-grid">
                        <div class="association-section-bloc">
                            <h2 class="association-section-bloc__title">L'Éducation Populaire</h2>
                            <p class="association-section-bloc__text">Rendre le savoir et la culture accessibles à tous, par tous.</p>
                        </div>
                        <div class="association-section-bloc">
                            <h2 class="association-section-bloc__title">La Valorisation de la Jeunesse</h2>
                            <p class="association-section-bloc__text">Révéler les talents et donner le pouvoir d'agir.</p>
                        </div>
                        <div class="association-section-bloc">
                            <h2 class="association-section-bloc__title">La Sauvegarde du Patrimoine</h2>
                            <p class="association-section-bloc__text">Faire vivre l'histoire locale (comme le Manoir de l'Estracelles) pour construire l'avenir.</p>
                        </div>
                        <div class="association-section-bloc">
                            <h2 class="association-section-bloc__title">L'Économie Sociale et Solidaire</h2>
                            <p class="association-section-bloc__text">Privilégier l'humain et l'utilité sociale au cœur de nos projets.</p>
                        </div>
                    </div>
                </div>
                

                <div class="association-section-aventure-réseaux">
                    <p>Suivez l'aventure au quotidien</p>
                    <div class="social-networks-grid">
                        <div class="social-network-item">
                            <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                                <span class="dashicons dashicons-instagram"></span>
                            </a>
                            <p>Instagram</p>
                        </div>
                        <div class="social-network-item">
                            <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                                <span class="dashicons dashicons-linkedin"></span>
                            </a>
                            <p>LinkedIn</p>
                        </div>
                        <div class="social-network-item">
                            <a href="https://youtube.com" target="_blank" aria-label="YouTube">
                                <span class="dashicons dashicons-youtube"></span>
                            </a>
                            <p>YouTube</p>
                        </div>
                        <div class="social-network-item">
                            <a href="https://twitch.tv" target="_blank" aria-label="Twitch">
                                <span class="dashicons dashicons-twitch"></span>
                            </a>
                            <p>Twitch</p>
                        </div>
                        <div class="social-network-item">
                            <a href="https://spotify.com" target="_blank" aria-label="Spotify">
                                <span class="dashicons dashicons-spotify"></span>
                            </a>
                            <p>Spotify</p>
                        </div>
                        
                    </div>

                </div>

            </div>
            
        </div>

    </main>
</div>

<?php get_footer(); ?>