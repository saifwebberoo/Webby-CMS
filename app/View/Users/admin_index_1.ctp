<?php
	$this->Html->addCrumb('Admin Users', '/admin/users',array('class'=>'current'));
	$this->Html->addCrumb('New Users', '/admin/users/add');
?>

		<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3 style="cursor: s-resize;">Admin User Manager</h3>
					
					<ul class="content-box-tabs">
						<li><a id="tab11" href="#tab1" class="default-tab current">List</a></li> <!-- href must be unique and match the id of target div -->
						<li>
						<a id="tab21" href="#tab2">Add / Edit</a>
						
						
						</li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div style="display: block;" class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<!--<div class="notification attention png_bg">
							<a href="#" class="close"><img src="index_files/cross_grey_small.png" title="Close this notification" alt="close"></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By 
the way, you can close this notification with the top-right cross.
							</div>
						</div>-->
						<a class="button" style="float:right;">Add New User</a>
						<p>
							<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
							));?>	
						</p>
						
						<table>
							
							<thead>
								<tr>
								    <th><input class="check-all" type="checkbox"></th>
									<th><?php echo $this->Paginator->sort('id');?></th>
									<th><?php echo $this->Paginator->sort('name');?></th>
									<th><?php echo $this->Paginator->sort('username');?></th>
									<th><?php echo $this->Paginator->sort('group_id');?></th>
									<th><?php echo $this->Paginator->sort('Online','is_online');?></th>
									<th><?php echo $this->Paginator->sort('blocked');?></th>
									<th><?php echo $this->Paginator->sort('modified');?></th>
									<th>Actions</th> 
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option selected="selected" value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										
										
										
										
										<div class="paging">
										<?php
                                                                                         echo $this->Paginator->first('« First');
                                                                                    
											echo $this->Paginator->prev('«  ' . __('previous'), array(), null, array('class' => 'prev disabled'));
											echo $this->Paginator->numbers(array('separator' => ''));
											echo $this->Paginator->next(__('next') . ' »', array(), null, array('class' => 'next disabled'));
                                                                                        
                                                                                        echo $this->Paginator->last('Last »');
										?>
										</div>
										 <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							
								<?php
									$i = 0;
									foreach ($users as $user): 
									$alt_row = 'class="alt-row"';
									if($i%2==0){
										$alt_row = '';
									}
								?>
									<tr <?php echo $alt_row;?>>
										<td><input type="checkbox"></td> 
										<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
										<td><b><?php echo h($user['User']['name']); ?></b><br /><a href="mailto:<?php echo h($user['User']['email']); ?>"><?php echo h($user['User']['email']); ?></a></td>
										<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
										<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
										<td class="c"><?php echo ($user['User']['is_online']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
										<td class="c"><?php echo ($user['User']['blocked']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
										<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
										<td class="actions">
											<a href="/admin/users/view/<?php echo h($user['User']['id']); ?>"><img src="/admin_theme/view_icon.png" alt="View"></a>
											
											
											<?php
												echo html_entity_decode($this->Js->link('<img src="/admin_theme/pencil.png" alt="Edit">','/admin/users/edit/'.h($user['User']['id']), array(
													'update' => '#tab2',
													'htmlAttributes' => array('id' => 'elink_'.$user['User']['id']),
													'evalScripts' => true,
													'before' => "$('#elink_".$user['User']['id']."').html('<img src=\"/img/loading.gif\" alt=\"Loading\" />');",
													'complete' => "$('#tab21').click();$('#elink_".$user['User']['id']."').html('<img src=\"admin_theme/pencil.png\" alt=\"Edit\">');$('#tab21').html('Edit User');",
												)));
												//
											?>
											<?php echo html_entity_decode($this->Form->postLink('<img src="/admin_theme/cross.png" alt="Delete">', array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['name']))); ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							
						</table>
						
						
						
					</div> <!-- End #tab1 -->
					
					<div style="display: none;" class="tab-content" id="tab2">
					
                                            
                                            <h4 style="text-align: right;"><?php echo __('Admin Add User'); ?></h4> <hr />
                                            <?php echo $this->Form->create('User');?>
                                                    <fieldset>                                                          
                                                            <p>
                                                                <label>Full Name</label>
                                                                <?php
                                                                    echo $this->Form->input('name',array('div'=>false,'label'=>false,'class'=>'text-input small-input'));
                                                                ?>
                                                                <br><small>Please add first name and last name</small>
                                                            </p>
                                                            
                                                            <p>
                                                                <label>Username</label>
                                                                <?php
                                                                    echo $this->Form->input('username',array('div'=>false,'label'=>false,'class'=>'text-input small-input'));
                                                                ?>
                                                                <span class="input-notification success png_bg">Successful message</span> 
                                                            </p>
                                                            
                                                            <p>
                                                                <label>Password</label>
                                                                <?php
                                                                    echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'text-input small-input'));
                                                                ?>
                                                                          
                                                                <label>Confirm Password</label>
                                                                <?php
                                                                    echo $this->Form->input('cpassword',array('div'=>false,'label'=>false,'class'=>'text-input small-input','type'=>'password'));
                                                                ?>
                                                                <span class="input-notification success png_bg">Successful message</span> 
                                                               </p>
                                                            
                                                            <p>
                                                                <label>Email</label>
                                                                <?php
                                                                    echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'text-input small-input'));
                                                                ?>
                                                                <span class="input-notification success png_bg">Successful message</span> 
                                                            </p>
                                                            
                                                            <p>
                                                                    <label>Belongs to which group?</label>     
                                                                     <?php
                                                                        echo $this->Form->input('group_id',array('div'=>false,'label'=>false,'class'=>'small-input'));
                                                                     ?>
                                                            </p>
                                                            
                                                            <p>
									<label>Would you like to block this user?</label>
                                                                         <?php
                                                                        echo $this->Form->input('blocked',array('div'=>false,'label'=>false,'type'=>'checkbox'));
                                                                     ?>Block User
									
								</p>
                                                            
                                                            <p>
									<input class="button" value="Submit" type="submit">
								</p>

                                                    </fieldset>
                                            <div class="clear"></div><!-- End .clear -->
                                        </form>
                                            

						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
<div class="clear"></div>

	<?php

		echo $this->Js->writeBuffer(); // Write cached scripts
	?>

