<?php
/*
Template Name: Page Nos Projets
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div >
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Nos Projets</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte page-hero__shape" />
            </div>
            <div class="projects-grid" style="padding: 5vw 5vw;">
                
                <?php
                // Configuration de la requête pour récupérer les articles
                $args = array(
                    'post_type'      => 'post',      // Type de contenu : Articles
                    'posts_per_page' => 9,           // Nombre d'articles à afficher
                    'orderby'        => 'date',      // Trier par date
                    'order'          => 'DESC'       // Du plus récent au plus vieux
                );

                $projets_query = new WP_Query( $args );

                if ( $projets_query->have_posts() ) :
                    while ( $projets_query->have_posts() ) : $projets_query->the_post();
                        // Utilise le composant réutilisable
                        get_template_part( 'parts/content-project-card' );
                    endwhile;
                    wp_reset_postdata(); // Important : réinitialise les données après la boucle
                else : ?>
                    <p><?php esc_html_e( 'Aucun projet trouvé pour le moment.', 'revelacteur' ); ?></p>
                <?php endif; ?>

            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>