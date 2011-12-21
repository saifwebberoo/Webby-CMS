<?php
	$this->Html->addCrumb('Image Categories', '/admin/images',array('class'=>'current'));
	$this->Html->addCrumb('New Category', '/admin/images/add');
?>

		<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3 style="cursor: s-resize;">Image Management</h3>
					
					<ul class="content-box-tabs">
						<li><a id="mainlisth" href="#mainlist" class="default-tab current">Images List</a></li> 
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div style="display: block;" class="tab-content default-tab" id="mainlist"> <!-- This is the target div. id must match the href of this div's tab -->
						<?php
							echo $this->requestAction('/admin/images/list',array('return'));
						?>
					</div> <!-- End #tab1 -->
					
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<div class="clear"></div>

	<?php

		echo $this->Js->writeBuffer(); // Write cached scripts
	?>

