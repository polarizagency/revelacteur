<?php
/*
Plugin Name: Projects Plugin
Description: Ajoute un Custom Post Type "Projets" et une taxonomie "Catégories de Projets".
Version: 1.0
Author: Polariz
*/

// Sécurité : empêche l'accès direct au fichier
if (!defined('ABSPATH'))
    exit;

// 1. Enregistrement du Custom Post Type "Projet"
function register_custom_post_type_projets()
{
    $labels = array(
        'name' => 'Projets',
        'singular_name' => 'Projet',
        'menu_name' => 'Projets',
        'add_new' => 'Ajouter un Projet',
        'add_new_item' => 'Ajouter un nouveau Projet',
        'edit_item' => 'Modifier le Projet',
        'all_items' => 'Tous les Projets',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio', // Icône mallette
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'projets'),
        'show_in_rest' => true, // Important pour l'éditeur Gutenberg
        'template' => array(
            array('core/heading', array('placeholder' => 'Présentation du projet', 'level' => 2)),
            array('core/paragraph', array('placeholder' => 'Écrivez ici la description...')),
            array('core/image'),
            array('core/heading', array('content' => 'Détails techniques', 'level' => 3)),
            array('core/paragraph', array('placeholder' => 'Autres informations...')),
        ),
    );

    register_post_type('projet', $args);
}
add_action('init', 'register_custom_post_type_projets');

// 2. Enregistrement d'une taxonomie personnalisée (Catégories de projets)
function register_taxonomy_projets()
{
    $labels = array(
        'name' => 'Catégories de Projets',
        'singular_name' => 'Catégorie de Projet',
    );

    $args = array(
        'hierarchical' => true, // Se comporte comme les catégories d'articles
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-projet'),
        'show_in_rest' => true,
    );

    register_taxonomy('categorie_projet', array('projet'), $args);
}
add_action('init', 'register_taxonomy_projets');

// 3. Ajout d'une Meta Box pour le statut du projet
function add_project_status_meta_box()
{
    add_meta_box(
        'project_status_meta_box',
        'Statut du Projet',
        'render_project_status_meta_box',
        'projet',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_project_status_meta_box');

// Affichage du contenu de la Meta Box
function render_project_status_meta_box($post)
{
    // Sécurité : Nonce field
    wp_nonce_field('save_project_status', 'project_status_nonce');

    // Récupération de la valeur actuelle
    $current_status = get_post_meta($post->ID, '_project_status', true);

    // Liste des statuts disponibles
    $statuses = array(
        '' => '-- Aucun statut --',
        'en-cours' => 'En cours',
        'termine' => 'Terminé',
        'en-pause' => 'En pause',
        'a-venir' => 'À venir'
    );

    echo '<label for="project_status">Choisir un statut :</label><br>';
    echo '<select name="project_status" id="project_status" style="width: 100%; margin-top: 10px;">';
    foreach ($statuses as $value => $label) {
        $selected = ($current_status === $value) ? 'selected' : '';
        echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}

// Sauvegarde des données de la Meta Box
function save_project_status_meta($post_id)
{
    // Vérification de sécurité
    if (!isset($_POST['project_status_nonce']) || !wp_verify_nonce($_POST['project_status_nonce'], 'save_project_status')) {
        return;
    }

    // Vérification des autorisations
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Enregistrement de la valeur
    if (isset($_POST['project_status'])) {
        update_post_meta($post_id, '_project_status', sanitize_text_field($_POST['project_status']));
    }
}
add_action('save_post_projet', 'save_project_status_meta');