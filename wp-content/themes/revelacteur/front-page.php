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

    get_template_part('parts/banner', 'hero', [

    ]);
    get_template_part('parts/section-home-1', '', [

    ]);
    get_template_part('parts/section-home-2', '', [

    ]);
    ?>
    <!-- Section: Nos Derniers Évènements -->
    <section class="home-latest-events">
        <div class="section-title-wrapper">
            <div class="container">
                <h2 class="section-title">Nos Évènements</h2>
            </div>
        </div>
        <div class="container">
            <div class="projects-grid projects-grid--home events-grid">
                <?php
                // Récupère les 3 derniers events du Custom Post Type Event
                $latest_projects = new WP_Query([
                    'post_type' => 'evenement',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ]);

                if ($latest_projects->have_posts()):
                    while ($latest_projects->have_posts()):
                        $latest_projects->the_post();
                        get_template_part('parts/content-event-card');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="home-projects-cta">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('nos-evenements'))); ?>"
                    class="btn btn-primary">
                    Voir plus d'évènements
                </a>
            </div>
        </div>
    </section>
    <!-- Section: Nos Derniers Projets -->
    <section class="home-latest-projects">
        <div class="section-title-wrapper">
            <div class="container">
                <h2 class="section-title">Nos Projets</h2>
            </div>
        </div>
        <div class="container">
            <div class="projects-grid projects-grid--home">
                <?php
                // Récupère les 3 derniers projets du Custom Post Type
                $latest_projects = new WP_Query([
                    'post_type' => 'projet',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ]);

                if ($latest_projects->have_posts()):
                    while ($latest_projects->have_posts()):
                        $latest_projects->the_post();
                        get_template_part('parts/content-project-card');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="home-projects-cta">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('nos-projets'))); ?>"
                    class="btn btn-primary">
                    Voir plus de projets
                </a>
            </div>
        </div>
    </section>

</main>
<?php
get_footer(); // Inclut le contenu de footer.php
?>