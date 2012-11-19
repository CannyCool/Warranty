<div class="users form content narrow centered" align="center">
<h2>Create New Administrator</h2>
<?php echo $this->Form->create('User');?>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		if($auth['User']['group_id'] == 1) {
			echo $this->Form->input('group_id');
		}
		else {
			echo $form->input('group_id', array('options' => array(
				'2'=>'Madico',
				'3'=>'Dealer',
				'4'=>'Customer'
			)));
		}
		echo $this->Form->input('contact_name');
		echo $this->Form->input('phone');
	?>
<?php echo $this->Form->end(__('Create User', true));?>
</div>