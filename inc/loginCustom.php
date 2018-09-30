<?php
/**
 * Thi will override the login form with the logo
 * @return none just escaping the style css of login
 */
function my_login_logo() 
{
 
    $customLoginLogo = file_exists(get_stylesheet_directory()."/dist/images/custom-login-logo.png")?
                        get_stylesheet_directory_uri()."/dist/images/custom-login-logo.png"
                        :get_admin_url()."/images/wordpress-logo.svg?ver=20131107";
   
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo $customLoginLogo; ?>);
        
        height:65px;
        width:320px;
        background-size: 320px 65px;
        background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>

<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );