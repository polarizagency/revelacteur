<?php
/*
Template Name: Page Médias
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div>
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Nos lives Twitch</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>
            <div class="twitch-embed-container">
                <iframe
                    src="https://player.twitch.tv/?channel=revelacteur62&parent=<?php echo $_SERVER['SERVER_NAME']; ?>"
                    height="480" width="720" allowfullscreen>
                </iframe>
            </div>
            <div class="page-hero">
                <h1 class="page-title page-hero__title">Nos podcasts</h1>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
                    class="decoration-verte page-hero__shape" />
            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>