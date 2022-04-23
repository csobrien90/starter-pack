<?php
    $security_settings = get_option('sp_security_settings') ?: [];
    if ( !in_array('substitute_login', $security_settings) ) wp_safe_redirect( home_url() );
    
    wp_head();
?>

<form>
    <h1>Login</h1>
    <p id="login-loading-message"></p>
    <label for="username">
        Username
        <input id="username" type="text" name="username">
    </label>
    <label for="password">
        Password
        <input id="password" type="password" name="password">
    </label>
    <button id="login-button" data-nonce="<?php echo wp_create_nonce("substitute-login-nonce"); ?>">Login</button>
    <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
</form>

<?php
    wp_footer();
?>