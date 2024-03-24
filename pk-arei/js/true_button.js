(function() {
    tinymce.PluginManager.add('custom_button', function( editor, url ) {
        editor.addButton('custom_button', {
            text: '[button]',
            title: 'Insert button shortcode',
            icon: false,
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Set button options',
                    body: [
                        {
                            type: 'textbox',
                            name: 'color',
                            label: 'Button color',
                            value: '#5393d0'
                        },
                        {
                            type: 'textbox',
                            name: 'icon',
                            label: 'Button icon',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'text',
                            label: 'Button text',
                            value: 'button'
                        },
                        {
                            type: 'textbox',
                            name: 'url',
                            label: 'Button url',
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'target',
                            label: 'Button target',
                            value: ''
                        },
                    ],
                    onsubmit: function( e ) { // это будет происходить после заполнения полей и нажатии кнопки отправки
                        editor.insertContent( '[button color="'+ e.data.color +'" icon="' + e.data.icon + '" text="' + e.data.text + '" url="' + e.data.url + '" target="' + e.data.target + '"]');
                    }
                });
            }
        });
    });
})();