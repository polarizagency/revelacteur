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

// Parse la date pour extraire le jour et le mois
$day_number = '';
$month_name = '';
if ($event_date) {
    $timestamp = strtotime($event_date);
    $day_number = date_i18n('d', $timestamp);
    $month_name = strtoupper(date_i18n('F', $timestamp));
}
?>

<article class="event-card">

    <div class="event-card__image">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else: ?>
            <div class="event-card__image-placeholder"></div>
        <?php endif; ?>

        <?php if ($event_status && isset($status_labels[$event_status])): ?>
            <span class="event-status-badge status-<?php echo esc_attr($event_status); ?>">
                <?php echo esc_html($status_labels[$event_status]); ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="event-card__content">
        <?php if ($category_name): ?>
            <span class="event-card__category"><?php echo esc_html(strtoupper($category_name)); ?></span>
        <?php endif; ?>

        <div class="event-card__date-location">
            <?php if ($day_number): ?>
                <div class="event-card__day"><?php echo esc_html($day_number); ?></div>
            <?php endif; ?>

            <div class="event-card__meta">
                <?php if ($month_name): ?>
                    <div class="event-card__month"><?php echo esc_html($month_name); ?></div>
                <?php endif; ?>

                <?php if ($event_location): ?>
                    <div class="event-card__location">
                        <span class="dashicons dashicons-location"></span>
                        <?php echo esc_html(strtoupper($event_location)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="event-card__title-section">
            <h3 class="event-card__title"><?php the_title(); ?></h3>
        </div>

        <a href="<?php the_permalink(); ?>" class="event-card__btn">
            VOIR DÉTAILS
            <span class="dashicons dashicons-arrow-right-alt2"></span>
        </a>
    </div>

</article>