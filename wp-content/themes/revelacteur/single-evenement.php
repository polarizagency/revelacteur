<?php
/**
 * Template Name: Single Événement
 * Template Post Type: evenement
 */
get_header(); ?>

<div id="primary" class="content-area event-single-custom">
    <main id="main" class="site-main">

        <?php while (have_posts()):
            the_post();

            // Récupération des métadonnées de l'événement
            $event_date = get_post_meta(get_the_ID(), '_event_date', true);
            $event_time = get_post_meta(get_the_ID(), '_event_time', true);
            $event_location = get_post_meta(get_the_ID(), '_event_location', true);
            $event_address = get_post_meta(get_the_ID(), '_event_address', true);
            $event_capacity = get_post_meta(get_the_ID(), '_event_capacity', true);
            $event_status = get_post_meta(get_the_ID(), '_event_status', true);

            $status_labels = array(
                'a-venir' => 'À venir',
                'inscriptions-ouvertes' => 'Inscriptions ouvertes',
                'complet' => 'Complet',
                'annule' => 'Annulé',
                'termine' => 'Terminé'
            );
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="container event-single-container">

                    <!-- Header section avec badge catégorie, titre et image -->
                    <div class="event-single-header">
                        <div class="event-single-header__left">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'categorie_evenement');
                            if ($terms && !is_wp_error($terms)): ?>
                                <div class="event-single-category-badge">
                                    <?php echo esc_html(strtoupper($terms[0]->name)); ?>
                                </div>
                            <?php endif; ?>

                            <h1 class="event-single-title"><?php the_title(); ?></h1>
                        </div>


                    </div>

                    <!-- Description de l'événement -->
                    <div class="event-single-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Informations pratiques en bas -->
                    <div class="event-single-info-boxes">
                        <?php if ($event_location): ?>
                            <div class="event-info-box">
                                <div class="event-info-box__label">LOCALISATION</div>
                                <div class="event-info-box__value"><?php echo esc_html(strtoupper($event_location)); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($event_time): ?>
                            <div class="event-info-box">
                                <div class="event-info-box__label">HORAIRE</div>
                                <div class="event-info-box__value"><?php echo esc_html($event_time); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </article>

        <?php endwhile; ?>

    </main>
</div>

<?php get_footer(); ?>