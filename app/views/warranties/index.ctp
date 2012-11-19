<div class="content centered" style="margin-bottom:15px;">
    <?=$this->Form->create('Warranty');?>
    <strong>Filter List:</strong>
    <span style="padding:10px;">
        Distributor:
        <input type="text" name="data[Dealer.distributor]" />
    </span>
    <span style="padding:10px">
        Dealer:
        <input type="text" name="data[Dealer.business_name]" />
    </span>
    <span style="padding:10px">
        Customer:
        <input type="text" name="data[Customer.contact_name]" />
    </span>
    <span style="padding:10px">
        Film:
        <?=$this->Form->input('WarrantyProduct.0.product_id', array('empty' => 'All Films', 'div' => false, 'label'=> false))?>
    </span>
    
    <input type="submit" value="Filter" />
</div>

<div class="content centered">
	<h2>Warranties</h2>
	<table cellpadding="0" cellspacing="0" width="95%" style="margin-bottom:10px;margin:auto;">
	<tr>
            <th style="text-align:right;"><?=$this->Paginator->sort('#','id')?></th>
            <th><?=$this->Paginator->sort('installation_date')?></th>
            <th style="text-align:left;"><?=$this->Paginator->sort('installation_type')?></th>
            <th style="text-align:left;"><?=$this->Paginator->sort('Distributor', 'Dealer.distributor')?></th>
            <th style="text-align:left;"><?=$this->Paginator->sort('Dealer', 'Dealer.business_name')?></th>
            <th style="text-align:left;"><?=$this->Paginator->sort('Customer', 'Customer.contact_name')?></th>
            <th style="text-align:left;"><?=$this->Paginator->sort('Status', 'Warranty.approved')?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($warranties as $warranty):
		$class = 'hoverable';
		if ($i++ % 2 == 0) {
            $class .= ' altrow';
		}
	?>
	<tr class="<?=$class?>" onclick="window.location = '<?=$html->url(array("controller" => "warranties", "action" => "view", $warranty['Warranty']['id']))?>';">
                <td style="text-align:right;">
                    <?=$warranty['Warranty']['id']?>
                </td>
                <td style="text-align:center;">
                    <?=$warranty['Warranty']['installation_date']?>
                </td>
		<td>
                    <?=$warranty['Warranty']['installation_type']?>
                </td>
                <td>
                   <?=$warranty['Dealer']['distributor']?>
                </td>
		<td>
                    <?=$warranty['Dealer']['business_name']?>
		</td>
		<td>
                    <?=$warranty['Customer']['contact_name']?>
		</td>
		<td>
			<?php
                        switch($warranty['Warranty']['approved']) {
                            case 0:
                                echo "Pending";
                                break;
                            case 1:
                                echo "Approved";
                                break;
                            case -1:
                                echo "Denied";
                                break;
                        }
			?>
		</td>
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