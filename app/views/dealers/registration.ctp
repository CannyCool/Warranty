<div class="users form content narrow centered" align="center">
    <h2>Dealer Registration</h2>
<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('psword', array ('label' => 'Confirm'));
		echo $this->Form->hidden('group_id', array('value' => '3'));
		echo '<br/>';
		echo $this->Form->input('business_name');
		echo $this->Form->input('contact_name');
		echo $this->Form->input('address');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>