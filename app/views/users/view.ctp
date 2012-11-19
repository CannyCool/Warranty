<div class="users view content narrow centered">
<h2>View Profile</h2>
	<dl>
		<dt><?php __('Email'); ?></dt>
		<dd>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt><?php __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php __('Business Name');?></dt>
		<dd>
	<?php echo $user['User']['business_name'];?>
&nbsp;</dd>
		<dt><?php __('Contact Name');?></dt>
		<dd>
	<?php echo $user['User']['contact_name'];?>
&nbsp;</dd>
		<dt><?php __('Phone');?></dt>
		<dd>
	<?php echo $user['User']['phone'];?>
&nbsp;</dd>
		<dt><?php __('Address');?></dt>
		<dd>
	<?php echo $user['User']['address'];?>
&nbsp;</dd>
		<dt><?php __('Additional Address');?></dt>
		<dd>
	<?php echo $user['User']['address2'];?>
&nbsp;</dd>
		<dt><?php __('City');?></dt>
		<dd>
	<?php echo $user['User']['city'];?>
&nbsp;</dd>
		<dt><?php __('State');?></dt>
		<dd>
	<?php echo $user['User']['state'];?>
&nbsp;</dd>
		<dt><?php __('Zip');?></dt>
		<dd>
	<?php echo $user['User']['zip'];?>
&nbsp;</dd>
		<dt><?php __('Distributor');?></dt>
		<dd>
	<?php echo $user['User']['distributor'];?>
&nbsp;</dd>
		<dt><?php __('Disabled');?></dt>
		<dd>
	<?php 
		if ($user['User']['disabled'] == 0)
			$disabled = 'False';
		else
			$disabled = 'True';
		echo $disabled;
	?>
&nbsp;</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<?php
			if ($disabled == 'False') {
		?>
		<li><?php echo $this->Html->link(__('Disable User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to disable # %s?', true), $user['User']['id'])); ?> </li>
		<?php
		}
		?>
	</ul>
</div>