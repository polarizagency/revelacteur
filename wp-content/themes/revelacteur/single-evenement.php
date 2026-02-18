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

                <?php if (has_post_thumbnail()): ?>
                    <div class="event-hero">
                        <?php the_post_thumbnail('full'); ?>

                        <?php if ($event_status && isset($status_labels[$event_status])): ?>
                            <span class="event-status-badge status-<?php echo esc_attr($event_status); ?>">
                                <?php echo esc_html($status_labels[$event_status]); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <header class="event-header-purple">
                    <div class="page-hero-event"></div>
                    <h1 class="page-title page-hero-event__title"><?php the_title(); ?></h1>

                    <div class="event-meta-header">
                        <?php if ($event_date): ?>
                            <span class="meta-item">
                                <span class="dashicons dashicons-calendar-alt"></span>
                                <?php echo date_i18n('l j F Y', strtotime($event_date)); ?>
                                <?php if ($event_time): ?>
                                    à <?php echo esc_html($event_time); ?>
                                <?php endif; ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($event_location): ?>
                            <span class="meta-item">
                                <span class="dashicons dashicons-location"></span>
                                <?php echo esc_html($event_location); ?>
                            </span>
                        <?php endif; ?>

                        <?php
                        $terms = get_the_terms(get_the_ID(), 'categorie_evenement');
                        if ($terms): ?>
                            <span class="meta-item">
                                <span class="dashicons dashicons-tag"></span>
                                <?php echo esc_html($terms[0]->name); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="container content-wrapper">

                    <div class="event-info-grid">
                        <!-- Colonne principale avec le contenu -->
                        <div class="event-main-content">
                            <section class="event-section">
                                <h2 class="section-title">À propos de cet événement</h2>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </section>
                        </div>

                        <!-- Sidebar avec les informations pratiques -->
                        <aside class="event-sidebar">
                            <div class="event-info-card">
                                <h3>Informations pratiques</h3>

                                <?php if ($event_date): ?>
                                    <div class="info-item">
                                        <span class="dashicons dashicons-calendar-alt"></span>
                                        <div>
                                            <strong>Date</strong>
                                            <p><?php echo date_i18n('l j F Y', strtotime($event_date)); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($event_time): ?>
                                    <div class="info-item">
                                        <span class="dashicons dashicons-clock"></span>
                                        <div>
                                            <strong>Horaire</strong>
                                            <p><?php echo esc_html($event_time); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($event_location): ?>
                                    <div class="info-item">
                                        <span class="dashicons dashicons-location"></span>
                                        <div>
                                            <strong>Lieu</strong>
                                            <p><?php echo esc_html($event_location); ?></p>
                                            <?php if ($event_address): ?>
                                                <p class="event-address"><?php echo nl2br(esc_html($event_address)); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($event_capacity): ?>
                                    <div class="info-item">
                                        <span class="dashicons dashicons-groups"></span>
                                        <div>
                                            <strong>Capacité</strong>
                                            <p><?php echo esc_html($event_capacity); ?> places</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($event_status === 'inscriptions-ouvertes' || $event_status === 'a-venir'): ?>
                                <div class="event-cta-card">
                                    <a href="#" class="btn-event-register">S'inscrire à l'événement</a>
                                </div>
                            <?php endif; ?>
                        </aside>
                    </div>

                    <section class="event-contact-footer">
                        <h2 class="cta-title">Des questions ? <br><span class="highlight">Contactez-nous !</span></h2>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-contact">Nous Contacter</a>
                    </section>

                </div>

                <nav class="event-nav-bottom">
                    <div class="container">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();

                        if ($prev_post): ?>
                            <a href="<?php echo get_permalink($prev_post); ?>" class="nav-link prev-link">
                                ← Événement Précédent
                            </a>
                        <?php else: ?>
                            <span class="nav-link-disabled"></span>
                        <?php endif; ?>

                        <a href="<?php echo get_permalink(get_page_by_path('nos-evenements')); ?>" class="nav-link-center">
                            Voir tous les événements
                        </a>

                        <?php if ($next_post): ?>
                            <a href="<?php echo get_permalink($next_post); ?>" class="nav-link next-link">
                                Événement Suivant →
                            </a>
                        <?php else: ?>
                            <span class="nav-link-disabled"></span>
                        <?php endif; ?>
                    </div>
                </nav>

            </article>

        <?php endwhile; ?>

    </main>
</div>

<?php get_footer(); ?>