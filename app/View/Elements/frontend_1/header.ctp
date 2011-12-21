<h2 id="logo">
	<a href="#">
		<!-- <img src="/themes/11nov11/images/logo.png" title="MyMatrimony" alt="MyMatrimony" original="/themes/11nov11/images/logo.png"> -->
	</a>
</h2><!-- logo -->


<ul id="main-nav">

	<?php
		$page_class = ClassRegistry::init('Page');
		$ele_pages = $page_class->find('all',array(
			'conditions'=>array(
				'menu_id'=>1,
				'published'=>1
			),
			'fields'=>array(
				'menu_label',
				'pageurl',
				'id',
				'link_type',
				'islink'
			),
			'order'=>array(
				'porder ASC'
			),
			'recursive'=>-1
		));
		
		
		
		$matched = false;
		$cpage = substr($this->here,1,strlen($this->here)-1);
		if($cpage=='/'){
			$cpage = $ele_pages[0]['Page']['pageurl'];
		}

		$parent_index = 0;
		if(isset($this->data['Parent_pages']) && isset($this->data['Parent_pages'][0])){
			$parent_index = count($this->data['Parent_pages'])-1;
		}

		foreach($ele_pages as $ele_page){
			if($matched==false && 
				(
					$cpage==$ele_page['Page']['pageurl'] || $cpage=='pages/'.$ele_page['Page']['pageurl']  ||
					(
						isset($this->data['Parent_pages'][0]) && 
						$ele_page['Page']['pageurl'] == $this->data['Parent_pages'][$parent_index]['Page']['pageurl']
					)
				)){
				if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='External'){
					echo '<li><a class="active" target="_blank" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}elseif($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					echo '<li><a class="active" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}else{
					echo '<li><a class="active" href="/pages/',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}
				$matched = true;
			}else{
				if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='External'){
					echo '<li><a target="_blank" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}elseif($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					echo '<li><a href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}else{
					echo '<li><a href="/pages/',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'<span></span></a></li>';
				}
			}
		}

		
	if($this->Session->check('Member')) {
		echo '<li><a href="/member-profile/'.base64_encode($this->Session->read('Member.email')).'">My profile</a><li>
			  <li><a href="/member-logout/">Logout</a><li>';
	}
?>
</ul><!-- Main Menu -->
<?php if(!$this->Session->check('Member')) {
?>
<div id="top-login">
	 <?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('Member',array('action' => 'member_login','inputDefaults' => array(

			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
		)));
		echo $this->Form->input('email',array('label'=>false,'div'=>false,'error'=>false,'title'=>'Username...'));
		echo $this->Form->input('password',array('label'=>false,'div'=>false,'error'=>false,'title'=>'password'));
	?>
		<a href="#" onclick="$('#MemberMemberLoginForm').submit(); return false" class="button blue">Login</a>
	</form>
	<div id="top-login-links">
	<a href="/Registration">Register Now</a>&nbsp;|&nbsp;<a href="/forgot-password">Forgot Password</a>

	<a href="/facebook-register">
	<img src="/themes/11nov11/images/face.png" title="facebook" alt="facebook">	
	</a>	
	</div> 
</div><!-- User Section -->
<?php
}
?>
<!--<div id="top-featured-list">
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name1.png" width="22" height="22" />Suthi 16yrs<span><img src="/themes/11nov11/images/photo/name1.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name2.png" width="22" height="22" />Sharvan 27yrs<span><img src="/themes/11nov11/images/photo/name2.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name3.png" width="22" height="22" />Nami 19yrs<span><img src="/themes/11nov11/images/photo/name3.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name1.png" width="22" height="22" />Suthi 16yrs<span><img src="/themes/11nov11/images/photo/name1.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name3.png" width="22" height="22" />Sharvan 27yrs<span><img src="/themes/11nov11/images/photo/name2.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name2.png" width="22" height="22" />Nami 19yrs<span><img src="/themes/11nov11/images/photo/name3.png" /></span></a>
	<a href="#"><img class="top-fimg" src="/themes/11nov11/images/photo/name1.png" width="22" height="22" />Suthi 16yrs<span><img src="/themes/11nov11/images/photo/name1.png" /></span></a>
</div> Top Feature User List -->

