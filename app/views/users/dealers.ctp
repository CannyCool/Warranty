<div class="content centered">
	<h2><?php __('List Dealers');?></h2>
	<table cellpadding="0" cellspacing="0" width="95%">
            <tr>
		<th><?php echo $this->Paginator->sort('email');?></th>
                <th><?=$this->Paginator->sort('business_name');?></th>
                <th><?=$this->Paginator->sort('contact_name');?></th>
                <th><?=$this->Paginator->sort('distributor');?></th>
                <th><?=$this->Paginator->sort('state');?></th>
            </tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = 'hoverable';
		if ($i++ % 2 == 0) {
			$class .= ' altrow';
		}
	?>
	<tr class="<?=$class?>" onclick="window.location = '<?=$this->Html->url(array('action' => 'view', $user['User']['id']))?>';">
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?=$user['User']['business_name']?></td>
        <td><?=$user['User']['contact_name']?></td>
        <td><?=$user['User']['distributor']?></td>
        <td><?=$user['User']['state']?></td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="centered_text">
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
            ));
	?>	
        </div>

	<div class="paging centered_text">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>