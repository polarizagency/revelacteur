<?php
/**
 * Composant : Bannière Hero
 *
 * Paramètres (variables) attendus :
 * - $title (string) : Titre principal de la bannière.
 * - $subtitle (string) : Sous-titre.
 */
$customizer_title = get_theme_mod( 'banner_main_title', get_bloginfo('name') );
$args = $args ?? [];


$final_title = $args['title'] ?? $customizer_title;

?>

<div class="banner">
    <div class="container">
        
        <p><?php echo esc_html($final_title); ?></p> 
        
        
    </div>
</div>