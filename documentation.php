<section class="documentation">
    <h2>Documentation</h2>
    <article class="documentation-function-group">
        <h3>Utiliy functions</h3>
        <ul class="documentation-function-group-list">
            <li class="documentation-function">
                <h4>debug( $var, $die = false )</h4>
                <p><em>Print $var, deciding whether to die after</em></p>
                <code>
                    echo '&ltpre&gt', print_r($var), '&lt/pre&gt';<br>
                    if( $die ) die();
                </code>
            </li>
        </ul>
    </article>
    <article class="documentation-function-group">
        <h3>Security functions</h3>
        <ul class="documentation-function-group-list">
            <li class="documentation-function">
                <h4>force_subscriber_role_on_registration()</h4>
                <p><em>Force all new users to register as the 'subscriber' role.</em></p>
                <p>To create a new admin account, an existing administrator must manually 
                    change new user's role. This will prevent poorly secured plugins and 
                    third-party libraries from opening your site's administrative capabilities 
                    to programmatically created users.
                </p>
            </li>
        </ul>
    </article>
</section>