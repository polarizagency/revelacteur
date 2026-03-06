<?php
/*
Template Name: Page Partenaires
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Hero -->
        <div class="page-hero">
            <h1 class="page-title page-hero__title">Partenaires</h1>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                class="decoration-verte page-hero__shape" />
        </div>
        <!-- Nos Partenaires Engagés -->
        <section class="partenaires-section">
            <div class="container partenaires-container">
                <h2 class="partenaires-section__title">Nos Partenaires Engagés</h2>
                <p class="partenaires-section__description">
                    Sed ut perspiciatis unde omnis iste natus error sit
                    voluptatem accusantium doloremque laudantium,
                    totam rem
                </p>
            </div>

            <!-- Bandeau de logos défilant -->
            <div class="partenaires-logos-wrapper">
                <div class="partenaires-logos-track">
                    <?php
                    $partenaires = new WP_Query(array(
                        'post_type' => 'partenaire',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ));

                    if ($partenaires->have_posts()):
                        while ($partenaires->have_posts()):
                            $partenaires->the_post();
                            if (has_post_thumbnail()): ?>
                                <div class="partenaires-logo-item" data-logo-original>
                                    <?php the_post_thumbnail('medium', array('alt' => esc_attr(get_the_title()))); ?>

                                </div>
                            <?php endif;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Catégories -->
        <section class="partenaires-categories">
            <div class="partenaires-categories__grid">
                <div class="partenaires-cat-card">
                    <h3 class="partenaires-cat-card__title">Institutions</h3>
                    <p class="partenaires-cat-card__text">
                        Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo
                        inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.
                    </p>
                </div>
                <div class="partenaires-cat-card">
                    <h3 class="partenaires-cat-card__title">Mécénat privé</h3>
                    <p class="partenaires-cat-card__text">
                        aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.
                    </p>

                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>