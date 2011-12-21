<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor: s-resize;">Widget Manager</h3>
		<ul class="content-box-tabs">
			<li><a id="mainlisth" href="#mainlist" class="default-tab current">Widget List</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	
	<div class="content-box-content">
		
		<div style="display: block;" class="tab-content default-tab" id="mainlist">
			<?php
				echo $this->requestAction('/admin/widgets/list',array('return'));
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
		</div>
	</div>
</div>
<div class="clear"></div>
<?php
	echo $this->Js->writeBuffer(); // Write cached scripts
?>