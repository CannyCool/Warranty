<div class="content centered">

    <h2>Viewing Warranty #<?=$warranty['Warranty']['id']?></h2>

    <div style="float:left;width:425px;">
	<h3>Installation</h3>
	<br />
	<label for="installation_type">Installation Type:</label>
	<span id="installation_type"><?=$warranty['Warranty']['installation_type']?></span>
	<br />
	<label for="installation_date">Installation Date:</label>
	<span id="installation_date"><?=$warranty['Warranty']['installation_date']?></span>
    </div>
    <div style="float:right;width:425px;">
	<h3>Film to be installed:</h3>
	<br />
        <table style="width:100%">
            <tr>
				<th style="text-align:left;"></th>
				<th style="text-align:center;">Film</th>
                <th style="text-align:left;">Sq. Feet</th>
                <th style="text-align:left;">Roll #</th>
                <th style="text-align:left;">Glass</th>
				<th style="text-align:left;">Lg Pane</th>
				<th style="text-align:left;">Direction</th>
				<th style="text-align:left;">Shading</th>
            </tr>

            <? foreach($warranty['WarrantyProduct'] as $film) { ?>
                <tr>
					<td><?=$html->image($film['shading_style'].'.png', array('width'=>'25px'))?></td>
                    <td><?=$film['Product']['name']?></td>
                    <td><?=$film['square_footage']?></td>
                    <td><?=$film['roll_number']?></td>
                    <td><?=$film['glass']?></td>
					<td><?=$film['largest_pane_x']?> X <?=$film['largest_pane_y']?></td>
					<td><?=$film['direction']?></td>
					<td><?=$film['shading_percent']?> %</td>
                </tr>
            <? } ?>
        </table>
    </div>

    <div style="clear:both;"></div>

    <div style="float:left;width:425px;margin-top:15px;">
	<h3>Customer Information</h3>
	<br />
	<label for="business_name">Business Name:</label>
	<span id="business_name"><?=$warranty['Customer']['business_name']?></span>
	<br />
	<label for="contact_name">Contact Name:</label>
	<span id="contact_name"><?=$warranty['Customer']['contact_name']?></span>
	<br />
	<label for="address">Address:</label>
	<span id="address"><?=$warranty['Customer']['address']?></span>
	<br />
	<span id="address2"><?=$warranty['Customer']['address2']?></span>
	<br />
	<label for="city">City</label>
	<span id="city"><?=$warranty['Customer']['city']?></span>
	<br />
	<label for="state">State:</label>
	<span id="state"><?=$warranty['Customer']['state']?></span>
	<br />
	<label for="zip">Zip:</label>
	<span id="zip"><?=$warranty['Customer']['zip']?></span>
	<br />
	<label for="phone">Phone:</label>
	<span id="phone"><?=$warranty['Customer']['phone']?></span>
	<br />
	<label for="email">Email:</label>
	<span id="email"><?=$warranty['Customer']['email']?></span>
</div>

<div style="float:right;width:425px;margin-top:15px;">
	<h3>Dealer Information</h3>
        <br />
	<label for="business_name">Business Name:</label>
	<span id="business_name"><?=$warranty['Dealer']['business_name']?></span>
	<br />
	<label for="contact_name">Contact Name:</label>
	<span id="contact_name"><?=$warranty['Dealer']['contact_name']?></span>
	<br />
	<label for="address">Address:</label>
	<span id="address"><?=$warranty['Dealer']['address']?></span>
	<br />
	<span id="address2"><?=$warranty['Dealer']['address2']?></span>
	<br />
	<label for="city">City:</label>
	<span id="city"><?=$warranty['Dealer']['city']?></span>
	<br />
	<label for="state">State:</label>
	<span id="state"><?=$warranty['Dealer']['state']?></span>
	<br />
	<label for="zip">Zip:</label>
	<span id="zip"><?=$warranty['Dealer']['zip']?></span>
	<br />
	<label for="phone">Phone:</label>
	<span id="phone"><?=$warranty['Dealer']['phone']?></span>
	<br />
	<label for="email">Email:</label>
	<span id="email"><?=$warranty['Dealer']['email']?></span>

    </div>

    <div class="clear"></div>

    <div class="centered_text" style="padding:15px;">
	<?
	if ($warranty['Warranty']['approved'] == 1)
		echo $this->Html->link('Download PDF', array('controller' => 'warranties', 'action' => 'download', $warranty['Warranty']['id']), array('target' => '_blank'))
	?>
    </div>
</div>

<div class="centered_text" style="margin:15px;">
	<?
	if(($warranty['Warranty']['approved'] == 0) && ($auth['User']['group_id'] == 1)) {
        ?>
        <span style="padding:25px;"><?=$this->Html->link('Approve Glass Protection', array('controller' => 'warranties', 'action' => 'approve', $warranty['Warranty']['id']))?></span>
        <span style="padding:25px;"><?=$this->Html->link('Deny Glass Protection', array('controller' => 'warranties', 'action' => 'deny', $warranty['Warranty']['id']))?></span>
        <?
    } elseif($warranty['Warranty']['approved'] != 0 && $warranty['Warranty']['approved_by'] > 0){
        ?>
        <strong>Warranty was <?=($warranty['Warranty']['approved'] == 1 ? 'approved' : 'denied')?> by <?=$warranty['ApprovedBy']['contact_name']?> on <?=$warranty['Warranty']['approved_date']?></strong>
        <?
    }
    ?>
</div>