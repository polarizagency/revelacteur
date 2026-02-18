<?php
/**
 * Template Name: Single Projet
 */
get_header(); ?>

<div id="primary" class="content-area project-single-custom">
    <main id="main" class="site-main">

        <?php while (have_posts()):
            the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if (has_post_thumbnail()): ?>
                    <div class="project-hero">
                        <?php the_post_thumbnail('full'); // Utilisation de 'full' pour éviter la pixelisation ?>

                        <?php
                        // Affichage du statut du projet
                        $project_status = get_post_meta(get_the_ID(), '_project_status', true);
                        $status_labels = array(
                            'en-cours' => 'En cours',
                            'termine' => 'Terminé',
                            'en-pause' => 'En pause',
                            'a-venir' => 'À venir'
                        );

                        if ($project_status && isset($status_labels[$project_status])): ?>
                            <span class="project-status-badge status-<?php echo esc_attr($project_status); ?>">
                                <?php echo esc_html($status_labels[$project_status]); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <header class="project-header-purple">

                    <div class="page-hero-projet"></div>
                    <h1 class=" page-title page-hero-projet__title"><?php the_title(); ?></h1>


    </div>

    <div class="project-meta">
        <span class="meta-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-tag.svg" alt="">
            <?php
            $terms = get_the_terms(get_the_ID(), 'categorie_projet');
            if ($terms) {
                echo esc_html($terms[0]->name);
            }
            ?>
        </span>
        <span class="meta-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-cal.svg" alt="">
            <?php echo get_the_date('Y'); ?>
        </span>
    </div>

    </header>

    <div class="container content-wrapper">

        <section class="project-section">
            <h2 class="section-title">Présentation du projet</h2>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </section>

        <div class="project-mid-images">
        </div>

        <section class="project-section">
            <h2 class="section-title">Objectifs</h2>
            <div class="objectives-list">
                <?php
                // Ici, on affiche le contenu si tu as créé un champ spécifique 
                // ou simplement une liste à puces dans l'éditeur
                ?>
                <ul>
                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</li>
                    <li>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</li>
                    <li>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</li>
                </ul>
            </div>
        </section>

        <section class="project-conclusion-card">
            <div class="conclusion-inner">
                <h3>Conclusion</h3>
                <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores
                    alias consequatur aut perferendis doloribus asperiores repellat.</p>
            </div>
        </section>

        <section class="project-section">
            <h2 class="section-title">Galerie photos</h2>
            <div class="project-gallery-grid">
                <?php
                // Si tu utilises un bloc Galerie Gutenberg, il apparaîtra ici via the_content
                // Sinon, tu peux insérer un shortcode de galerie ici
                ?>
            </div>
        </section>



    </div>


    </article>

<?php endwhile; ?>

</main>
</div>

<?php get_footer(); ?>