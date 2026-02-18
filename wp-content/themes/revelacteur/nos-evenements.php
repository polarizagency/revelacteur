<?php
/*
Template Name: Page Nos Événements
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="page-hero">
            <h1 class="page-title page-hero__title">Nos Événements</h1>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                class="decoration-verte page-hero__shape" />
        </div>

        <section class="events-filters">
            <div class="container">
                <div class="filters-list">
                    <?php
                    // RÉCUPÈRE LES TERMES DE LA TAXONOMIE ÉVÉNEMENTS
                    $terms = get_terms(array(
                        'taxonomy' => 'categorie_evenement',
                        'hide_empty' => true,
                    ));

                    echo '<button class="filter-btn active" data-category="all">Tous les événements</button>';

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
            <div class="events-grid">
                <?php
                $args = array(
                    'post_type' => 'evenement',
                    'posts_per_page' => 12,
                    'orderby' => 'meta_value',
                    'meta_key' => '_event_date',
                    'order' => 'ASC', // Les événements les plus proches en premier
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => '_event_date',
                            'compare' => 'EXISTS'
                        ),
                        array(
                            'key' => '_event_date',
                            'compare' => 'NOT EXISTS'
                        )
                    )
                );

                $events_query = new WP_Query($args);

                if ($events_query->have_posts()):
                    while ($events_query->have_posts()):
                        $events_query->the_post();

                        // RÉCUPÈRE LES TERMES POUR LE FILTRE JS
                        $event_terms = get_the_terms(get_the_ID(), 'categorie_evenement');
                        $term_slugs = array();
                        if ($event_terms) {
                            foreach ($event_terms as $t) {
                                $term_slugs[] = $t->slug;
                            }
                        }
                        $data_categories = implode(' ', $term_slugs);
                        ?>
                        <div class="event-card-wrapper" data-categories="<?php echo esc_attr($data_categories); ?>">
                            <?php get_template_part('parts/content-event-card'); ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else: ?>
                    <p>Aucun événement trouvé pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const eventCards = document.querySelectorAll('.event-card-wrapper');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Retirer la classe active de tous les boutons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');

                const filterCategory = this.getAttribute('data-category');

                eventCards.forEach(card => {
                    if (filterCategory === 'all') {
                        card.style.display = 'block';
                    } else {
                        const cardCategories = card.getAttribute('data-categories');
                        if (cardCategories.includes(filterCategory)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>

<?php get_footer(); ?>