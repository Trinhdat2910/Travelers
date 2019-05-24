/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	
	
	config.language = 'fr';
    // config.uiColor = '#AADC6E';

    
    // config.allowedContent = true;
    config.htmlEncodeOutput = false;
    config.entities = false;
    config.entities_latin = false;
    config.ForceSimpleAmpersand = true;
    config.toolbarCanCollapse = true;
	 // config.language = 'vi';
    config.filebrowserBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=images';
 
  
    config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=flash';
   	config.autoParagraph = false;
   	// config.enterMode = CKEDITOR.ENTER_BR;

};