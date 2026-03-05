<?php
/**
 * Template Name: Single Podcast
 * Template Post Type: podcast
 */
get_header(); ?>

<div id="primary" class="content-area podcast-single-custom">
    <main id="main" class="site-main">

        <?php while (have_posts()):
            the_post();

            // Récupération des métadonnées du podcast
            $audio_file = get_post_meta(get_the_ID(), '_podcast_audio_file', true);
            $youtube_url = get_post_meta(get_the_ID(), '_podcast_youtube_url', true);
            $spotify_url = get_post_meta(get_the_ID(), '_podcast_spotify_url', true);
            $duration = get_post_meta(get_the_ID(), '_podcast_duration', true);
            $episode_number = get_post_meta(get_the_ID(), '_podcast_episode_number', true);
            $season_number = get_post_meta(get_the_ID(), '_podcast_season_number', true);
            $publish_date = get_post_meta(get_the_ID(), '_podcast_publish_date', true);
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- Header Section -->
                <header class="podcast-header-purple">
                    <div class="container">

                        <?php
                        $terms = get_the_terms(get_the_ID(), 'categorie_podcast');
                        if ($terms && !is_wp_error($terms)): ?>
                            <div class="podcast-single-category-badge">
                                <?php echo esc_html(strtoupper($terms[0]->name)); ?>
                            </div>
                        <?php endif; ?>

                        <h1 class="podcast-single-title"><?php the_title(); ?></h1>

                        <!-- Metadata -->
                        <div class="podcast-meta">
                            <?php if ($episode_number): ?>
                                <span class="meta-item">
                                    <span class="dashicons dashicons-playlist-audio"></span>
                                    <?php if ($season_number): ?>
                                        Saison <?php echo esc_html($season_number); ?> -
                                    <?php endif; ?>
                                    Épisode <?php echo esc_html($episode_number); ?>
                                </span>
                            <?php endif; ?>

                            <?php if ($duration): ?>
                                <span class="meta-item">
                                    <span class="dashicons dashicons-clock"></span>
                                    <?php echo esc_html($duration); ?>
                                </span>
                            <?php endif; ?>

                            <?php if ($publish_date): ?>
                                <span class="meta-item">
                                    <span class="dashicons dashicons-calendar-alt"></span>
                                    <?php echo date_i18n('d F Y', strtotime($publish_date)); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                </header>

                <div class="container podcast-content-wrapper">

                    <!-- Audio Player Section -->
                    <?php if ($audio_file): ?>
                        <section class="podcast-audio-section">
                            <h2 class="section-title">Écouter le podcast</h2>
                            <div class="podcast-audio-player">
                                <audio controls controlsList="nodownload">
                                    <source src="<?php echo esc_url($audio_file); ?>" type="audio/mpeg">
                                    Votre navigateur ne supporte pas la lecture audio.
                                </audio>
                            </div>
                        </section>
                    <?php endif; ?>

                    <!-- External Links Section -->
                    <?php if ($youtube_url || $spotify_url): ?>
                        <section class="podcast-links-section">
                            <h2 class="section-title">Écouter sur d'autres plateformes</h2>
                            <div class="podcast-external-links">
                                <?php if ($youtube_url): ?>
                                    <a href="<?php echo esc_url($youtube_url); ?>" class="podcast-platform-link youtube-link"
                                        target="_blank" rel="noopener">
                                        <span class="dashicons dashicons-video-alt3"></span>
                                        <span>Regarder sur YouTube</span>
                                    </a>
                                <?php endif; ?>

                                <?php if ($spotify_url): ?>
                                    <a href="<?php echo esc_url($spotify_url); ?>" class="podcast-platform-link spotify-link"
                                        target="_blank" rel="noopener">
                                        <span class="dashicons dashicons-spotify"></span>
                                        <span>Écouter sur Spotify</span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <!-- Description Section -->
                    <section class="podcast-description-section">
                        <h2 class="section-title">À propos de cet épisode</h2>
                        <div class="podcast-description-content">
                            <?php the_content(); ?>
                        </div>
                    </section>

                    <!-- Navigation (Previous/Next) -->
                    <section class="podcast-navigation">
                        <div class="podcast-nav-links">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>

                            <?php if ($prev_post): ?>
                                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="podcast-nav-link prev-podcast">
                                    <span class="dashicons dashicons-arrow-left-alt2"></span>
                                    <div class="nav-link-content">
                                        <span class="nav-label">Épisode précédent</span>
                                        <span class="nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <?php if ($next_post): ?>
                                <a href="<?php echo get_permalink($next_post->ID); ?>" class="podcast-nav-link next-podcast">
                                    <div class="nav-link-content">
                                        <span class="nav-label">Épisode suivant</span>
                                        <span class="nav-title"><?php echo esc_html($next_post->post_title); ?></span>
                                    </div>
                                    <span class="dashicons dashicons-arrow-right-alt2"></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </section>

                </div>

            </article>

        <?php endwhile; ?>

    </main>
</div>

<?php get_footer(); ?>