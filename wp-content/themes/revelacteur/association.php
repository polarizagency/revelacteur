<?php
/*  
Template Name: Page Association
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div class="container" ">
            
             <div style="height: 45vh;   background-color: var(--color-primary);  display: flex;   align-items: center;  position: relative;  overflow: hidden; /* Important : Coupe l'image si elle dépasse */">
            <h1 class="page-title" style="margin: 0;  margin-left: 10vw;   text-align: left;    font-family: 'RedsAglonema', cursive;  color: var(--color-secondary); font-size: 6rem;z-index: 10; /* Important : Assure que le texte passe AU-DESSUS de l'image */position: relative; ">Qui sommes nous ?</h1>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte" style="position: absolute; right: 0; top: 10%; /* Centre l'origine de l'image verticalement */transform: translateY(-50%) rotate(-180deg); /* Centre parfaitement + ta rotation */ height: 200%; /* Ajuste la taille de la forme (essaie 80% à 100%) */width: auto; pointer-events: none; /* Empêche de cliquer sur l'image par erreur */" />
        </div>

            <div class="association-content" style="padding: 5vw 5vw; max-width: 900px; margin: 0 auto;">
                
                <?php 
                // La boucle standard de WordPress pour afficher le contenu que vous écrirez dans l'éditeur de la page
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                else : ?>
                    <p><?php esc_html_e( 'Veuillez ajouter le contenu décrivant votre association (mission, histoire, équipe, etc.) dans l\'éditeur WordPress.', 'revelacteur' ); ?></p>
                <?php endif; ?>
                
                </div>
            
        </div>

    </main>
</div>

<?php get_footer(); ?>