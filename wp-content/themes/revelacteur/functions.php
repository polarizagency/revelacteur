<?php
/**
 * Fichier des fonctions du thème personnalisé.
 *
 * Ce fichier est le "cerveau" du thème. Il gère l'inclusion des styles,
 * des scripts, l'enregistrement des menus, des supports de thème, etc.
 */

// -------------------------------------------------------------------------
// 1. DÉCLARATION DU SETUP DE BASE DU THÈME
// -------------------------------------------------------------------------

if ( ! function_exists( 'revelacteur_setup' ) ) {
	/**
	 * Configure les fonctionnalités de base du thème.
	 */
	function revelacteur_setup() {

		// Ajoute la prise en charge des images à la une (vignettes)
		add_theme_support( 'post-thumbnails' );

		// Ajoute la prise en charge des titres de page gérés par WordPress (pour le SEO)
		add_theme_support( 'title-tag' );

		// Active le support du HTML5 pour les formulaires de recherche, commentaires, etc.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		// Enregistrement des menus de navigation
		register_nav_menus( array(
			'menu-principal' => esc_html__( 'Menu Principal', 'revelacteur' ),
			'menu-footer'    => esc_html__( 'Menu Pied de Page', 'revelacteur' ),
		) );

		// Définir la taille par défaut pour l'affichage de contenu (par exemple, pour les embeds)
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}
	}
}
add_action( 'after_setup_theme', 'revelacteur_setup' );


// -------------------------------------------------------------------------
// 2. ENQUEUE (INCLUSION) DES SCRIPTS ET STYLES
// -------------------------------------------------------------------------

/**
 * Enqueue les scripts et styles pour le front-end.
 */
function revelacteur_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Inclure la feuille de style principale (style.css est souvent inclus par défaut, mais c'est une bonne pratique de l'ajouter ici)
	wp_enqueue_style( 'revelacteur-style', get_stylesheet_uri(), array(), $theme_version );

	// Si vous avez un fichier CSS séparé (par exemple, dans un dossier assets/css)
	// wp_enqueue_style( 'revelacteur-main', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version );

	// Inclure un script JavaScript principal
	wp_enqueue_script( 'revelacteur-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme_version, true );
    // Le 'true' à la fin indique que le script doit être chargé dans le footer (meilleure performance)          
}
add_action( 'wp_enqueue_scripts', 'revelacteur_scripts' );


// -------------------------------------------------------------------------
// 3. ENREGISTREMENT DES ZONES DE WIDGETS (Sidebars)
// -------------------------------------------------------------------------

/**
 * Enregistre les zones de widgets (sidebars).
 */
function revelacteur_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Principale', 'revelacteur' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Ajoutez des widgets ici pour la sidebar principale.', 'revelacteur' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    // Vous pouvez en enregistrer d'autres, par exemple pour le pied de page :
    /*
    register_sidebar( array(
		'name'          => esc_html__( 'Pied de Page Colonne 1', 'revelacteur' ),
		'id'            => 'footer-1',
        // ... autres arguments ...
	) );
    */
}
add_action( 'widgets_init', 'revelacteur_widgets_init' );

// -------------------------------------------------------------------------
// 4. INCLUSION DE FICHIERS DE FONCTIONS SUPPLÉMENTAIRES (Optionnel)
// -------------------------------------------------------------------------

/**
 * Inclut d'autres fichiers de fonctions pour structurer le code.
 */
// Par exemple, pour les fonctions relatives aux Custom Post Types :
// require get_template_directory() . '/inc/cpt-functions.php';
// Pour les fonctions de nettoyage :
// require get_template_directory() . '/inc/cleanup.php';