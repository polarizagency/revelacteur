<?php
/**
 * Template Part: Project Card Component
 * 
 * Affiche une carte de projet avec image, titre, excerpt et lien.
 * Utilisable partout dans le thème via get_template_part().
 */

// Récupère la première catégorie du post
$categories = get_the_category();
$category_name = $categories ? $categories[0]->name : '';
?>

<article class="project-card">
    
    <div class="card-image">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="card-image__link">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        <?php else : ?>
            <div class="card-image__placeholder"></div> 
        <?php endif; ?>
    </div>

    <div class="card-green-banner"></div>

    <div class="card-content">
        <div class="card-body">
            <h3 class="card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            
            <p class="card-description">
                <?php 
                // Affiche le résumé ou les 20 premiers mots du contenu
                $excerpt = get_the_excerpt();
                echo wp_trim_words( $excerpt, 30, '...' );
                ?>
            </p>
        </div>

        <div class="card-footer">
            <?php if ( $category_name ) : ?>
                <span class="card-badge"><?php echo esc_html( $category_name ); ?></span>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="card-arrow-btn" aria-label="Lire la suite">
                <span class="dashicons dashicons-arrow-right-alt2"></span>
            </a>
        </div>
    </div>

</article>
