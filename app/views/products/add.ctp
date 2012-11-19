<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('WarrantyForm');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>