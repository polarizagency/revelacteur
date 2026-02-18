<?php
/*
Template Name: Page Nos Projets
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="page-hero">
            <h1 class="page-title page-hero__title">Nos Projets </h1>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                class="decoration-verte page-hero__shape" />
        </div>


        <section class="projects-filters">
            <div class="container">
                <div class="filters-list">
                    <?php
                    // RÉCUPÈRE LES TERMES DE TA TAXONOMIE PERSONNALISÉE
                    $terms = get_terms(array(
                        'taxonomy' => 'categorie_projet',
                        'hide_empty' => true,
                    ));

                    echo '<button class="filter-btn active" data-category="all">Tous les projets</button>';

                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<button class="filter-btn" data-category="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</button>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="projects-grid">
                <?php
                $args = array(
                    'post_type' => 'projet', // TON NOUVEAU CPT
                    'posts_per_page' => 9,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $projets_query = new WP_Query($args);

                if ($projets_query->have_posts()):
                    while ($projets_query->have_posts()):
                        $projets_query->the_post();

                        // RÉCUPÈRE LES TERMES POUR LE FILTRE JS
                        $project_terms = get_the_terms(get_the_ID(), 'categorie_projet');
                        $term_slugs = array();
                        if ($project_terms) {
                            foreach ($project_terms as $t) {
                                $term_slugs[] = $t->slug;
                            }
                        }
                        $data_categories = implode(' ', $term_slugs);
                        ?>
                        <div class="project-card-wrapper" data-categories="<?php echo esc_attr($data_categories); ?>">
                            <?php get_template_part('parts/content-project-card'); ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else: ?>
                    <p>Aucun projet trouvé pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<script>
    // ... Ton script actuel ...
</script>

<?php get_footer(); ?>