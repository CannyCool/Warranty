<div class="content centered">

    <h2>Confirm Warranty #<?=$data['Warranty']['id']?></h2>

    <div style="float:left;width:425px;">
	<h3>Installation</h3>
	<br />
	<label for="installation_type">Installation Type:</label>
	<span id="installation_type"><?=$data['Warranty']['installation_type']?></span>
	<br />
	<label for="installation_date">Installation Date:</label>
	<span id="installation_date"><?=$data['Warranty']['installation_date']?></span>
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

            <? foreach($data['WarrantyProduct'] as $film) { ?>
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
	<h3>Customer Information - <a href="/madico/warranties/customer/<?=$data['Warranty']['id']?>">Edit</a></h3>
	<br />
	<label for="business_name">Business Name:</label>
	<span id="business_name"><?=$data['Customer']['business_name']?></span>
	<br />
	<label for="contact_name">Contact Name:</label>
	<span id="contact_name"><?=$data['Customer']['contact_name']?></span>
	<br />
	<label for="address">Address:</label>
	<span id="address"><?=$data['Customer']['address']?></span>
	<br />
	<span id="address2"><?=$data['Customer']['address2']?></span>
	<br />
	<label for="city">City</label>
	<span id="city"><?=$data['Customer']['city']?></span>
	<br />
	<label for="state">State:</label>
	<span id="state"><?=$data['Customer']['state']?></span>
	<br />
	<label for="zip">Zip:</label>
	<span id="zip"><?=$data['Customer']['zip']?></span>
	<br />
	<label for="phone">Phone:</label>
	<span id="phone"><?=$data['Customer']['phone']?></span>
	<br />
	<label for="email">Email:</label>
	<span id="email"><?=$data['Customer']['email']?></span>
</div>

<div style="float:right;width:425px;margin-top:15px;">
	<h3>Dealer Information - <a href="/madico/profiles/edit/<?=$data['Dealer']['id']?>?warranty_id=<?=$data['Warranty']['id']?>">Edit</a></h3>
        <br />
	<label for="business_name">Business Name:</label>
	<span id="business_name"><?=$data['Dealer']['business_name']?></span>
	<br />
	<label for="contact_name">Contact Name:</label>
	<span id="contact_name"><?=$data['Dealer']['contact_name']?></span>
	<br />
	<label for="address">Address:</label>
	<span id="address"><?=$data['Dealer']['address']?></span>
	<br />
	<span id="address2"><?=$data['Dealer']['address2']?></span>
	<br />
	<label for="city">City:</label>
	<span id="city"><?=$data['Dealer']['city']?></span>
	<br />
	<label for="state">State:</label>
	<span id="state"><?=$data['Dealer']['state']?></span>
	<br />
	<label for="zip">Zip:</label>
	<span id="zip"><?=$data['Dealer']['zip']?></span>
	<br />
	<label for="phone">Phone:</label>
	<span id="phone"><?=$data['Dealer']['phone']?></span>
	<br />
	<label for="email">Email:</label>
	<span id="email"><?=$data['Dealer']['email']?></span>

    </div>

    <div class="clear"></div>

    <div class="centered_text" style="padding:15px;">
	<?php echo $html->link('Confirm', '/warranties/process/' . $data['Warranty']['id']); ?>
    </div>
</div>