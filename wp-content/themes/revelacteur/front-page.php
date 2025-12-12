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
$title    = "Bienvenue sur notre site !";


// L'appelant : Passer les variables dans un tableau 'args'
get_template_part( 'parts/banner', 'hero', [
    'title'    => $title,
    
] );
?>

</main><?php
get_footer(); // Inclut le contenu de footer.php
?>