<div class="products view">
<h2><?php  __('Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $product['Product']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $product['Product']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product', true), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Product', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Warranty Forms', true), array('controller' => 'warranty_forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Warranty Form', true), array('controller' => 'warranty_forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Warranty Forms');?></h3>
	<?php if (!empty($product['WarrantyForm'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Version'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Requires Approval'); ?></th>
		<th><?php __('Active'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['WarrantyForm'] as $warrantyForm):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $warrantyForm['id'];?></td>
			<td><?php echo $warrantyForm['name'];?></td>
			<td><?php echo $warrantyForm['version'];?></td>
			<td><?php echo $warrantyForm['created'];?></td>
			<td><?php echo $warrantyForm['content'];?></td>
			<td><?php echo $warrantyForm['requires_approval'];?></td>
			<td><?php echo $warrantyForm['active'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'warranty_forms', 'action' => 'view', $warrantyForm['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'warranty_forms', 'action' => 'edit', $warrantyForm['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'warranty_forms', 'action' => 'delete', $warrantyForm['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $warrantyForm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Warranty Form', true), array('controller' => 'warranty_forms', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
