<?php
/*  
Template Name: Page Contact
*/

get_header();

$contact_status = isset($_GET['contact_status']) ? sanitize_key(wp_unslash($_GET['contact_status'])) : '';
$contact_notices = array(
    'success' => array(
        'type' => 'success',
        'message' => 'Votre message a bien ete envoyé. Nous vous répondrons rapidement.',
    ),
    'email_mismatch' => array(
        'type' => 'error',
        'message' => 'Les adresses e-mail ne correspondent pas. Merci de verifier puis de renvoyer le formulaire.',
    ),
    'nonce_error' => array(
        'type' => 'error',
        'message' => 'La session du formulaire a expiré. Merci de reessayer.',
    ),
    'send_error' => array(
        'type' => 'error',
        'message' => 'Une erreur est survenue lors de l\'envoi. Merci de réessayer dans quelques instants.',
    ),
);
$contact_notice = isset($contact_notices[$contact_status]) ? $contact_notices[$contact_status] : null;
?>
<div class="page-hero mbottom-banniere">
    <h1 class="page-title page-hero__title">Nous Contacter</h1>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme_verte.svg" alt=""
        class="decoration-verte page-hero__shape" />
</div>

<section class="contact-form-section">
    <div class="contact-form-wrapper">
        <h1 class="contact-form-title">Informations de contact</h1>
        <p class="contact-form-subtitle"><strong>Remplissez</strong> le formulaire ci-dessous, nous vous répondrons dans
            les meilleurs
            délais.</p>
        <p class="contact-form-legend"><span class="required"><strong>*</strong></span> Champs obligatoires</p>

        <?php if ($contact_notice): ?>
            <div class="contact-form-notice contact-form-notice--<?php echo esc_attr($contact_notice['type']); ?>"
                role="status" aria-live="polite">
                <?php echo esc_html($contact_notice['message']); ?>
            </div>
        <?php endif; ?>

        <form class="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="submit_association_contact">
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink()); ?>">

            <?php wp_nonce_field('asso_contact_form', 'asso_contact_nonce'); ?>

            <div class="contact-form-grid">
                <div class="contact-form-field">
                    <label for="user_last_name">Nom <span class="required">*</span></label>
                    <input type="text" name="user_last_name" id="user_last_name" placeholder="Nom" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_first_name">Prénom <span class="required">*</span></label>
                    <input type="text" name="user_first_name" id="user_first_name" placeholder="Prénom" required>
                </div>

                <div class="contact-form-field contact-form-field--phone">
                    <label for="user_phone">Téléphone <span class="required">*</span></label>
                    <input type="tel" name="user_phone" id="user_phone" placeholder="+33 0 00 00 00 00" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_email">Email <span class="required">*</span></label>
                    <input type="email" name="user_email" id="user_email" placeholder="Email" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_email_confirm">Confirmation Email <span class="required">*</span></label>
                    <input type="email" name="user_email_confirm" id="user_email_confirm" placeholder="Email" required>
                </div>
            </div>

            <div class="contact-form-field contact-form-field--full">
                <label for="user_message">Votre message <span class="required">*</span></label>
                <textarea name="user_message" id="user_message" required></textarea>
            </div>

            <button class="contact-form-submit" type="submit">Envoyer</button>
        </form>
    </div>
</section>

<?php
get_footer(); // Inclut le contenu de footer.php
?>