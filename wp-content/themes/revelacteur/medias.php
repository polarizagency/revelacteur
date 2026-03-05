<?php
/*
Template Name: Page Médias
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- SECTION PODCASTS -->
        <div class="podcasts-section">
            <div class="page-hero mbottom-banniere">
                <h1 class="page-title page-hero__title">Nos podcasts</h1>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>

            <div class="container">
                <?php
                // Requête pour récupérer tous les podcasts
                $podcasts_query = new WP_Query(array(
                    'post_type' => 'podcast',
                    'posts_per_page' => -1, // Tous les podcasts
                    'orderby' => 'meta_value_num',
                    'meta_key' => '_podcast_episode_number',
                    'order' => 'DESC'
                ));

                if ($podcasts_query->have_posts()): ?>
                    <div class="podcasts-grid">
                        <?php while ($podcasts_query->have_posts()):
                            $podcasts_query->the_post(); ?>
                            <?php get_template_part('parts/content', 'podcast-card'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="no-content">Aucun podcast disponible pour le moment.</p>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <!-- SECTION TWITCH -->
        <div class="twitch-section">
            <div class="page-hero m-banniere">
                <h1 class="page-title page-hero__title">Nos lives Twitch</h1>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>

            <div class="container">
                <div class="twitch-embed-container">
                    <iframe
                        src="https://player.twitch.tv/?channel=revelacteur62&parent=<?php echo $_SERVER['SERVER_NAME']; ?>"
                        height="480" width="720" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>