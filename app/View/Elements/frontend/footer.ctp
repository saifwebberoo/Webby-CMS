<div id="footer">
	<div id="footer-nav">
		<div id="footer-nav-inner">
		<?php
		$page_class = ClassRegistry::init('Page');
		$ele_pages = $page_class->find('all',array('conditions'=>array('menu_id'=>8,'published'=>1),'fields'=>array('menu_label','pageurl','id','link_type','islink'),'order'=>array('porder ASC'),'recursive'=>-1));
		$matched = false;
		$cpage = substr($this->here,1,strlen($this->here)-1);
		if($cpage=='/'){
			$cpage = $ele_pages[0]['Page']['pageurl'];
		}
		$parent_index = 0;
		if(isset($this->data['Parent_pages']) && isset($this->data['Parent_pages'][0])){
			$parent_index = count($this->data['Parent_pages'])-1;
		}

		$final_footer_nav = array();
		
		foreach($ele_pages as $ele_page){
		
			$ele_page['Page']['menu_label'] = html_entity_decode($ele_page['Page']['menu_label']);
		
			if($matched==false && 
				(
					$cpage==$ele_page['Page']['pageurl'] || $cpage=='pages/'.$ele_page['Page']['pageurl']  ||
					(
						isset($this->data['Parent_pages'][0]) && 
						$ele_page['Page']['pageurl'] == $this->data['Parent_pages'][$parent_index]['Page']['pageurl']
					)
					
				)){
				if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='External'){
					$final_footer_nav[] = '<a class="active" target="_blank" href="'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					$final_footer_nav[] = '<a class="active" href="'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}else{
					$final_footer_nav[] = '<a class="active" href="/pages/'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}
				$matched = true;
			}else{
				if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='External'){
					$final_footer_nav[] = '<a target="_blank" href="'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}if($ele_page['Page']['islink']==1 && $ele_page['Page']['link_type']=='Internal'){
					$final_footer_nav[] = '<a href="'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}else{
					$final_footer_nav[] = '<a href="/pages/'.$ele_page['Page']['pageurl'].'">'.$ele_page['Page']['menu_label'].'</a>';
				}
			}
		}
		
		echo implode('&nbsp;&nbsp;|&nbsp;&nbsp;',$final_footer_nav);
	?>
		</div>
	</div>
	<div class="copyrights">
		All Rights Reserved 2012 <a href="http://www.aandrnetwork.com">&copy; A&amp;R Network</a>
	</div>
</div><!-- #footer -->