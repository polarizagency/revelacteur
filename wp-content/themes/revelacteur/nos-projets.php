<?php
/*
Template Name: Page Nos Projets
*/

get_header(); ?>

<div id="primary" class="content-area" >
    <main id="main" class="site-main">

        <div class="container" ">
            <div style="height:45vh ; background-color:var(--color-primary) ;align-items: center; ; display:flex; position: relative;">
            <h1 class="page-title" style="text-align:left; margin:0 ; margin-left: 10vw ; font-family: 'RedsAglonema', cursive; color:var(--color-secondary)  ; font-size: 6rem;">Nos Projets</h1>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt="" class="decoration-verte" style=" position: absolute; right: 3px; bottom : -2px; transform: rotate(-180deg);" />
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