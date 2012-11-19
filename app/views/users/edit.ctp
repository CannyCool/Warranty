<div class="users form content narrow centered" align="center">
    <h2>Edit Profile</h2>
<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		if($auth['User']['group_id'] == 1) {
			echo $this->Form->input('group_id');
		}
		echo $this->Form->input('business_name');
		echo $this->Form->input('contact_name');
		echo $this->Form->input('address');
		echo $this->Form->input('address2', array('label' => 'Additional Address'));
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
		
		if($auth['User']['group_id'] == 3)
			echo $this->Form->input('distributor', array('label' => array('class' => 'required')));
		else
			echo $this->Form->input('distributor');
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>