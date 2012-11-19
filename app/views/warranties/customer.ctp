<div class="warranties form content narrow centered" align="center"> 
	<?php echo $this->Form->create('Warranty');?>
		<h2>Customer Information</h2>
		<?
			echo $this->Form->input('Customer.id');
			echo $this->Form->input('Customer.contact_name', array('label' => 'Contact Name:'));
			echo $this->Form->input('Customer.business_name', array('label' => 'Business Name:'));
			echo $this->Form->input('Customer.address', array('label' => 'Address:'));
			echo $this->Form->input('Customer.address2', array('label' => 'Address 2:'));
			echo $this->Form->input('Customer.city', array('label' => 'City:'));
			echo $this->Form->input('Customer.state', array('label' => 'State:'));
			echo $this->Form->input('Customer.zip', array('label' => 'Zip:'));
			echo $this->Form->input('Customer.phone', array('label' => 'Phone:'));
			echo $this->Form->input('Customer.email', array('label' => 'E-Mail:'));
		?>
	<?php echo $this->Form->end('Submit', true);?>
</div>