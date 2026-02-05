<?php
/**
 * Template Name: Page d'Accueil Personnalisée
 *
 * Utilisé pour afficher la page d'accueil d'un site.
 * A la plus haute priorité sur tout autre template d'accueil.
 */

get_header(); // Inclut le contenu de header.php
?>

<main id="primary" class="site-main">

<?php 

get_template_part( 'parts/banner', 'hero', [
    
] );
get_template_part( 'parts/section-home-1', '', [
    
] );
?>

<!-- Section: Nos Derniers Projets -->
<section class="home-latest-projects">
    <div class="section-title-wrapper">
        <div class="container">
            <h2 class="section-title">Nos Derniers Projets</h2>
        </div>
    </div>
    <div class="container">
        <div class="projects-grid projects-grid--home">
            <?php
            // Récupère les 3 derniers articles
            $latest_projects = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            ]);

            if ($latest_projects->have_posts()) :
                while ($latest_projects->have_posts()) : $latest_projects->the_post();
                    get_template_part('parts/content-project-card');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="home-projects-cta">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('nos-projets'))); ?>" class="btn btn-primary">
                Voir plus de projets
            </a>
        </div>
    </div>
</section>

</main><?php
get_footer(); // Inclut le contenu de footer.php
?>