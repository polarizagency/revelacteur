<?php
/**
 * Footer template : Bandeau Violet + Contact Blanc + Infos Vertes
 */
?>

</main>
<footer class="site-footer-wrapper">

    <section class="footer-adventure-section">
        <div class="container">
            <?php
            $adv_title = get_theme_mod('footer_adventure_title', 'Participez à l\'aventure !');
            $adv_text = get_theme_mod('footer_adventure_text', 'Pour transformer ce rêve en réalité, nous avons besoin de soutiens financiers et humains.');
            // On réutilise le lien "Faire un don" défini précédemment ou on en crée un
            $donate_text = get_theme_mod('footer_donate_btn_text', 'Faire un don');
            $donate_url = get_theme_mod('footer_donate_btn_url', '#');
            ?>

            <h2 class="adventure-title">
                <?php echo esc_html($adv_title); ?>
            </h2>
            <p class="adventure-text">
                <?php echo nl2br(esc_html($adv_text)); ?>
            </p>

            <div class="adventure-cta">
                <a href="<?php echo esc_url($donate_url); ?>" class="btn btn-secondary">
                    <?php echo esc_html($donate_text); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="footer-contact-section">

        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_jaune.svg" alt=""
            class="decoration-jaune">

        <div class="container flex-container">

            <div class="contact-left">
                <?php
                $cta_title = get_theme_mod('footer_cta_title', 'Envie de nous Contacter ?');
                $contact_btn_text = get_theme_mod('footer_contact_btn_text', 'Nous Contacter');
                $contact_btn_url = get_theme_mod('footer_contact_btn_url', '#');
                ?>
                <h2 class="contact-title"><?php echo nl2br(esc_html($cta_title)); ?></h2>
                <a href="<?php echo esc_url($contact_btn_url); ?>" class="btn btn-primary">
                    <?php echo esc_html($contact_btn_text); ?>
                </a>
            </div>

            <div class="contact-right">
                <?php
                $instagram_url = get_theme_mod('social_instagram_url');
                $facebook_url = get_theme_mod('social_facebook_url');
                $youtube_url = get_theme_mod('social_youtube_url');
                $linkedin_url = get_theme_mod('social_linkedin_url');
                $twitch_url = get_theme_mod('social_twitch_url');
                $spotify_url = get_theme_mod('social_spotify_url'); // Au cas où tu ajoutes Spotify
                ?>

                <ul class="social-icons purple-icons">
                    <?php if ($instagram_url): ?>
                        <li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-instagram"></span></a></li><?php endif; ?>
                    <?php if ($linkedin_url): ?>
                        <li><a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-linkedin"></span></a></li><?php endif; ?>
                    <?php if ($youtube_url): ?>
                        <li><a href="<?php echo esc_url($youtube_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-youtube"></span></a></li><?php endif; ?>
                    <?php if ($facebook_url): ?>
                        <li><a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-facebook"></span></a></li><?php endif; ?>
                    <?php if ($twitch_url): ?>
                        <li><a href="<?php echo esc_url($twitch_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-twitch"></span></a></li><?php endif; ?>
                    <?php if (isset($spotify_url) && $spotify_url): ?>
                        <li><a href="<?php echo esc_url($spotify_url); ?>" target="_blank"><span
                                    class="dashicons dashicons-format-audio"></span></a></li><?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="footer-main-section">
        <div class="container">
            <div class="footer-row-top">

                <div class="footer-logo">
                    <?php if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } ?>
                </div>

                <nav class="footer-nav-horizontal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-footer',
                        'container' => false,
                        'menu_class' => 'menu-horizontal-list', // Classe CSS spécifique pour flexrow
                        'depth' => 1,
                    ));
                    ?>
                </nav>

                <div class="footer-btn-right">
                    <a href="<?php echo esc_url($donate_url); ?>" class="btn btn-primary">
                        <?php echo esc_html($donate_text); ?>
                    </a>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved</p>
            </div>
        </div>
    </section>

</footer>

</div><?php wp_footer(); ?>
</body>

</html>