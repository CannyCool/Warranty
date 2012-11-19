<script type="text/javascript">
function openWarranty(){
	var warranty_id = document.getElementById('warranty_search');
	window.location = "../warranties/view/"+warranty_id.value;
}
function searchContact(){
	var contacts = document.getElementById('contact_search');
	window.location = "results/contact/"+contacts.value;
}
function searchDealer(){
	var dealers = document.getElementById('dealer_search');
	window.location = "results/dealer/"+dealers.value;
}
function searchFilmType(){
	var filmTypes = document.getElementById('filmType_search');
	window.location = "results/filmType/"+filmTypes.value;
}
function searchDate(){
	var dates = document.getElementById('date_search');
	window.location = "results/date/"+dates.value;
}
</script>
<h1>Search</h1>
Search for Contact Name: <input type="text" id="contact_search"><input type="button" value="Search" onClick="searchContact();"><br/>
Search for Dealer Name: <input type="text" id="dealer_search"><input type="button" value="Search" onClick="searchDealer();"><br/>
Search for Installation Date: <input type="text" id="date_search"><input type="button" value="Search" onClick="searchDate();">(2010-09-26)<br/>
Search by Film Type: <?=$form->input("WarrantyProduct.0.product_id", array('id' => 'filmType_search', 'div' => false, 'label'=> false)); ?><input type="button" value="Search" onClick="searchFilmType();"><br/>
<hr/>
<h1>Warranties to Approve</h1>
<table cellpadding="0" cellspacing="0" width="95%">
	<tr>
		<th><?php echo $this->Paginator->sort('dealer_id');?></th>
		<th><?php echo $this->Paginator->sort('customer_id');?></th>
		<th><?php echo $this->Paginator->sort('installation_date');?></th>
		<th><?php echo $this->Paginator->sort('installation_type');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($needApproval as $warranty):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $warranty['Dealer']['email']; ?>&nbsp;</td>
		<td><?php echo $warranty['Customer']['email']; ?>&nbsp;</td>
		<td><?php echo $warranty['Warranty']['installation_date']; ?>&nbsp;</td>
		<td><?php echo $warranty['Warranty']['installation_type']; ?>&nbsp;</td>
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
<br/><br/>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Advanced Search', true), array('action' => 'index'));?> (not complete)</li>
	</ul>
</div>