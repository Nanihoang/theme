<?php
/**
 * Header Template for modern hotel theme
 * @package myhoteltheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<style>
	a {
  text-decoration: none;
}
	</style>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <header id="masthead" class="site-header bg-white shadow-sm sticky-top">
    <div class="container py-2">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand fw-semibold text-primary" href="<?php echo esc_url(home_url('/')); ?>">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          } else {
            bloginfo('name');
          }
          ?>
        </a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'myhoteltheme'); ?>">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Main Menu -->
        <div class="collapse navbar-collapse justify-content-end align-items-center" id="mainNav">
          <?php
          if ( class_exists( 'Bootstrap_Navwalker' ) ) {
            wp_nav_menu([
              'theme_location' => 'primary',
              'depth'          => 2,
              'container'      => false,
              'menu_class'     => 'navbar-nav mb-2 mb-lg-0 gap-3',
              //'fallback_cb'    => '__return_false',
              //'walker'         => new Bootstrap_Navwalker(),
            ]);
          } else {
            echo '<!-- ⚠ Navwalker class not found. Please check functions.php include -->';
          }
          ?>
          <!-- Đặt phòng Button -->
          <a href="<?php echo esc_url(site_url('/dat-phong')); ?>" class="btn btn-primary ms-lg-4 mt-2 mt-lg-0">
            Đặt phòng
          </a>
        </div>
      </nav>
    </div>
  </header>
