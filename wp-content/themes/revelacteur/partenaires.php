<?php
/*
Template Name: Page Partenaires
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- ============================== -->
        <!-- HERO BANNER                     -->
        <!-- ============================== -->
        <div class="page-hero">
            <h1 class="page-title page-hero__title">Partenaires</h1>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                class="decoration-verte page-hero__shape" />
        </div>

        <!-- ============================== -->
        <!-- SECTION : NOS PARTENAIRES ENGAGÉS -->
        <!-- ============================== -->
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
                    // Récupère les partenaires (CPT 'partenaire')
                    $partenaires = new WP_Query(array(
                        'post_type'      => 'partenaire',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));

                    if ($partenaires->have_posts()) :
                        // Premier passage : logos originaux
                        while ($partenaires->have_posts()) : $partenaires->the_post();
                            if (has_post_thumbnail()) : ?>
                                <div class="partenaires-logo-item">
                                    <?php the_post_thumbnail('medium', array(
                                        'alt' => esc_attr(get_the_title()),
                                        'loading' => 'eager',
                                    )); ?>
                                </div>
                            <?php endif;
                        endwhile;

                        // Deuxième passage : duplication pour boucle infinie
                        $partenaires->rewind_posts();
                        while ($partenaires->have_posts()) : $partenaires->the_post();
                            if (has_post_thumbnail()) : ?>
                                <div class="partenaires-logo-item" aria-hidden="true">
                                    <?php the_post_thumbnail('medium', array(
                                        'alt' => esc_attr(get_the_title()),
                                        'loading' => 'lazy',
                                    )); ?>
                                </div>
                            <?php endif;
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Fallback : logos placeholder si aucun partenaire n'est encore créé
                        $placeholder = get_template_directory_uri() . '/assets/img/logo-placeholder.png';
                        $logo_url = '';
                        if (function_exists('get_custom_logo')) {
                            $custom_logo_id = get_theme_mod('custom_logo');
                            if ($custom_logo_id) {
                                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'medium');
                            }
                        }
                        $logo_src = $logo_url ? $logo_url : $placeholder;
                        for ($i = 0; $i < 12; $i++) : ?>
                            <div class="partenaires-logo-item" <?php echo ($i >= 6) ? 'aria-hidden="true"' : ''; ?>>
                                <img src="<?php echo esc_url($logo_src); ?>" alt="Partenaire <?php echo $i + 1; ?>">
                            </div>
                        <?php endfor;
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- ============================== -->
        <!-- SECTION : CATÉGORIES PARTENAIRES -->
        <!-- ============================== -->
        <section class="partenaires-categories">
            <div class="container">
                <div class="partenaires-categories__grid">

                    <?php
                    // Récupère les catégories de partenaires (taxonomie 'type_partenaire')
                    $categories = get_terms(array(
                        'taxonomy'   => 'type_partenaire',
                        'hide_empty' => false,
                        'orderby'    => 'term_order',
                        'order'      => 'ASC',
                    ));

                    if (!empty($categories) && !is_wp_error($categories)) :
                        foreach ($categories as $cat) : ?>
                            <div class="partenaires-cat-card">
                                <h3 class="partenaires-cat-card__title"><?php echo esc_html($cat->name); ?></h3>
                                <p class="partenaires-cat-card__text"><?php echo esc_html($cat->description); ?></p>
                            </div>
                        <?php endforeach;
                    else :
                        // Fallback : cartes statiques
                    ?>
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
                    <?php endif; ?>

                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>
