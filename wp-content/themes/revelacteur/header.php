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
                // Affiche le logo défini dans Apparence > Personnaliser
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
                ?>
                
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                
                <?php $description = get_bloginfo( 'description', 'display' ); ?>
                <?php if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            </div><nav id="site-navigation" class="main-navigation">
                <?php
                // Affiche le menu assigné à l'emplacement 'primary' (défini dans functions.php)
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false, // Pas d'élément conteneur autour du <ul>
                ) );
                ?>
            </nav></header><div id="content" class="site-content">
        


