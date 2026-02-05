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


            <!-- Bandeau des catégories/filtres -->
            <section class="projects-filters">
                <div class="container">
                    <div class="filters-list">
                        <?php
                        // Récupère toutes les catégories
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'hide_empty' => true
                        ));
                        
                        // Affiche un bouton "Tous"
                        echo '<button class="filter-btn active" data-category="all">Tous les projets</button>';
                        
                        // Affiche chaque catégorie
                        foreach($categories as $category) {
                            echo '<button class="filter-btn" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
                        }
                        ?>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="projects-grid">
                    
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
                        // Récupère les catégories de l'article
                        $post_categories = get_the_category();
                        $category_slugs = array();
                        foreach($post_categories as $cat) {
                            $category_slugs[] = $cat->slug;
                        }
                        $data_categories = implode(' ', $category_slugs);
                        ?>
                        <div class="project-card-wrapper" data-categories="<?php echo esc_attr($data_categories); ?>">
                            <?php get_template_part( 'parts/content-project-card' ); ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata(); // Important : réinitialise les données après la boucle
                else : ?>
                    <p><?php esc_html_e( 'Aucun projet trouvé pour le moment.', 'revelacteur' ); ?></p>
                <?php endif; ?>

                </div>
            </div>
        </div>

    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card-wrapper');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Retire la classe active de tous les boutons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Ajoute la classe active au bouton cliqué
            this.classList.add('active');
            
            const category = this.getAttribute('data-category');
            
            projectCards.forEach(card => {
                if (category === 'all') {
                    card.style.display = 'block';
                } else {
                    const categories = card.getAttribute('data-categories');
                    if (categories && categories.includes(category)) {
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