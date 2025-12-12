<?php
/**
 * Fichier des fonctions du thème personnalisé.
 *
 * Ce fichier est le "cerveau" du thème. Il gère l'inclusion des styles,
 * des scripts, l'enregistrement des menus, des supports de thème, etc.
 */

// -------------------------------------------------------------------------
// 1. DÉCLARATION DU SETUP DE BASE DU THÈME
// --------------------------------------------------------------<-----------

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

	
		add_theme_support( 'custom-logo', array(
		'height'      => 200, // Hauteur par défaut (ajustez selon vos besoins)
		'width'       => 400,  // Largeur par défaut (ajustez selon vos besoins)
		'flex-height' => true, 
		'flex-width'  => true,
	) );
		// Enregistrement des menus de navigation
		register_nav_menus( array(
			'menu_principal' => esc_html__( 'Menu Principal', 'revelacteur' ),
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

	wp_enqueue_style( 'google-fonts-montserrat', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap', array(), null );

	wp_enqueue_style( 'revelacteur-style', 
        get_template_directory_uri() . '/assets/css/style.css', 
        array('google-fonts-montserrat'), // Dépendance ajoutée pour s'assurer que Montserrat est chargée en premier
        $theme_version 
    );

    wp_enqueue_style( 'dashicons' );


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

/**
 * Enregistre les contrôles de couleurs dans l'API du Personnalisateur.
 * * @param WP_Customize_Manager $wp_customize Instance du gestionnaire de personnalisation.
 */
function revelacteur_couleurs_customize_register( $wp_customize ) {

    // 1. AJOUTER UNE NOUVELLE SECTION pour organiser les options
    $wp_customize->add_section( 'revelacteur_couleurs_section', array(
        'title'      => esc_html__( 'Couleurs du Thème', 'revelacteur' ),
        'priority'   => 30, // Position dans le menu du Personnalisateur
    ) );

    // 2. AJOUTER UN NOUVEAU PARAMÈTRE (Setting) pour stocker la valeur
    // Cette valeur sera stockée dans la base de données
    $wp_customize->add_setting( 'revelacteur_couleur_principale', array(
        'default'   => '#9168f3', // Couleur par défaut
        'transport' => 'refresh', // 'refresh' ou 'postMessage' pour un aperçu instantané
        'sanitize_callback' => 'sanitize_hex_color', // Fonction pour valider la couleur (important pour la sécurité)
    ) );

    // 3. AJOUTER UN NOUVEAU CONTRÔLE (Control) pour l'interface utilisateur
    // Nous utilisons le contrôle standard 'WP_Customize_Color_Control' pour le sélecteur de couleurs
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'revelacteur_couleur_principale', array(
        'label'    => esc_html__( 'Couleur Principale', 'revelacteur' ),
        'section'  => 'revelacteur_couleurs_section', // Référence la section créée ci-dessus
        'settings' => 'revelacteur_couleur_principale',
    ) ) );

	$wp_customize->add_setting( 'revelacteur_couleur_secondaire', array(
        'default'   => '#BDFF5F', 
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'revelacteur_couleur_secondaire', array(
        'label'    => esc_html__( 'Couleur Secondaire (Accents)', 'revelacteur' ),
        'section'  => 'revelacteur_couleurs_section',
        'settings' => 'revelacteur_couleur_secondaire',
    ) ) );
}
add_action( 'customize_register', 'revelacteur_couleurs_customize_register' );


/**
 * Génère le CSS dynamique à partir des options du Personnalisateur.
 */
function revelacteur_customizer_css() {
    
    // Récupère la valeur stockée dans la base de données
    $main_color = get_theme_mod( 'revelacteur_couleur_principale', '#0073AA' );
	$secondary_color = get_theme_mod( 'revelacteur_couleur_secondaire', '#BDFF5F' ); 
	
    // Construit le bloc de style CSS
    $css = "
        :root {
            --color-primary: {$main_color};
            --color-secondary: {$secondary_color};
            /* Vous pouvez ajouter d'autres variables ici */
        }


        a {
            color: {$main_color};
        }
        
        /* Couleur de fond des boutons principaux */
        .btn-primary {
            background-color: {$main_color};
            border-color: {$main_color};
			color: white;
        }

        .btn-secondary {
            background-color: {$secondary_color};
            border-color: {$secondary_color};
            color: white;
        }
		/* COULEUR SECONDAIRE */
        .widget-title { color: {$secondary_color}; } /* Exemple pour les titres de widgets */
        .highlight { background-color: {$secondary_color}; }

	/* POLICES STATIQUES -  */
        body, p, ul, ol, li, a {
            font-family: 'Montserrat', sans-serif; /* POLICE DE BASE */
        }
        
        h1, h2, h3, h4, h5, h6, .site-title {
            font-family: 'RedsAglonema', cursive; /* POLICE DES TITRES */
        }
    ";

	
    
    // Injecte le CSS dans l'en-tête du site
    wp_add_inline_style( 'revelacteur-style', $css );
}
add_action( 'wp_enqueue_scripts', 'revelacteur_customizer_css' );

  
function revelacteur_header_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'revelacteur_header_options_section', array(
        'title'      => esc_html__( 'Options de l\'En-tête', 'revelacteur' ), 
        'priority'   => 20, // (Position plus haute que les couleurs)
    ) );

 $wp_customize->add_setting( 'header_cta_text', array(
    'default'   => esc_html__( 'Contactez-nous', 'revelacteur' ),
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',
) );

// AJOUTER UN CONTRÔLE (champ texte)
$wp_customize->add_control( 'header_cta_text', array(
    'label'    => esc_html__( 'Texte du Bouton CTA', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'text',
) );

// AJOUTER UN PARAMÈTRE pour l'URL du bouton
$wp_customize->add_setting( 'header_cta_url', array(
    'default'   => '#', // URL par défaut
    'transport' => 'refresh',
    // La fonction sanitize_url() est la meilleure pour vérifier une URL
    'sanitize_callback' => 'esc_url_raw', 
) );

// AJOUTER UN CONTRÔLE (champ URL)
$wp_customize->add_control( 'header_cta_url', array(
    'label'    => esc_html__( 'Lien du Bouton CTA', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    // Le type 'url' peut donner des outils de validation dans certains thèmes
    'type'     => 'url', 
) );


// --- Instagram URL ---
$wp_customize->add_setting( 'social_instagram_url', array(
    'default'   => '', // Laisser vide par défaut
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw', 
) );
$wp_customize->add_control( 'social_instagram_url', array(
    'label'    => esc_html__( 'Lien Instagram', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'url', 
) );

$wp_customize->add_setting( 'social_facebook_url', array(
    'default'   => '', // Laisser vide par défaut
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw', 
) );
$wp_customize->add_control( 'social_facebook_url', array(
    'label'    => esc_html__( 'Lien Facebook', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'url', 
) );

$wp_customize->add_setting( 'social_youtube_url', array(
    'default'   => '', // Laisser vide par défaut
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw', 
) );
$wp_customize->add_control( 'social_youtube_url', array(
    'label'    => esc_html__( 'Lien YouTube', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'url', 
) );

$wp_customize->add_setting( 'social_linkedin_url', array(
    'default'   => '', // Laisser vide par défaut
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw', 
) );
$wp_customize->add_control( 'social_linkedin_url', array(
        'label'    => esc_html__( 'Lien LinkedIn', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'url', 
) );
$wp_customize->add_setting( 'social_twitch_url', array(
    'default'   => '', // Laisser vide par défaut
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw', 
) );
$wp_customize->add_control( 'social_twitch_url', array(
        'label'    => esc_html__( 'Lien Twitch', 'revelacteur' ),
    'section'  => 'revelacteur_header_options_section',
    'type'     => 'url', 
) );





}
add_action( 'customize_register', 'revelacteur_header_customize_register' );

