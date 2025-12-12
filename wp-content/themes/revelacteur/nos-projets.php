<?php
/*
Template Name: Page Nos Projets
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div class="container" ">
                <div style="
            height: 45vh; 
            background-color: var(--color-primary); 
            display: flex; 
            align-items: center; 
            position: relative; 
            overflow: hidden; /* Important : Coupe l'image si elle dépasse */
        ">
            <h1 class="page-title" style="
                margin: 0; 
                margin-left: 10vw; 
                text-align: left; 
                font-family: 'RedsAglonema', cursive; 
                color: var(--color-secondary); 
                font-size: 6rem;
                z-index: 10; /* Important : Assure que le texte passe AU-DESSUS de l'image */
                position: relative;
            ">
                Nos Projets
            </h1>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte" style="
                position: absolute; 
                right: 0; 
                top: 10%; /* Centre l'origine de l'image verticalement */
                transform: translateY(-50%) rotate(-180deg); /* Centre parfaitement + ta rotation */
                height: 200%; /* Ajuste la taille de la forme (essaie 80% à 100%) */
                width: auto;
                pointer-events: none; /* Empêche de cliquer sur l'image par erreur */
            " />
        </div>
            <div class="projects-grid" style="padding: 5vw  5vw;">
                
                <?php
                // 1. On configure la requête pour récupérer les articles
                $args = array(
                    'post_type'      => 'post',      // Type de contenu : Articles
                    'posts_per_page' => 9,           // Nombre d'articles à afficher
                    'orderby'        => 'date',      // Trier par date
                    'order'          => 'DESC'       // Du plus récent au plus vieux
                );

                $projets_query = new WP_Query( $args );

                if ( $projets_query->have_posts() ) :
                    while ( $projets_query->have_posts() ) : $projets_query->the_post(); ?>

                        <article class="project-card">
                            
                            <div class="card-image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large'); // Affiche l'image ?>
                                    </a>
                                <?php else : ?>
                                    <div class="no-image"></div> 
                                <?php endif; ?>
                            </div>

                            <div class="card-content">
                                <h3 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="card-excerpt">
                                    <?php the_excerpt(); // Affiche le résumé ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="card-btn-arrow" aria-label="Lire la suite">
                                    <span class="dashicons dashicons-arrow-right-alt2"></span>
                                </a>
                            </div>

                        </article>

                    <?php endwhile;
                    wp_reset_postdata(); // Important : réinitialise les données après la boucle
                else : ?>
                    <p><?php esc_html_e( 'Aucun projet trouvé pour le moment.', 'revelacteur' ); ?></p>
                <?php endif; ?>

            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>