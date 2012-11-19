<!--
Number (ID), Dealer, Customer, Res/Com

sort by each

search boxes at the top with a label "Filter Results:"

sort by date range (maybe)
-->

<? //start of contact results ?>
<?
if (isset($searchContacts)) {
?>
<h1>Contact Search Results</h1>
<table cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<th><?php echo $this->Paginator->sort('contact_name');?></th>
		<th><?php echo $this->Paginator->sort('business_name');?></th>
		<th>Actions</th>
	</tr>
	<?php
	$i = 0;
	foreach ($searchContacts as $contact):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td align="center"><?php echo $contact['User']['contact_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $contact['User']['business_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $this->Html->link(__('View Warranties', true), array('controller' => 'users', 'action' => 'view/'.$contact['User']['id'])); ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?>	</p>

<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?
}
?>
<? //end of contact results ?>
<? //start of dealer results ?>
<?
if (isset($searchDealers)) {
?>
<h1>Dealer Search Results</h1>
<table cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<th><?php echo $this->Paginator->sort('business_name');?></th>
		<th><?php echo $this->Paginator->sort('contact_name');?></th>
		<th>Actions</th>
	</tr>
	<?php
	$i = 0;
	foreach ($searchDealers as $dealer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td align="center"><?php echo $dealer['User']['business_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $dealer['User']['contact_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $this->Html->link(__('View Warranties', true), array('controller' => 'users', 'action' => 'view/'.$dealer['User']['id'])); ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?>	</p>

<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?
}
?>
<? //end of dealer results ?>
<? //start of date results ?>
<?
if (isset($searchDates)) {
?>
<h1>Film Type Search Results</h1>
<table cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<th><?php echo $this->Paginator->sort('warranty_id');?></th>
		<th><?php echo $this->Paginator->sort('business_name');?></th>
		<th><?php echo $this->Paginator->sort('contact_name');?></th>
		<th><?php echo $this->Paginator->sort('installation_type');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($searchDates as $date):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td align="center"><?php echo $date['WarrantyProduct'][0]['warranty_id']; ?>&nbsp;</td>
		<td align="center"><?php echo $date['DealerProfile']['business_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $date['CustomerProfile']['contact_name']; ?>&nbsp;</td>
		<td align="center"><?php echo $date['Warranty']['installation_type']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?>	</p>

<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?
}
?>
<? //end of date results ?>
<? //start of filmType results ?>
<?
print_r($searchFilmTypes);
if (isset($searchFilmTypes)) {
?>
<h1>Film Type Search Results</h1>
<table cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<th><?php echo $this->Paginator->sort('warranty_id');?></th>
		<th><?php echo $this->Paginator->sort('business_name');?></th>
		<th><?php echo $this->Paginator->sort('contact_name');?></th>
		<th><?php echo $this->Paginator->sort('installation_type');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($searchFilmTypes as $filmType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td align="center"><?php echo $filmType['Warranty_products']['warranty_id']; ?>&nbsp;</td>
		<td align="center"><?php echo $filmType['Warranty_products']['square_footage']; ?>&nbsp;</td>
		<td align="center"><?php echo $filmType['Warranty_products']['roll_number']; ?>&nbsp;</td>
		<td align="center"><?php echo $filmType['Warranty_products']['roll_number']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?>	</p>

<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?
}
?>
<? //end of filmType results ?>
<br/>
<a href="../../home">Back to Search</a>