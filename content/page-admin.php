<header class="wrap">
    <h1 class="wp-heading-inline">Starter Pack Options</h1>
    <p><em>Jumpstart devving on any WordPress site with these starter functions.</em></p>
    <hr>
</header>
<main>
    <nav class="nav-tab-wrapper">
        <a id="utilities-link" class="nav-tab nav-tab-active">Utilities</a>
        <a id="security-link" class="nav-tab">Security</a>
        <a id="enqueues-link" class="nav-tab">Enqueues</a>
        <a id="mime-types-link" class="nav-tab">Allowed Mime Types</a>
        <a id="code-snippets-link" class="nav-tab">Common Code Snippets</a>
    </nav>
    <div class="admin-content-wrapper">
        <section id="utilities" class="sp-settings-panel">
            <?php require_once 'utilities.php'; ?>
        </section>
        
        <section id="security" class="sp-settings-panel">
            <?php require_once 'security.php'; ?>
        </section>
        
        <section id="enqueues" class="sp-settings-panel">
            <?php require_once 'enqueues.php'; ?>
        </section>
        
        <section id="mime-types" class="sp-settings-panel">
            <?php require_once 'mime-types.php'; ?>
        </section>
        
        <section id="code-snippets" class="sp-settings-panel">
            <?php require_once 'code-snippets.php'; ?>
        </section>
    </div>
</main>