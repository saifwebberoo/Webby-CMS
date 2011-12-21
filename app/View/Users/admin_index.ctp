<?php
	$this->Html->addCrumb('Admin Users', '/admin/users',array('class'=>'current'));
	$this->Html->addCrumb('New Users', '/admin/users/add');
?>

		<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3 style="cursor: s-resize;">Admin User Manager</h3>
					
					<ul class="content-box-tabs">
						<li><a id="mainlisth" href="#mainlist" class="default-tab current"><!--<img src="/img/loading.gif" alt="Loading" />-->Admin Users</a></li> <!-- href must be unique and match the id of target div -->

					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div style="display: block;" class="tab-content default-tab" id="mainlist"> <!-- This is the target div. id must match the href of this div's tab -->
						<?php
							echo $this->requestAction('/admin/users/list',array('return'));
						?>
						<!--<script type="text/javascript">
						 $.ajax({
							complete:function (XMLHttpRequest, textStatus) {
								$('#mainlisth').html('Admin Users');
							}, 
							dataType:"html", 
							evalScripts:true, 
							success:function (data, textStatus) {
								$("#mainlist").html(data);
								messageCloseReactivate();
							}, 
							url:'/admin/users/list'
						}); 
						</script>-->
					</div> <!-- End #tab1 -->
					
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<div class="clear"></div>

	<?php

		echo $this->Js->writeBuffer(); // Write cached scripts
	?>

