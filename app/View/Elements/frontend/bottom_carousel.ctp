<div class="carousel">
	<ul>
	<?php
		$bc_images = ClassRegistry::init('Image')->find('all',array(
			'conditions' => array(
				'image_category_id' => 3
			),
			'order' => 'rand()',
			'limit' => 12,
			'recursive' => -1,
			'fields' => array(
				'id',
				'image_name'
			)
		));
		foreach($bc_images as $img){
	?>
		<li><img src="/uploads/Bottom_Slider/croped_images/<?php echo $img['Image']['image_name'] ?>" alt="Artists" /></li>
	<?php
		}
		/*
		<li><img src="/themes/default/images/cimages/1.png" alt="ex1" /></li>
		<li><img src="/themes/default/images/cimages/2.png" alt="ex2" /></li>
		<li><img src="/themes/default/images/cimages/3.png" alt="ex3" /></li>
		<li><img src="/themes/default/images/cimages/1.png" alt="ex1" /></li>
		<li><img src="/themes/default/images/cimages/2.png" alt="ex2" /></li>
		<li><img src="/themes/default/images/cimages/3.png" alt="ex3" /></li>
		<li><img src="/themes/default/images/cimages/1.png" alt="ex1" /></li>
		<li><img src="/themes/default/images/cimages/2.png" alt="ex2" /></li>
		<li><img src="/themes/default/images/cimages/3.png" alt="ex3" /></li>
		 */
	?>
	</ul>
</div>