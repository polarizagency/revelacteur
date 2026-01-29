<?php
/**
 * Composant : Bannière Hero
 */
$banner_p1 = get_theme_mod( 'banner_text_1', 'Révél\'acteur donne aux jeunes' );
$banner_p2 = get_theme_mod( 'banner_text_2', 'Le pouvoir d\'agir et de créer' );
$banner_p3 = get_theme_mod( 'banner_text_3', 'Une association engagée à Beuvry depuis 2006 pour<br>la jeunesse, la culture et la transmission.' );
?>

<div class="banner">
    <div class="container">
        <?php if ( $banner_p1 ) : ?>
            <p class="accueil-p-1"><?php echo esc_html( $banner_p1 ); ?></p>
             <?php endif; ?>

        <?php if ( $banner_p2 ) : ?>
            <p class="accueil-p-2"><?php echo esc_html( $banner_p2 ); ?></p>
        <?php endif; ?>

        <?php if ( $banner_p3 ) : ?>
            <p class="accueil-p-3"><?php echo wp_kses_post( $banner_p3 ); ?></p>
        <?php endif; ?>

        <a class="btn-primary" href="/revelacteur/association">En savoir plus</a>
    </div>

</div>