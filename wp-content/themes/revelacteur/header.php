<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Aller au contenu', 'mon-theme-custom' ); ?></a>

        <header id="masthead" class="site-header">
           
        
            <div class="site-branding">
                <?php 
                // Affiche le logo défi ni dans Apparence > Personnaliser
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }

                
                ?>
                
           
                
                <?php $description = get_bloginfo( 'description', 'display' ); ?>
                <?php if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            </div><nav id="site-navigation" class="main-navigation">
                <?php
                // Affiche le menu assigné à l'emplacement 'primary' (défini dans functions.php)
                wp_nav_menu( array(
                    'theme_location' => 'menu_principal',
                    'menu_id'        => 'menu_principal',
                    'container'      => false, // Pas d'élément conteneur autour du <ul>
                ) );
                ?>
            </nav>

            <?php
                $instagram_url = get_theme_mod( 'social_instagram_url' );
                $facebook_url = get_theme_mod( 'social_facebook_url' );
                $youtube_url = get_theme_mod( 'social_youtube_url' );
                $linkedin_url = get_theme_mod( 'social_linkedin_url' );
                $twitch_url = get_theme_mod( 'social_twitch_url' );
               
                ?>

                <ul class="social-icons">
                    <?php if ( $instagram_url ) : ?>
                    <li>
                        <a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" aria-label="Instagram">
                            <span class="dashicons dashicons-instagram"></span> 
                        </a>
                        
                    </li>
                    <?php endif; ?>
                    <?php if ( $linkedin_url ) : ?>
                        <li>
                            <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" aria-label="LinkedIn">
                                <span class="dashicons dashicons-linkedin"></span> 
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( $facebook_url ) : ?>
                    <li>
                         <a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" aria-label="Facebook">
                            <span class="dashicons dashicons-facebook"></span> 
                        </a>
                    </li>
                    <?php endif; ?>
                     <?php if ( $youtube_url ) : ?>
                    <li>
                        <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" aria-label="YouTube">
                            <span class="dashicons dashicons-youtube"></span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                      <?php if ( $twitch_url ) : ?>
                    <li>
                         <a href="<?php echo esc_url( $twitch_url ); ?>" target="_blank" aria-label="Twitch">
                            <span class="dashicons dashicons-twitch"></span> 
                        </a>
                    </li>
                    <?php endif; ?>
                     
                    </ul>
        <?php
// Récupère les valeurs définies dans l'admin
$cta_url = get_theme_mod( 'header_cta_url', '#' ); 
$cta_text = get_theme_mod( 'header_cta_text', 'Contactez-nous' );
?>

        <div class="header-cta">
            <a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn-primary">
                <?php echo esc_html( $cta_text ); ?>
            </a>
        </div>
        
        </header><?php 
// Ceci permet à get_the_title() et is_singular() de fonctionner correctement
// sur les pages simples et les articles.
if ( have_posts() ) : the_post(); 
    // NE PAS inclure the_content() ici !
endif;
?>

<main id="primary" class="site-main">

  
        <div id="content" class="site-content">