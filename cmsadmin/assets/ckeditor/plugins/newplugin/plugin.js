CKEDITOR.plugins.add('newplugin',
{
    init: function (editor) {
        var pluginName = 'newplugin';
        editor.ui.addButton('Newplugin',
            {
                label: 'Insert Photo Gallery',
                command: 'OpenWindow',
                icon: CKEDITOR.plugins.getPath('newplugin') + 'gallery.jpg'
            });
        var cmd = editor.addCommand('OpenWindow', { exec: showMyDialog });
	
    }
});
function showMyDialog(e) {
  //var paths=window.location.pathname ;
  var currentinstance=CKEDITOR.currentInstance.name;
    window.open("/?ids="+currentinstance, 'MyWindow','width=1020,height=600,scrollbars=yes,scrolling=yes,location=no,toolbar=no');
    
//     var oEditor = CKEDITOR.instances.details;
//     oEditor.insertHtml('Hello');
}