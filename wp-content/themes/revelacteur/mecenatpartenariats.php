<?php
/*
Template Name: Page Mécénat & Partenariat
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div >
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Mécénat & Partenariat</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte page-hero__shape" />
            </div>

            <div class="mecenat-content" style="padding: 5vw 5vw; max-width: 900px; margin: 0 auto;">
                
                <?php 
                // La boucle standard de WordPress pour afficher le contenu de la page
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                else : ?>
                    <p><?php esc_html_e( 'Le contenu pour la page Mécénat et Partenariat sera affiché ici.', 'revelacteur' ); ?></p>
                <?php endif; ?>

                </div>
            
        </div>

    </main>
</div>

<?php get_footer(); ?>