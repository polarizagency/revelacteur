<?php
/**
 * Composant : Bannière Hero
 *
 * Paramètres (variables) attendus :
 * - $title (string) : Titre principal de la bannière.
 * - $subtitle (string) : Sous-titre.
 */
$title    = $args['title'] ?? get_bloginfo('name');


// Assurez-vous que les variables sont définies pour éviter les erreurs
$title    = $title ?? get_bloginfo('name');
$subtitle = $subtitle ?? '';
?>

<div class="banner">
    <div class="container">
        <p><?php echo esc_html($title); ?></p>
        
    </div>
</div>