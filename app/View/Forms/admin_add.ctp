<style type="text/css">
div.text label, div.textarea label, div.select label, div.checkbox label {
    border-color: #D1DFE1;
    border-style: solid;
    clear: left;
    display: table-cell;
    font-family: arial;
    font-size: 11px;
    font-weight: bold;
    height: 21px;
    line-height: 14px;
    margin-bottom: 10px;
    margin-right: 0;
    margin-top: 0;
    vertical-align: middle;
    width: 200px;
	color:#666666;
}
div.checkbox input {
    clear: right;
    float: left;
    line-height: 17px;
    margin-top: 8px;
}
a{
	outline:none;
}
div.forms form label:after{color:#000;content:"";font-size:1.5em;font-weight:700;padding:2px;}

div#sucessmsg_div, div#fdesign_div, div#response_content_div{
    background-color: #EFEFEF;
    border: 1px solid #E0E0E0;
    padding: 10px;
}
</style>
<a style="float:right;" href="#" onclick="ckeditor_close_0(); closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/forms/add',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>	
	<fieldset>  
		<h3>Form Details</h3>
		
		<div class="form_input">
			<label>Name</label>
			<?php
				echo $this->Form->input('name',array('class'=>'text-input small-input'));
			?>
		</div>
			
		<div class="form_input">
			<label>Keyword</label>
			<?php
				echo $this->Form->input('keyword',array('class'=>'text-input small-input'));
			?>
			<br /><small>This used to embedded form in pages for example: [form-keyword].</small>
		</div>

		<h3><a href="#" onclick="xtoggle('fdesign_div',this);return false;">+</a> Form Design <a href="#" onclick="$('#fdesign').toggle();return false;">?</a></h3>
		<div id="fdesign_div">
		<div id="fdesign" style="display:none;line-height: 16px;background-color: #F4F3E6;border: 1px solid #E0E0E0;color: red;font-size: 12px;margin-bottom: 4px;overflow: auto;padding: 10px;">
			<font color="gray"><b>While designing forms, Please confirm the following.</b></font>
			<p><font color="green">Input field name shoud be of the form "data[fieldname]".<br />For Examples: data[name], data[email], data[first_name] etc.,</font></p>
		</div>
		<?php
		echo $this->Form->input('content',array('class'=>'ckeditor','id'=>'frm_content_0'));
		?>
		</div>
		<h3><a href="#" onclick="xtoggle('sucessmsg_div',this);return false;">+</a> Success Message <a href="#" onclick="$('#sucessmsg').toggle();return false;">?</a></h3>
		<div id="sucessmsg_div">
		<div id="sucessmsg" style="display:none;line-height: 16px;background-color: #F4F3E6;border: 1px solid #E0E0E0;font-size: 12px;margin-bottom: 4px;overflow: auto;padding: 10px;">
			<font color="gray"><b>displays after a form get submitted successfully.</b></font>
		</div>
		<?php
		echo $this->Form->input('successmsg',array('id'=>'successmsg_0','style'=>'width:350px;','label'=>false,'default'=>'Saved Successfully'));
		?>
		</div>
		<h3><a href="#" onclick="xtoggle('response_content_div',this);return false;">+</a> Response Mail <a href="#" onclick="$('#resmail').toggle();return false;">?</a></h3>
		<div id="resmail" style="display:none;line-height: 16px;background-color: #F4F3E6;border: 1px solid #E0E0E0;font-size: 12px;margin-bottom: 4px;overflow: auto;padding: 10px;">
			<font color="gray"><b>This mail will be send to user when a form submitted.</b></font>
		</div>
		<div id="response_content_div">
		<div class="input checkbox">
			<label for="FormResponseEmail">Send Respond Email</label>
			<?php 
			echo $this->Form->input('response_email',array('label'=>false, 'div'=>false, 'value'=>'1'));
			?>
		</div>
		<?php
		
		echo $this->Form->input('response_subject',array('style'=>'width:350px;','label'=>'Response Subject','type'=>'text'));
		echo $this->Form->input('response_from',array('style'=>'width:350px;','label'=>'Response From','type'=>'text'));
		?>
		<h3>Respond Email Content:</h3>
		<div id="resmail" style="display:none;line-height: 16px;background-color: #F4F3E6;border: 1px solid #E0E0E0;font-size: 12px;margin-bottom: 4px;overflow: auto;padding: 10px;">
			<font color="gray"><b>This mail will be send to user when a form submitted.</b></font>
		</div>
		<?php
		echo $this->Form->input('response_content',array('id'=>'response_content_0'));
		?>
		</div>
		<h3>Set emails, where the email need to send on form submit?</h3>
		<?php
		
		echo $this->Form->input('email',array('style'=>'width:350px;','label'=>'To Email (Optional)'));
		echo $this->Form->input('ccemail',array('style'=>'width:350px;','label'=>'CC Email (Optional)'));
		?>
		<h3>Do you want to save user data to database?</h3>
		<?php
		echo $this->Form->input('savetodb',array('type'=>'select','default'=>'1','options'=>array('Don\'t Save To DB','Save To DB'),'style'=>'border:1px solid #ACACAC;line-height:25;padding:4px;width:362px;','label'=>'Save To Database (Optional)'));
		?>
		<h3>Where do you like to redirect after the user submit form?</h3>
		<?php
		echo $this->Form->input('redirect',array('style'=>'width:350px;','label'=>'Custom Redirect (Optional)'));
		?>
		<h3>These are optional, only need if you planning to submit the form to other website?</h3>
		<?php
		echo $this->Form->input('fmethod',array('default'=>1,'options'=>array('GET','POST'),'type'=>'select','style'=>'border:1px solid #ACACAC;line-height:25;padding:5px;width:362px;','label'=>'Custom Form Method (Optional)'));
		echo $this->Form->input('faction',array('style'=>'width:350px;','label'=>'Custom Form Action (Optional)'));
	?>
	<div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_0', 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/forms\',\'Forms List\');',
					'class'=>'button'
				));
			?>
			</div>
	</fieldset>
	<div class="clear"></div>
</form>
<script type="text/javascript">
	$( '#frm_content_0, #response_content_0' ).ckeditor( function() { /* callback code */ }, { toolbar : 'FormBuilder', } );
	function ckeditor_close_0(){
		CKEDITOR.instances.frm_content_0.destroy();
		CKEDITOR.instances.response_content_0.destroy();
	}
</script>
<?php
echo $this->TinyMce->init('successmsg_0');
echo $this->Js->writeBuffer(); // Write cached scripts
?>
