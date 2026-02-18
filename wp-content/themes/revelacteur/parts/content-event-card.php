<?php
/**
 * Template Part: Event Card Component
 * 
 * Affiche une carte d'événement avec image, titre, date, lieu et statut.
 * Utilisable partout dans le thème via get_template_part().
 */

// Récupère les informations de l'événement
$event_date = get_post_meta(get_the_ID(), '_event_date', true);
$event_time = get_post_meta(get_the_ID(), '_event_time', true);
$event_location = get_post_meta(get_the_ID(), '_event_location', true);
$event_status = get_post_meta(get_the_ID(), '_event_status', true);

// Labels des statuts
$status_labels = array(
    'a-venir' => 'À venir',
    'inscriptions-ouvertes' => 'Inscriptions ouvertes',
    'complet' => 'Complet',
    'annule' => 'Annulé',
    'termine' => 'Terminé'
);

// Récupère la première catégorie de l'événement
$categories = get_the_terms(get_the_ID(), 'categorie_evenement');
$category_name = $categories && !is_wp_error($categories) ? $categories[0]->name : '';
?>

<article class="event-card">

    <div class="card-image">
        <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>" class="card-image__link">
                <?php the_post_thumbnail('large'); ?>
            </a>
        <?php else: ?>
            <div class="card-image__placeholder"></div>
        <?php endif; ?>

        <?php if ($event_status && isset($status_labels[$event_status])): ?>
            <span class="event-status-badge status-<?php echo esc_attr($event_status); ?>">
                <?php echo esc_html($status_labels[$event_status]); ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="card-green-banner"></div>

    <div class="card-content">
        <div class="card-body">
            <h3 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="event-meta">
                <?php if ($event_date): ?>
                    <div class="event-meta-item">
                        <span class="dashicons dashicons-calendar-alt"></span>
                        <span><?php echo date_i18n('d/m/Y', strtotime($event_date)); ?></span>
                        <?php if ($event_time): ?>
                            <span> à <?php echo esc_html($event_time); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($event_location): ?>
                    <div class="event-meta-item">
                        <span class="dashicons dashicons-location"></span>
                        <span><?php echo esc_html($event_location); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <p class="card-description">
                <?php
                // Affiche le résumé ou les 20 premiers mots du contenu
                $excerpt = get_the_excerpt();
                echo wp_trim_words($excerpt, 20, '...');
                ?>
            </p>
        </div>

        <div class="card-footer">
            <?php if ($category_name): ?>
                <span class="card-badge"><?php echo esc_html($category_name); ?></span>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="card-arrow-btn" aria-label="Voir l'événement">
                <span class="dashicons dashicons-arrow-right-alt2"></span>
            </a>
        </div>
    </div>

</article>