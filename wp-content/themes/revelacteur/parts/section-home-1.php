<?php
/**
 * Composant : section home 1 : explication asso 
 */
$texte1 = get_theme_mod( 'texte1', 'Révéler les talents, bâtir <br> l\'avenir' );
$texte2 = get_theme_mod( 'texte2', 'Notre association anime un lieu ouvert à toutes et tous : un espace de culture, de découverte, d\'expression et de convivialité.' );
$texte3 = get_theme_mod( 'texte3', 'Nous facilitons l\'accès à la culture et aux connaissances, encourageons l\'initiative (notamment des jeunes) et soutenons les projets du territoire.' );
$texte4 = get_theme_mod( 'texte4', 'Nous organisons des événements et actions pour la citoyenneté, le vivre-ensemble, la solidarité et la prévention, tout en renforçant le réseau entre associations, institutions et habitants.' );
?>

<section class="home-asso">
    <div class="home-asso__container">
        <div class="home-asso__text">
            <?php if ( $texte1 ) : ?>
                <h2 class="home-asso__title"><?php echo wp_kses_post( $texte1 ); ?></h2>
            <?php endif; ?>

            <?php if ( $texte2 ) : ?>
                <p class="home-asso__paragraph"><?php echo wp_kses_post( $texte2 ); ?></p>
            <?php endif; ?>

            <?php if ( $texte3 ) : ?>
                <p class="home-asso__paragraph"><?php echo wp_kses_post( $texte3 ); ?></p>
            <?php endif; ?>

            <?php if ( $texte4 ) : ?>
                <p class="home-asso__paragraph"><?php echo wp_kses_post( $texte4 ); ?></p>
            <?php endif; ?>
        </div>

        <div class="home-asso__shape" aria-hidden="true">
            <svg class="decoration-verte" viewBox="0 0 641.2556 771.08038" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="presentation" focusable="false">
                <defs>
                    <clipPath clipPathUnits="userSpaceOnUse" id="clipPath1186-1">
                        <path d="M 0,595.276 H 841.89 V 0 H 0 Z" transform="translate(-317.88631,-373.83981)" />
                    </clipPath>
                </defs>
                <g transform="translate(-6436.1606,-3.9340835)">
                    <path d="m 0,0 c -5.727,7.664 -14.635,13.815 -23.582,17.352 -8.946,3.537 -23.195,6.228 -32.154,1.436 -8.96,-4.794 -16.471,-16.173 -18.255,-25.554 -4.448,-23.272 18.475,-18.594 32.722,-13.981 C -27.021,-16.134 -13.032,-8.112 0,0 m -147.027,76.224 c 3.013,9.714 11.83,16.454 20.195,21.645 28.754,17.851 70.708,25.963 104.349,23.848 C 7.615,119.821 52.568,111.26 68.303,82.58 86.455,49.492 55.865,13.61 31.701,-6.677 c 0.789,-3.561 2.108,-6.958 2.91,-10.533 5.261,-23.708 -0.285,-47.915 -11.145,-69.188 l -26.543,-0.116 c 5.689,13.379 12.463,25.977 14.519,40.611 0.853,6.061 1.319,17.223 -0.582,22.99 -0.103,0.32 -0.09,0.577 -0.452,0.782 -18.669,-11.533 -40.532,-23.234 -62.705,-26.079 -44.01,-5.651 -58.18,34.191 -36.834,67.549 15.295,23.912 37.972,30.845 65.329,23.604 16.924,-4.472 32.309,-14.353 43.208,-27.872 8.921,8.074 17.739,16.992 23.776,27.45 17.143,29.692 -6.438,42.956 -32.49,49.671 -42.937,11.059 -92.596,5.882 -129.973,-18.326 L -147,76.237 Z" transform="matrix(1.3333333,0,0,-1.3333333,6758.036,330.72744)" clip-path="url(#clipPath1186-1)" fill="#bdff5f" />
                </g>
            </svg>
        </div>
    </div>
</section>