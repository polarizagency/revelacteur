<?php
/**
 * Composant : Bannière Hero Dynamique
 * Fichier : parts/banner-hero.php
 *
 * Priorité d'affichage :
 * 1. Titre de la page/post actuelle (celui édité par l'administrateur)
 * 2. Titre défini dans le Customizer (valeur par défaut)
 */

// --- 1. Définition des valeurs de secours (Fallback) ---
// La valeur du Customizer sert de secours pour la page d'accueil ou les archives.
$customizer_title = get_theme_mod( 'banner_main_title', get_bloginfo('name') );

// --- 2. Détermination du Titre (La logique clé !) ---

$final_title = '';

if ( is_singular() ) {
    // CAS 1 : C'est une page, un article, un CPT. On utilise le titre saisi dans l'éditeur.
    $final_title = get_the_title();

} elseif ( is_archive() || is_search() ) {
    // CAS 2 : Pages d'Archives (Catégories, Tags, etc.)
    $final_title = get_the_archive_title();
    
} elseif ( is_front_page() && is_home() ) {
    // CAS 3 : La page d'accueil (utilise le Customizer)
    $final_title = $customizer_title;

} else {
    // CAS 4 : Par défaut, utilise le Customizer
    $final_title = $customizer_title;
}


// Nettoyage final pour s'assurer que le titre n'est jamais vide
if ( empty($final_title) ) {
    $final_title = $customizer_title;
}

// On retire $args car il n'est plus utilisé pour surcharger le titre.
?>

<div class="banner">
    <div class="container">
        <p><?php echo esc_html($final_title); ?></p> 
    </div>
</div>