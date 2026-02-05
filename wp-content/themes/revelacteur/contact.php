<?php
/*  
Template Name: Page Contact
*/

get_header(); ?>

<section class="contact-form-section">
    <div class="contact-form-wrapper">
        <h1 class="contact-form-title">Informations de contact</h1>
        <p class="contact-form-subtitle">Remplissez le formulaire ci-dessous, nous vous répondrons dans les meilleurs
            délais.</p>

        <form class="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="submit_association_contact">

            <?php wp_nonce_field('asso_contact_form', 'asso_contact_nonce'); ?>

            <div class="contact-form-grid">
                <div class="contact-form-field">
                    <label for="user_last_name">Nom *</label>
                    <input type="text" name="user_last_name" id="user_last_name" placeholder="Nom" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_first_name">Prénom *</label>
                    <input type="text" name="user_first_name" id="user_first_name" placeholder="Prénom" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_phone">Téléphone *</label>
                    <input type="tel" name="user_phone" id="user_phone" placeholder="+33 0 00 00 00 00" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_email">Email *</label>
                    <input type="email" name="user_email" id="user_email" placeholder="Email" required>
                </div>

                <div class="contact-form-field">
                    <label for="user_email_confirm">Confirmation Email *</label>
                    <input type="email" name="user_email_confirm" id="user_email_confirm" placeholder="Email" required>
                </div>
            </div>

            <div class="contact-form-field contact-form-field--full">
                <label for="user_message">Votre message *</label>
                <textarea name="user_message" id="user_message" required></textarea>
            </div>

            <button class="contact-form-submit" type="submit">Envoyer</button>
        </form>
    </div>
</section>

<?php
get_footer(); // Inclut le contenu de footer.php
?>