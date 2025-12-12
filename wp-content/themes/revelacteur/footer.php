</main> 
    
<footer class="site-footer">
    <div class="footerinfos">
        <div class="portfoliofooter">
            <div class="portfoliofooterh1">
                <h1>dbdvdv</h1>
            </div>
            <div class="portfoliofooterp">
               <p>evegfe</p>
            </div>                
        </div>
        <div class="contactfooter">
            <div class="contactfooterh1">
                <h1>Contact</h1>
            </div>
            <div class="contactfooterp">
                <p>revelacteur@gmail.com</p>
                <p>07 65 45 25 12</p>
                <p> France<br>
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
            </div>
        </div>
    </div>
    
    
    <nav class="menu-principalfooter     ">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.</p>
        <nav class="footer-menu">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class' => 'footer-nav-menu',
                'container' => false,
                'fallback_cb' => false 
            )); 
            ?>
        </nav>
    </nav>
</footer>
    
</div>
<?php wp_footer(); ?>
</body>
</html>