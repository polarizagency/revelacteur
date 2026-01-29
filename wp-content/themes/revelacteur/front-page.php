<?php
/**
 * Template Name: Page d'Accueil Personnalisée
 *
 * Utilisé pour afficher la page d'accueil d'un site.
 * A la plus haute priorité sur tout autre template d'accueil.
 */

get_header(); // Inclut le contenu de header.php
?>

<main id="primary" class="site-main">

<?php 

get_template_part( 'parts/banner', 'hero', [
    
] );
get_template_part( 'parts/section-home-1', '', [
    
] );
?>

</main><?php
get_footer(); // Inclut le contenu de footer.php
?>