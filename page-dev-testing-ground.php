<?php

if ( !current_user_can( 'activate_plugins' ) ) {
    ?>
        <h1>Access Denied</h1>
        <p>The Dev Testing Ground page is only available to site administrators</p>
    <?php
    exit;
}

wp_head();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 
        the_title();
        the_content();
    }
}

// Insert any code to be tested here

wp_footer();

?>