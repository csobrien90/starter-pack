jQuery(function($) {
    var spSettingsPanels = [
        'utilities',
        'security',
        'enqueues',
        'mime-types',
        'code-snippets'
    ]
    
    spSettingsPanels.forEach(section => {
        $(`#${section}-link`).on('click', function() {
            spSettingsPanels.forEach(panel => {
                if ( panel === section ) {
                    $(`#${panel}`).show();
                } else {
                    $(`#${panel}`).hide();
                }
            });
        });
    })
});