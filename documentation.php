<section class="documentation">
    <h2>Documentation</h2>
    <article class="documentation-function-group">
        <h3>Utility functions</h3>
        <ul class="documentation-function-group-list">
            <li class="documentation-function">
                <h4>debug( $var, $die = false )</h4>
                <p><em>Print $var, deciding whether to die after</em></p>
            </li>
            <li class="documentation-function">
                <h4>log_this( $var )</h4>
                <p><em>Log $var to the console as a string or object</em></p>
            </li>
            <li class="documentation-function">
                <h4>deep_search( $search_term, $array_or_object )</h4>
                <p><em>Find first instance of $search_term in any combination of nested arrays and object, then return the path</em></p>
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
            <li class="documentation-function">
                <h4>registration_password_strength()</h4>
                <p><em>Require all new users to register with a sufficiently strong password.</em></p>
                <p>Passwords must be at least eight characters and haveat least one lowercase, uppercase, 
                    number, and special character.
                </p>
            </li>
            <li class="documentation-function">
                <h4>disable_comments()</h4>
                <p><em>Remove all comment functionality</em></p>
            </li>
        </ul>
    </article>
</section>