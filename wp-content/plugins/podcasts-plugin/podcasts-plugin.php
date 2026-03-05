<?php
/*
Plugin Name: Podcasts Plugin
Description: Ajoute un Custom Post Type "Podcasts" avec fichiers audio, liens YouTube et Spotify.
Version: 1.0
Author: Polariz
*/

// Sécurité : empêche l'accès direct au fichier
if (!defined('ABSPATH'))
    exit;

// 1. Enregistrement du Custom Post Type "Podcast"
function register_custom_post_type_podcasts()
{
    $labels = array(
        'name' => 'Podcasts',
        'singular_name' => 'Podcast',
        'menu_name' => 'Podcasts',
        'add_new' => 'Ajouter un Podcast',
        'add_new_item' => 'Ajouter un nouveau Podcast',
        'edit_item' => 'Modifier le Podcast',
        'all_items' => 'Tous les Podcasts',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-microphone',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'podcasts'),
        'show_in_rest' => true,
    );

    register_post_type('podcast', $args);
}
add_action('init', 'register_custom_post_type_podcasts');

// 2. Enregistrement d'une taxonomie personnalisée (Catégories de podcasts)
function register_taxonomy_podcasts()
{
    $labels = array(
        'name' => 'Catégories de Podcasts',
        'singular_name' => 'Catégorie de Podcast',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-podcast'),
        'show_in_rest' => true,
    );

    register_taxonomy('categorie_podcast', array('podcast'), $args);
}
add_action('init', 'register_taxonomy_podcasts');

// 3. Ajout des Meta Boxes pour les informations du podcast
function add_podcast_meta_boxes()
{
    // Meta Box pour les liens et fichier audio
    add_meta_box(
        'podcast_media_meta_box',
        'Médias du Podcast',
        'render_podcast_media_meta_box',
        'podcast',
        'normal',
        'high'
    );

    // Meta Box pour les informations supplémentaires
    add_meta_box(
        'podcast_details_meta_box',
        'Détails du Podcast',
        'render_podcast_details_meta_box',
        'podcast',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_podcast_meta_boxes');

// Affichage du contenu de la Meta Box - Médias
function render_podcast_media_meta_box($post)
{
    wp_nonce_field('save_podcast_media', 'podcast_media_nonce');

    $audio_file = get_post_meta($post->ID, '_podcast_audio_file', true);
    $youtube_url = get_post_meta($post->ID, '_podcast_youtube_url', true);
    $spotify_url = get_post_meta($post->ID, '_podcast_spotify_url', true);
    ?>

    <table class="form-table">
        <tr>
            <th><label for="podcast_audio_file">Fichier Audio</label></th>
            <td>
                <input type="text" name="podcast_audio_file" id="podcast_audio_file"
                    value="<?php echo esc_url($audio_file); ?>" style="width: 70%;" readonly>
                <button type="button" class="button podcast-upload-audio">Téléverser un fichier audio</button>
                <?php if ($audio_file): ?>
                    <br><br>
                    <audio controls style="width: 100%; max-width: 500px;">
                        <source src="<?php echo esc_url($audio_file); ?>" type="audio/mpeg">
                        Votre navigateur ne supporte pas la lecture audio.
                    </audio>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><label for="podcast_youtube_url">Lien YouTube</label></th>
            <td>
                <input type="url" name="podcast_youtube_url" id="podcast_youtube_url"
                    value="<?php echo esc_url($youtube_url); ?>" style="width: 100%;"
                    placeholder="https://www.youtube.com/watch?v=...">
            </td>
        </tr>
        <tr>
            <th><label for="podcast_spotify_url">Lien Spotify</label></th>
            <td>
                <input type="url" name="podcast_spotify_url" id="podcast_spotify_url"
                    value="<?php echo esc_url($spotify_url); ?>" style="width: 100%;"
                    placeholder="https://open.spotify.com/episode/...">
            </td>
        </tr>
    </table>

    <script>
        jQuery(document).ready(function ($) {
            var mediaUploader;

            $('.podcast-upload-audio').on('click', function (e) {
                e.preventDefault();

                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media({
                    title: 'Sélectionner un fichier audio',
                    button: {
                        text: 'Utiliser ce fichier'
                    },
                    library: {
                        type: 'audio'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function () {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#podcast_audio_file').val(attachment.url);
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}

// Affichage du contenu de la Meta Box - Détails
function render_podcast_details_meta_box($post)
{
    wp_nonce_field('save_podcast_details', 'podcast_details_nonce');

    $duration = get_post_meta($post->ID, '_podcast_duration', true);
    $episode_number = get_post_meta($post->ID, '_podcast_episode_number', true);
    $season_number = get_post_meta($post->ID, '_podcast_season_number', true);
    $publish_date = get_post_meta($post->ID, '_podcast_publish_date', true);
    ?>

    <table class="form-table">
        <tr>
            <th><label for="podcast_episode_number">Numéro d'épisode</label></th>
            <td>
                <input type="number" name="podcast_episode_number" id="podcast_episode_number"
                    value="<?php echo esc_attr($episode_number); ?>" style="width: 100%;" min="1" placeholder="Ex: 1">
            </td>
        </tr>
        <tr>
            <th><label for="podcast_season_number">Saison (optionnel)</label></th>
            <td>
                <input type="number" name="podcast_season_number" id="podcast_season_number"
                    value="<?php echo esc_attr($season_number); ?>" style="width: 100%;" min="1" placeholder="Ex: 1">
            </td>
        </tr>
        <tr>
            <th><label for="podcast_duration">Durée</label></th>
            <td>
                <input type="text" name="podcast_duration" id="podcast_duration" value="<?php echo esc_attr($duration); ?>"
                    style="width: 100%;" placeholder="Ex: 45 min">
            </td>
        </tr>
        <tr>
            <th><label for="podcast_publish_date">Date de publication</label></th>
            <td>
                <input type="date" name="podcast_publish_date" id="podcast_publish_date"
                    value="<?php echo esc_attr($publish_date); ?>" style="width: 100%;">
            </td>
        </tr>
    </table>
    <?php
}

// Sauvegarde des données des Meta Boxes
function save_podcast_meta($post_id)
{
    // Vérification de sécurité pour les médias
    if (isset($_POST['podcast_media_nonce']) && wp_verify_nonce($_POST['podcast_media_nonce'], 'save_podcast_media')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['podcast_audio_file'])) {
                update_post_meta($post_id, '_podcast_audio_file', esc_url_raw($_POST['podcast_audio_file']));
            }
            if (isset($_POST['podcast_youtube_url'])) {
                update_post_meta($post_id, '_podcast_youtube_url', esc_url_raw($_POST['podcast_youtube_url']));
            }
            if (isset($_POST['podcast_spotify_url'])) {
                update_post_meta($post_id, '_podcast_spotify_url', esc_url_raw($_POST['podcast_spotify_url']));
            }
        }
    }

    // Vérification de sécurité pour les détails
    if (isset($_POST['podcast_details_nonce']) && wp_verify_nonce($_POST['podcast_details_nonce'], 'save_podcast_details')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['podcast_duration'])) {
                update_post_meta($post_id, '_podcast_duration', sanitize_text_field($_POST['podcast_duration']));
            }
            if (isset($_POST['podcast_episode_number'])) {
                update_post_meta($post_id, '_podcast_episode_number', absint($_POST['podcast_episode_number']));
            }
            if (isset($_POST['podcast_season_number'])) {
                update_post_meta($post_id, '_podcast_season_number', absint($_POST['podcast_season_number']));
            }
            if (isset($_POST['podcast_publish_date'])) {
                update_post_meta($post_id, '_podcast_publish_date', sanitize_text_field($_POST['podcast_publish_date']));
            }
        }
    }
}
add_action('save_post_podcast', 'save_podcast_meta');

// 4. Ajouter des colonnes personnalisées dans la liste des podcasts
function add_podcast_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['podcast_episode'] = 'Épisode';
    $new_columns['podcast_duration'] = 'Durée';
    $new_columns['podcast_date'] = 'Date de publication';
    $new_columns['taxonomy-categorie_podcast'] = 'Catégorie';
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_podcast_posts_columns', 'add_podcast_columns');

// Remplir les colonnes personnalisées
function fill_podcast_columns($column, $post_id)
{
    switch ($column) {
        case 'podcast_episode':
            $episode = get_post_meta($post_id, '_podcast_episode_number', true);
            $season = get_post_meta($post_id, '_podcast_season_number', true);
            if ($season) {
                echo 'S' . esc_html($season) . ' - ';
            }
            echo $episode ? 'Ép. ' . esc_html($episode) : '—';
            break;

        case 'podcast_duration':
            $duration = get_post_meta($post_id, '_podcast_duration', true);
            echo $duration ? esc_html($duration) : '—';
            break;

        case 'podcast_date':
            $publish_date = get_post_meta($post_id, '_podcast_publish_date', true);
            if ($publish_date) {
                echo date_i18n('d/m/Y', strtotime($publish_date));
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_podcast_posts_custom_column', 'fill_podcast_columns', 10, 2);

// Rendre les colonnes triables
function make_podcast_columns_sortable($columns)
{
    $columns['podcast_episode'] = 'podcast_episode';
    $columns['podcast_duration'] = 'podcast_duration';
    $columns['podcast_date'] = 'podcast_date';
    return $columns;
}
add_filter('manage_edit-podcast_sortable_columns', 'make_podcast_columns_sortable');
