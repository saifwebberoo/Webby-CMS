<div class="content-box">
	<div class="content-box-header">
		<h3 style="cursor: s-resize;">Admin Groups Manager</h3>
		<ul class="content-box-tabs">
			<li><a id="mainlisth" href="#mainlist" class="default-tab current">Admin Groups</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<div style="display: block;" class="tab-content default-tab" id="mainlist">
			<?php
				echo $this->requestAction('/admin/groups/list',array('return'));
			?>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php
	echo $this->Js->writeBuffer(); // Write cached scripts
?>