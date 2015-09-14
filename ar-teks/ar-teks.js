(function() {
    tinymce.create('tinymce.plugins.ary', {
        init : function(ed, url) {
            ed.addButton('arteks', {
                title : 'Teks Arab',
                cmd : 'arteks',
                image : url + '/ar-teks-icon.png'
            });
 
            ed.addCommand('arteks', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<span class="arabic-text">' + selected_text + '</span>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'ary', tinymce.plugins.ary );
})();