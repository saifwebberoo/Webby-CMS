<?php
	//$this->Html->addCrumb('Admin Users', '/admin/users');
	//$this->Html->addCrumb('New Users', '#',array('class'=>'current'));
?>
<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<!--<h4 style="text-align: right;"><?php //echo __('Admin Add User'); ?></h4> <hr />-->
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/users/add',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>	
	<fieldset>                                                          
			<div class="form_input">
			<label>Full Name</label>
			<?php
				echo $this->Form->input('name',array('class'=>'text-input small-input'));
			?>
			<br /><small>Please add first name and last name</small>
			</div><div class="form_input">
			<label>Username</label>
			<?php
				echo $this->Form->input('username',array('class'=>'text-input small-input'));
			?>
			</div><div class="form_input">
			<label>Password</label>
			<?php
				echo $this->Form->input('password',array('class'=>'text-input small-input'));
			?>
			</div><div class="form_input">
			<label>Confirm Password</label>
			<?php
				echo $this->Form->input('cpassword',array('class'=>'text-input small-input','type'=>'password'));
			?>
			</div><div class="form_input">
			<label>Email</label>
			<?php
				echo $this->Form->input('email',array('class'=>'text-input small-input'));
			?>
			</div><div class="form_input">
			<label>Belongs to which group?</label>     
			<?php
				echo $this->Form->input('group_id',array('class'=>'small-input'));
			?>
			</div><div class="form_input">
			<label>Would you like to block this user?</label>
			<?php
			echo $this->Form->input('blocked',array('type'=>'checkbox'));
			?>Block User
			</div><div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_0', 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/users\',\'Admin User\');',
					'class'=>'button'
				));
			?>
			</div>
	</fieldset>
	<div class="clear"></div>
</form>

<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>