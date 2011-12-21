/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.toolbar = 'Full';
	 
	config.toolbar_Full =
	[
		{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
	];
	 
	config.toolbar_Basic =
	[
		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
	];
	
	config.toolbar_FormBuilder =
	[
		{ name: 'document', items : [ 'Source' ] },
		{ name: 'basicstyles', items : ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList','-','Outdent','Indent', '-', 'Link', 'Unlink'] },
		{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
		{ name: 'tools', items : [ 'Maximize' ] }
	];
	
	
   config.filebrowserBrowseUrl = '/js/tiny_mce/plugins/kcfinder-2.51/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/js/tiny_mce/plugins/kcfinder-2.51/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/js/tiny_mce/plugins/kcfinder-2.51/browse.php?type=flash';
   config.filebrowserUploadUrl = '/js/tiny_mce/plugins/kcfinder-2.51/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/js/tiny_mce/plugins/kcfinder-2.51/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/js/tiny_mce/plugins/kcfinder-2.51/upload.php?type=flash';
};
