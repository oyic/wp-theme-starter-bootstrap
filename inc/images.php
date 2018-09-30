<?php 
 /**
  * Update post_thumbnail
  */
 
 // Image sizes
// --------------------------------
add_action('after_setup_theme', function() {
  // Thumbnail
  update_option('thumbnail_size_w', 320);
  update_option('thumbnail_size_h', 9999);
  update_option('thumbnail_crop', 0);

  // Medium
  update_option('medium_size_w', 640);
  update_option('medium_size_h', 9999);
  update_option('medium_crop', 0);

  // Medium large
  update_option('medium_large_size_w', 960);
  update_option('medium_large_size_h', 9999);
  update_option('medium_large_crop', 0);

  // Large
  update_option('large_size_w', 1280);
  update_option('large_size_h', 9999);
  update_option('large_crop', 0);
});

// Print an icon
// --------------------------------
function the_icon($icon, $classes = []) {
  echo get_icon($icon, $classes);
}

function get_icon($icon, $classes = []) {
  $classes_str = isset($classes[0]) ? ' ' . implode(' ', $classes) : '';

  ob_start(); ?>

  <svg class="icon<?= $classes_str; ?>">
    <use xlink:href="#<?= $icon; ?>"></use>
  </svg>

<?php return ob_get_clean();
}