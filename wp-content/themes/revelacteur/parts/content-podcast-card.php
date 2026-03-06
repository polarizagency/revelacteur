<?php
/**
 * Template Part: Podcast Card Component
 * 
 * Affiche une carte de podcast avec image, titre, durée et liens.
 * Utilisable partout dans le thème via get_template_part().
 */

// Récupère les informations du podcast
$audio_file = get_post_meta(get_the_ID(), '_podcast_audio_file', true);
$youtube_url = get_post_meta(get_the_ID(), '_podcast_youtube_url', true);
$spotify_url = get_post_meta(get_the_ID(), '_podcast_spotify_url', true);
$duration = get_post_meta(get_the_ID(), '_podcast_duration', true);
$episode_number = get_post_meta(get_the_ID(), '_podcast_episode_number', true);
$season_number = get_post_meta(get_the_ID(), '_podcast_season_number', true);
$publish_date = get_post_meta(get_the_ID(), '_podcast_publish_date', true);

// Récupère la première catégorie du podcast
$categories = get_the_terms(get_the_ID(), 'categorie_podcast');
$category_name = $categories && !is_wp_error($categories) ? $categories[0]->name : '';
?>

<article class="podcast-card">

    <div class="podcast-card__image">
        <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>" class="podcast-card__image-link">
                <?php the_post_thumbnail('large'); ?>
            </a>
        <?php else: ?>
            <div class="podcast-card__image-placeholder">
                <span class="dashicons dashicons-microphone"></span>
            </div>
        <?php endif; ?>

        <?php if ($duration): ?>
            <span class="podcast-duration-badge">
                <span class="dashicons dashicons-clock"></span>
                <?php echo esc_html($duration); ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="podcast-card__content">
        <?php if ($category_name): ?>
            <span class="podcast-card__category"><?php echo esc_html(strtoupper($category_name)); ?></span>
        <?php endif; ?>

        <div class="podcast-card__header">
            <?php if ($episode_number): ?>
                <div class="podcast-card__episode">
                    <?php if ($season_number): ?>
                        <span class="season">S<?php echo esc_html($season_number); ?></span>
                    <?php endif; ?>
                    <span class="episode">ÉP. <?php echo esc_html($episode_number); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($publish_date): ?>
                <div class="podcast-card__date">
                    <?php echo date_i18n('d M Y', strtotime($publish_date)); ?>
                </div>
            <?php endif; ?>
        </div>

        <h3 class="podcast-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <p class="podcast-card__excerpt">
            <?php
            $excerpt = get_the_excerpt();
            echo wp_trim_words($excerpt, 20, '...');
            ?>
        </p>

        <div class="podcast-card__links">
            <?php if ($audio_file): ?>
                <a href="<?php the_permalink(); ?>" class="podcast-link podcast-link--audio" title="Écouter">
                    <span class="dashicons dashicons-controls-play"></span>
                    Écouter
                </a>
            <?php endif; ?>

            <?php if ($youtube_url): ?>
                <a href="<?php echo esc_url($youtube_url); ?>" class="podcast-link podcast-link--youtube" target="_blank"
                    rel="noopener" title="Voir sur YouTube">
                    <span class="dashicons dashicons-video-alt3"></span>
                    YouTube
                </a>
            <?php endif; ?>

            <?php if ($spotify_url): ?>
                <a href="<?php echo esc_url($spotify_url); ?>" class="podcast-link podcast-link--spotify" target="_blank"
                    rel="noopener" title="Écouter sur Spotify">
                    <span class="dashicons dashicons-spotify"></span>
                    Spotify
                </a>
            <?php endif; ?>
        </div>
    </div>

</article>