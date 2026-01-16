<?php
/**
 * Composant : Bannière Hero
 */
$banner_p1 = get_theme_mod( 'banner_text_1', 'Révél\'acteur donne aux jeunes' );
$banner_p2 = get_theme_mod( 'banner_text_2', 'Le pouvoir d\'agir et de créer' );
?>

<div class="banner">
    <div class="container">
        <?php if ( $banner_p1 ) : ?>
            <p class="accueil-p-1"><?php echo esc_html( $banner_p1 ); ?></p>
             <?php endif; ?>

        <?php if ( $banner_p2 ) : ?>
            <p class="accueil-p-2"><?php echo esc_html( $banner_p2 ); ?></p>
        <?php endif; ?>
    </div>

</div>