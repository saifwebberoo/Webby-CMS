<?php
	$Alabel = 'Admin';
	if(strstr($this->here,'staff')){
		$Alabel = 'Staff';
	}
?>
<div id="login-content" style="width:278px;">
	<div class="module">
		<div class="module-head">
			<h2 class="logo" id="login-title"><img src="/admin_login_theme/css/images/secrecy-icon.png">&nbsp;<?php echo $Alabel;?>&nbsp;Login</h2>
		</div>
		<div class="wrap">
			<?php
				$div_content = 'block';
				$forgot_div = 'none';
				if($this->Session->check('Message.flash.message') && $this->Session->read('Message.flash.message')=='Email entered not found in system.'){
					$div_content = 'none';
					$forgot_div = 'block';
				}
			?>
			<div class="content" id="login-div" style="display:<?=$div_content;?>;">
				<?php 
				$this->Session->flash('auth');
				?>
				<div style="color:#50EF00;font-weight:bold;">
				<?php
				if($this->Session->check('Message.flash.message') && $this->Session->read('Message.flash.message')=='Password sent to email.'):$this->Session->flash(); endif; // this line displays our flash messages
				?>
				</div>
				<?php echo $this->Form->create(NULL,array('url'=>$this->here));?>
					<fieldset>
						<div style="float:right;">
							<a onclick="hideDiv('login-div');showDiv('forgot-div');updateDiv('login-title','<img src=\'/admin_theme/css/images/forgotpwd.png\'>&nbsp;Forgot Password');return false;" href="#" title="Click here to retrieve login" class="mute">Lost Password?</a>
						</div> 
						<label>Username:</label>
						<input name="data[User][username]" type="text" class="wide" value="" id="UserUsr" />						
					</fieldset>
					<fieldset>
						<label>Password:</label>
						<input type="password" name="data[User][password]" class="wide" value="" id="UserPwd" />						
					</fieldset>			
					<fieldset>
						<button type="submit" title="Sign in" class="primary_lg right">Sign in</button>
						<input type="checkbox" name="data[remember_me]" class="radio" /> Remember me
					</fieldset>
				</form>
			</div> <!--close content-->
			<div class="content" id="forgot-div" style="display:<?=$forgot_div;?>;">
				<div style="color:red;font-weight:bold;"><?php if($this->Session->check('Message.flash.message') && $this->Session->read('Message.flash.message')=='Email entered not found in system.'): $this->Session->flash(); endif; // this line displays our flash messages?></div>
				<?php echo $this->Form->create('User',array('action'=>'forgotpassword','admin'=>true));?>
					<fieldset>
						<div style="float:right;">
							<a onclick="hideDiv('forgot-div');showDiv('login-div');updateDiv('login-title','<img src=\'/admin_theme/css/images/secrecy-icon.png\'>&nbsp;<?php echo $Alabel;?>&nbsp;Login');return false;"  href="#" title="Click here to retrieve login" class="mute">Login &raquo;</a>
						</div> 
						<label>Email:</label>
						<input name="data[User][email]" type="text" class="wide" value="" id="UserEmail" />						
					</fieldset>

					<fieldset>
						<button type="submit" title="Sign in" class="primary_lg right">Submit</button>
					</fieldset>
				</form>
			</div> <!--close content-->
		</div> <!--close module wrap-->
		<div class="module-footer">
			<div>&nbsp;</div>
		</div>
	</div> <!--close module-->
	<?php echo $this->element('admin/login/footer');?>
</div> <!--close login-content-->
