<?php
/*
Plugin Name: Events Plugin
Description: Ajoute un Custom Post Type "Événements" avec dates, lieux et catégories.
Version: 1.0
Author: Polariz
*/

// Sécurité : empêche l'accès direct au fichier
if (!defined('ABSPATH'))
    exit;

// 1. Enregistrement du Custom Post Type "Événement"
function register_custom_post_type_evenements()
{
    $labels = array(
        'name' => 'Événements',
        'singular_name' => 'Événement',
        'menu_name' => 'Événements',
        'add_new' => 'Ajouter un Événement',
        'add_new_item' => 'Ajouter un nouvel Événement',
        'edit_item' => 'Modifier l\'Événement',
        'all_items' => 'Tous les Événements',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt', // Icône calendrier
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'evenements'),
        'show_in_rest' => true, // Important pour l'éditeur Gutenberg
        'template' => array(
            array('core/heading', array('placeholder' => 'Description de l\'événement', 'level' => 2)),
            array('core/paragraph', array('placeholder' => 'Écrivez ici les détails...')),
            array('core/image'),
            array('core/heading', array('content' => 'Programme', 'level' => 3)),
            array('core/paragraph', array('placeholder' => 'Détails du programme...')),
        ),
    );

    register_post_type('evenement', $args);
}
add_action('init', 'register_custom_post_type_evenements');

// 2. Enregistrement d'une taxonomie personnalisée (Catégories d'événements)
function register_taxonomy_evenements()
{
    $labels = array(
        'name' => 'Catégories d\'Événements',
        'singular_name' => 'Catégorie d\'Événement',
    );

    $args = array(
        'hierarchical' => true, // Se comporte comme les catégories d'articles
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-evenement'),
        'show_in_rest' => true,
    );

    register_taxonomy('categorie_evenement', array('evenement'), $args);
}
add_action('init', 'register_taxonomy_evenements');

// 3. Ajout des Meta Boxes pour les informations de l'événement
function add_event_meta_boxes()
{
    // Meta Box pour les détails de l'événement
    add_meta_box(
        'event_details_meta_box',
        'Détails de l\'Événement',
        'render_event_details_meta_box',
        'evenement',
        'normal',
        'high'
    );

    // Meta Box pour le statut de l'événement
    add_meta_box(
        'event_status_meta_box',
        'Statut de l\'Événement',
        'render_event_status_meta_box',
        'evenement',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_event_meta_boxes');

// Affichage du contenu de la Meta Box - Détails
function render_event_details_meta_box($post)
{
    // Sécurité : Nonce field
    wp_nonce_field('save_event_details', 'event_details_nonce');

    // Récupération des valeurs actuelles
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    $event_address = get_post_meta($post->ID, '_event_address', true);
    $event_capacity = get_post_meta($post->ID, '_event_capacity', true);
    ?>

    <table class="form-table">
        <tr>
            <th><label for="event_date">Date de l'événement</label></th>
            <td>
                <input type="date" name="event_date" id="event_date" value="<?php echo esc_attr($event_date); ?>"
                    style="width: 100%;">
            </td>
        </tr>
        <tr>
            <th><label for="event_time">Heure</label></th>
            <td>
                <input type="time" name="event_time" id="event_time" value="<?php echo esc_attr($event_time); ?>"
                    style="width: 100%;">
            </td>
        </tr>
        <tr>
            <th><label for="event_location">Lieu</label></th>
            <td>
                <input type="text" name="event_location" id="event_location"
                    value="<?php echo esc_attr($event_location); ?>" style="width: 100%;" placeholder="Ex: Salle des fêtes">
            </td>
        </tr>
        <tr>
            <th><label for="event_address">Adresse complète</label></th>
            <td>
                <textarea name="event_address" id="event_address" rows="3"
                    style="width: 100%;"><?php echo esc_textarea($event_address); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="event_capacity">Capacité / Nb de places</label></th>
            <td>
                <input type="number" name="event_capacity" id="event_capacity"
                    value="<?php echo esc_attr($event_capacity); ?>" style="width: 100%;" min="0" placeholder="Ex: 50">
            </td>
        </tr>
    </table>
    <?php
}

// Affichage du contenu de la Meta Box - Statut
function render_event_status_meta_box($post)
{
    // Sécurité : Nonce field
    wp_nonce_field('save_event_status', 'event_status_nonce');

    // Récupération de la valeur actuelle
    $current_status = get_post_meta($post->ID, '_event_status', true);

    // Liste des statuts disponibles
    $statuses = array(
        '' => '-- Aucun statut --',
        'a-venir' => 'À venir',
        'inscriptions-ouvertes' => 'Inscriptions ouvertes',
        'complet' => 'Complet',
        'annule' => 'Annulé',
        'termine' => 'Terminé'
    );

    echo '<label for="event_status">Choisir un statut :</label><br>';
    echo '<select name="event_status" id="event_status" style="width: 100%; margin-top: 10px;">';
    foreach ($statuses as $value => $label) {
        $selected = ($current_status === $value) ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

// Sauvegarde des données des Meta Boxes
function save_event_meta($post_id)
{
    // Vérification de sécurité pour les détails
    if (isset($_POST['event_details_nonce']) && wp_verify_nonce($_POST['event_details_nonce'], 'save_event_details')) {
        // Vérification des autorisations
        if (current_user_can('edit_post', $post_id)) {
            // Enregistrement des valeurs
            if (isset($_POST['event_date'])) {
                update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
            }
            if (isset($_POST['event_time'])) {
                update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
            }
            if (isset($_POST['event_location'])) {
                update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
            }
            if (isset($_POST['event_address'])) {
                update_post_meta($post_id, '_event_address', sanitize_textarea_field($_POST['event_address']));
            }
            if (isset($_POST['event_capacity'])) {
                update_post_meta($post_id, '_event_capacity', absint($_POST['event_capacity']));
            }
        }
    }

    // Vérification de sécurité pour le statut
    if (isset($_POST['event_status_nonce']) && wp_verify_nonce($_POST['event_status_nonce'], 'save_event_status')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['event_status'])) {
                update_post_meta($post_id, '_event_status', sanitize_text_field($_POST['event_status']));
            }
        }
    }
}
add_action('save_post_evenement', 'save_event_meta');

// 4. Ajouter des colonnes personnalisées dans la liste des événements
function add_event_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['event_date'] = 'Date';
    $new_columns['event_location'] = 'Lieu';
    $new_columns['event_status'] = 'Statut';
    $new_columns['taxonomy-categorie_evenement'] = 'Catégorie';
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_evenement_posts_columns', 'add_event_columns');

// Remplir les colonnes personnalisées
function fill_event_columns($column, $post_id)
{
    switch ($column) {
        case 'event_date':
            $event_date = get_post_meta($post_id, '_event_date', true);
            $event_time = get_post_meta($post_id, '_event_time', true);
            if ($event_date) {
                $date_formatted = date_i18n('d/m/Y', strtotime($event_date));
                echo $date_formatted;
                if ($event_time) {
                    echo ' à ' . esc_html($event_time);
                }
            } else {
                echo '—';
            }
            break;

        case 'event_location':
            $location = get_post_meta($post_id, '_event_location', true);
            echo $location ? esc_html($location) : '—';
            break;

        case 'event_status':
            $status = get_post_meta($post_id, '_event_status', true);
            $status_labels = array(
                'a-venir' => 'À venir',
                'inscriptions-ouvertes' => 'Inscriptions ouvertes',
                'complet' => 'Complet',
                'annule' => 'Annulé',
                'termine' => 'Terminé'
            );
            echo isset($status_labels[$status]) ? esc_html($status_labels[$status]) : '—';
            break;
    }
}
add_action('manage_evenement_posts_custom_column', 'fill_event_columns', 10, 2);

// Rendre les colonnes triables
function make_event_columns_sortable($columns)
{
    $columns['event_date'] = 'event_date';
    $columns['event_location'] = 'event_location';
    $columns['event_status'] = 'event_status';
    return $columns;
}
add_filter('manage_edit-evenement_sortable_columns', 'make_event_columns_sortable');
