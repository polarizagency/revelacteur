<?php
/*
Template Name: Page Mécénat & Partenariat
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div class="container" ">
            
            <div style="height:45vh ; background-color:var(--color-primary) ;align-items: center; ; display:flex; position: relative;">
                <h1 class="page-title" style="text-align:left; margin:0 ; margin-left: 10vw ; font-family: 'RedsAglonema', cursive; color:var(--color-secondary) ; font-size: 6rem;">Mécénat & Partenariat</h1>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte" style=" position: absolute; right: 3px; bottom : -2px; transform: rotate(-180deg);" />
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