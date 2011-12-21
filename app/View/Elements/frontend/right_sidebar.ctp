<?php
	function widgetSort($x, $y){
		return ($x['worder'] > $y['worder']);
	}

	if(!isset($page['Widget'])){
		$cust_url = str_replace('/p/','',$this->here);
		if($this->here=='/' || !strstr($cust_url,'.html')){
			$cust_url = 'home.html';
		}
		
		$page = ClassRegistry::init('Page')->find('first',array(
			'conditions' => array(
				'Page.pageurl'=>$cust_url
			),
			'contain'=>array(
				'Widget'=>array('id','name','content','worder','published', 'show_title')
			),
			'fields'=>array(
				'id'
			)
		));
	}
	
	usort($page['Widget'], 'widgetSort');

	foreach($page['Widget'] as $key=>$widget){
		if($widget['published']==1){
?>
		<div class="box">
			<?php if((int)$widget['show_title'] == 1):?>
			<div id="sb-widget-<?php echo $key;?>" class="box-head box-head-blue accordion-toggle"><?php echo $widget['name'];?></div>
			<?php endif;?>
			<div class="box-content">
			<?php echo html_entity_decode($widget['content']);?>
			</div>
		</div>
<?php
		}
	}
?>