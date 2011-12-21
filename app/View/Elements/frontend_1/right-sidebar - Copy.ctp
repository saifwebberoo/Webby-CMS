<!--
<div class="box">
	<div class="box-head box-head-purple">Heading</div>
	<div class="box-content">
	Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
	</div>
</div>
<div class="box">
	<div class="box-head box-head-orange">Heading</div>
	<div class="box-content">
	Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
	</div>
</div>
<div class="box">
	<div class="box-head box-head-blue">Heading</div>
	<div class="box-content">
	Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
	</div>
</div>
-->

<?php
	$widgets_dis = array();
	$widgets_nam = array();
	if(isset($page['Widget'])){
		foreach($page['Widget'] as $widget){
			if($widget['published']==1){
				$widgets_dis[$widget['worder']]=$widget['content'];
				if($widget['show_title'] == 1)
					$widgets_nam[$widget['worder']]=$widget['name'];
			}	
		}
	}else{
		$cust_url = $this->here;
		if($this->here=='/' || !strstr($cust_url,'.html')){
			$cust_url = 'home.html';
		}
		$cust_page = ClassRegistry::init('Page')->find('first',array(
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
		if(isset($cust_page['Widget'])){
			foreach($cust_page['Widget'] as $widget){
				if($widget['published']==1){
					$widgets_dis[$widget['worder']]=$widget['content'];
					if($widget['show_title'] == 1)
						$widgets_nam[$widget['worder']]=$widget['name'];
				}
			}
		}
	}
	ksort($widgets_dis);
	ksort($widgets_nam);
	foreach($widgets_dis as $key=>$wcontent){
?>
		<div class="box">
			<?php if(isset($widgets_nam[$key])):?>
			<div id="sb-widget-<?php echo $key;?>" class="box-head box-head-blue accordion-toggle"><?php echo $widgets_nam[$key];?></div>
			<?php endif;?>
			<div class="box-content">
			<?php echo html_entity_decode($wcontent);?>
			</div>
		</div>
<?php
	}
	unset($widgets_dis);
	unset($widgets_nam);
	
/*
$widgets = array(
	0 => array(
		'worder'=>2,
		'text'=>'two'
	),
	1 => array(
		'worder'=>1,
		'text'=>'One'
	),
	2 => array(
		'worder'=>3,
		'text'=>'Six'
	),
	3 => array(
		'worder'=>0,
		'text'=>'Eight'
	),
);


function worderSort($x, $y){
	return $x['worder'] > $y['worder'];
}

usort($widgets, 'worderSort');

var_dump($widgets);  
*/
?>