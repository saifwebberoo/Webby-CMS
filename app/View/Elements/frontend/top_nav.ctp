<ul id="top-right-nav">
	<?php
		$page_class = ClassRegistry::init('Page');
		$ele_pages = $page_class->find('all',array(
			'conditions'=>array(
				'menu_id'=>11,
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
					echo '<li><a class="active" target="_blank" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}elseif($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					echo '<li><a class="active" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}else{
					echo '<li><a class="active" href="/pages/',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}
				$matched = true;
			}else{
				if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='External'){
					echo '<li><a target="_blank" href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}elseif($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					echo '<li><a href="',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}else{
					echo '<li><a href="/pages/',$ele_page['Page']['pageurl'],'">',$ele_page['Page']['menu_label'],'</a></li>';
				}
			}
		}
	?>
	<?php
	if($this->Session->check('Artist')){
	?>
		<li><a href="/secured-artist-profile-edit">MY PROFILE</a></li>
		<li><a href="/secured-artist-settings">SETTINGS</a></li>
		<li><a href="/secured-artist-logout" class="logout">LOGOUT</a></li>
	<?php
	} elseif ($this->Session->check('Label')){
	?>
		<li><a href="/secured-label-profile-edit">MY PROFILE</a></li>
		<li><a href="/secured-label-settings">SETTINGS</a></li>
		<li><a href="/secured-label-logout" class="logout">LOGOUT</a></li>
	<?php
	} else {
	?>
		<li><a href="/artist-register">REGISTER</a></li>
		<li><a href="/artist-login">LOGIN</a></li>
	<?php
	}
	?>
</ul>