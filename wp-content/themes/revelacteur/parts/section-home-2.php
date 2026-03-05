<?php
/**
 * Composant : section home 2 : image + texte
 */
$texte1 = get_theme_mod('texte1', 'Quand les générations se rencontre, les histoires se transmettent.');
$texte2 = get_theme_mod('texte2', 'Adrien tend le micro, le temps ralentit… Face à lui, une mémoire vivante se raconte, partage ses souvenirs, ses expériences, ses émotions.');
$texte3 = get_theme_mod('texte3', 'Un échange précieux où la parole circule, où l’écoute crée du lien et où chaque récit devient une passerelle entre hier et aujourd’hui.');
$texte4 = get_theme_mod('texte4', 'Parce que transmettre, c’est aussi construire demain.');
?>

<section class="home-section-deux">
    <div class="home-section-deux__container">
        <div class="home-section-deux__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/association-image.png"
                alt="Association Révélacteur" class="home-section-deux__image">
        </div>

        <div class="home-section-deux__content">
            <?php if ($texte1): ?>
                <h2 class="home-section-deux__title">
                    <?php echo wp_kses_post($texte1); ?>
                </h2>
            <?php endif; ?>

            <?php if ($texte2): ?>
                <p class="home-section-deux__paragraph">
                    <?php echo wp_kses_post($texte2); ?>
                </p>
            <?php endif; ?>

            <?php if ($texte3): ?>
                <p class="home-section-deux__paragraph">
                    <?php echo wp_kses_post($texte3); ?>
                </p>
            <?php endif; ?>

            <?php if ($texte4): ?>
                <p class="home-section-deux__paragraph">
                    <?php echo wp_kses_post($texte4); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>