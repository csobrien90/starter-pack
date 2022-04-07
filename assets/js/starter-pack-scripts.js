function extendContent( trigger, content, direction = 'height', size, callback ) {
    trigger.addEventListener('click', () => {
        switch (direction) {
            case 'height' :
                if (content.style.maxHeight === '0px' ) {
                    content.style.maxHeight = size;
                    if (callback) callback( trigger, content, direction, show );
                } else {
                    content.style.maxHeight = '0px';
                    if (callback) callback( trigger, content, direction, hide );
                }
                break;
            case 'width' :
                if (content.style.maxWidth === '0px' ) {
                    content.style.maxWidth = size;
                    if (callback) callback( trigger, content, direction, show );
                } else {
                    content.style.maxWidth = '0px';
                    if (callback) callback( trigger, content, direction, hide );
                }
                break;
        }
    })
}

var spSettingsPanels = [
    'utilities',
    'security',
    'enqueues',
    'mime-types',
    'code-snippets'
]

spSettingsPanels.forEach(panel => {
    extendContent( document.querySelector(`#${panel}-link`), document.querySelector(`#${panel}`), 'width', '100vw' );
});