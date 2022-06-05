<?php
    $security_settings = get_option('sp_security_settings') ?: [];
    if ( !in_array('substitute_login', $security_settings) ) wp_redirect( home_url() );
    switch ( get_option('sp_login_redirect') ) {
        case 'home' :
            $redirect_url = home_url();
            break;
        case 'custom' :
            $redirect_url = get_option('sp_custom_redirect');
            break;
        case 'admin' :
        default:
            $redirect_url = admin_url();
            break;
    }
    if ( is_user_logged_in() ) wp_redirect( $redirect_url );
    
    wp_head();
?>

<main class="login-sub-page">
    <h1><?php the_title(); ?></h1>
    <form class="login" id="loginform">
        <p id="login-loading-message"></p>
        <label for="username">
            Username<br>
            <input id="username" type="text" name="username">
        </label>
        <label for="password">
            Password<br>
            <input id="password" type="password" name="password">
        </label>
        <button id="login-button" data-nonce="<?php echo wp_create_nonce("substitute-login-nonce"); ?>">Login</button>
        <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
    </form>
</main>

<?php
    wp_footer();
?>