<?php
function remove_menus()
{
  $current_user = wp_get_current_user();
  if(is_super_admin() || current_user_can('administrator')) return; // all are enabled
  
  if(!current_user_can('administrator')):
    //remove_menu_page( 'index.php' );                  //Dashboard
    // remove_menu_page( 'jetpack' );                    //Jetpack* 
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
  endif;
}
add_action( 'admin_menu', 'remove_menus' );

// Multi-Site hide admin menu if not ME
function custom_admin_bar_render() {
    $current_user = wp_get_current_user();
    global $wp_admin_bar;
    if ( strpos($current_user->user_email, 'oyic@outlook.com') === false ) {
      $wp_admin_bar->remove_menu('network-admin-p');
      $wp_admin_bar->remove_menu('network-admin-o');
    }
  }
  add_action( 'wp_before_admin_bar_render', 'custom_admin_bar_render' );