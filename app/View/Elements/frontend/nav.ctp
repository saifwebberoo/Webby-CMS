<ul>
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
	?>
</ul>