<div class="users form content narrow centered" align="center">
    <h2>Dealer Registration</h2>
<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('psword', array ('label' => array('text' => 'Password Confirm', 'class' => 'required')));
		echo '<br/>';
		echo $this->Form->input('business_name');
		echo $this->Form->input('contact_name');
		echo $this->Form->input('address');
		echo $this->Form->input('address2', array('label' => 'Additional Address'));
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
		echo $this->Form->input('distributor', array('label' => array('class' => 'required')));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>