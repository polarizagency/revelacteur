<?php
/*
Template Name: Page Nos Projets
*/

get_header(); ?>

<div id="primary" class="content-area" style="padding: 60px 20px;">
    <main id="main" class="site-main">

        <div class="container">
            <h1 class="page-title" style="text-align:center; margin-bottom: 50px; font-family: 'RedsAglonema', cursive; color: var(--color-primary);">Nos Projets</h1>

            <div class="projects-grid">
                
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