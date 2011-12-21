function toggleEditor(id,txt) {

	(txt.text()=='Switch To Html')?txt.text('Switch To Editor'):txt.text('Switch To Html');
	tinymce.execCommand('mceToggleEditor',false, id);
	//(!tinyMCE.getInstanceById(id))?tinyMCE.execCommand('mceAddControl', false, id):tinyMCE.execCommand('mceRemoveControl', false, id);
}

function addtotiny(theText,EditorId) {
	tinyMCE.execInstanceCommand(EditorId,'mceReplaceContent',false,theText); 
}