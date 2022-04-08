<article class="security-functions">
    <h2>Security functions</h2>
    <ul class="security-functions-list">
        <li class="security-function">
            <h4>force_subscriber_role_on_registration()</h4>
            <p><em>Force all new users to register as the 'subscriber' role.</em></p>
            <p>To create a new admin account, an existing administrator must manually 
                change new user's role. This will prevent poorly secured plugins and 
                third-party libraries from opening your site's administrative capabilities 
                to programmatically created users.
            </p>
        </li>
        <li class="security-function">
            <h4>registration_password_strength()</h4>
            <p><em>Require all new users to register with a sufficiently strong password.</em></p>
            <p>Passwords must be at least eight characters and haveat least one lowercase, uppercase, 
                number, and special character.
            </p>
        </li>
        <li class="security-function">
            <h4>disable_comments()</h4>
            <p><em>Remove all comment functionality</em></p>
        </li>
    </ul>
</article>