<?php
/**
 * The template for displaying the footer
 *
 * @package myhoteltheme
 */
?>

<footer class="site-footer bg-dark text-white pt-5">
  <div class="container">
    <div class="row">
      <!-- Cột 1: Logo + mô tả -->
      <div class="col-md-4 mb-4">
        <?php if (has_custom_logo()) : ?>
          <div class="mb-3"><?php the_custom_logo(); ?></div>
        <?php else : ?>
          <h2 class="site-title text-white"><?php bloginfo('name'); ?></h2>
        <?php endif; ?>
        <p><?php bloginfo('description'); ?></p>
      </div>

      <!-- Cột 2: Menu Footer -->
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase fw-bold">Menu</h5>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'menu_class'     => 'list-unstyled',
          'container'      => false,
        ));
        ?>
      </div>

      <!-- Cột 3: Liên hệ -->
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase fw-bold">Liên hệ</h5>
        <ul class="list-unstyled">
          <li><i class="bi bi-geo-alt-fill me-2"></i>123 Đường ABC, Quận XYZ</li>
          <li><i class="bi bi-telephone-fill me-2"></i>0123 456 789</li>
          <li><i class="bi bi-envelope-fill me-2"></i>info@myhotel.com</li>
        </ul>
      </div>
    </div>

    <!-- Footer dưới cùng -->
    <div class="text-center pt-4 pb-2 border-top border-light mt-4">
      <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
