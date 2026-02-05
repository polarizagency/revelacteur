<?php
/*  
Template Name: Page Contact
*/

get_header(); ?>
<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
    <input type="hidden" name="action" value="submit_association_contact">

    <?php wp_nonce_field('asso_contact_form', 'asso_contact_nonce'); ?>

    <label for="user_name">Nom / Prénom</label>
    <input type="text" name="user_name" id="user_name" required>

    <label for="user_email">Votre Email</label>
    <input type="email" name="user_email" id="user_email" required>

    <label for="user_message">Votre message</label>
    <textarea name="user_message" id="user_message" required></textarea>

    <button type="submit">Envoyer le message</button>
</form>

<?php
get_footer(); // Inclut le contenu de footer.php
?>