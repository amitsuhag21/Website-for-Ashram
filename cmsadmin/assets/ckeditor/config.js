/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  config.extraPlugins = 'newplugin,youtube';
 // config.extraPlugins = 'embed';
  //config.extraPlugins = 'newplugin';
  config.uiColor = '#daa520'; 
config.youtube_width = '640';
config.youtube_height = '480';
config.youtube_related = true;
config.youtube_older = false;
config.youtube_privacy = false;
config.allowedContent = true;
config.toolbarCanCollapse = true;
   // Define the toolbar buttons you want to have available
   config.toolbar = 'MyToolbar';
   config.toolbar_MyToolbar = 
      [
	 ['Source', 'Bold', 'Italic', 'Underline'],
	 ['Format','Font','FontSize','TextColor', 'BGColor'],
	 ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
         ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'],
	 ['Print', 'SpellChecker', 'Scayt'],
         ['Undo', 'Redo', 'Find', 'Replace'], ['SelectAll', 'RemoveFormat'],
	 ['NumberedList','BulletedList'],
	 ['Link','Unlink','Anchor'],['Table','Smiley','PageBreak'],
	 ['Newplugin', 'Youtube','Preview'],['Iframe', 'Maximize','timestamp']
      ];
};
