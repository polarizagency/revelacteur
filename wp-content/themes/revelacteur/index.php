<?php
/**
 * Le modèle principal (Fallback)
 */

get_header(); // Inclut le fichier header.php
?>

<main id="primary" class="site-main">

    <?php
    // Début de la Boucle WordPress
    if ( have_posts() ) :

        while ( have_posts() ) :
            the_post(); // Met en place les données de l'article courant

            // Affiche le contenu de l'article (souvent via get_template_part)
            the_title( '<h1>', '</h1>' );
            the_content();

        endwhile;

    else :
        // Si aucun article n'est trouvé
        echo '<p>Désolé, aucun contenu n\'a été trouvé.</p>';

    endif;
    // Fin de la Boucle WordPress
    ?>

</main><?php
get_sidebar(); // Inclut le fichier sidebar.php (si nécessaire)
get_footer(); // Inclut le fichier footer.php
?>