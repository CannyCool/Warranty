<script type="text/javascript">
function onEnter(){
	if(event.keyCode==13)
		openWarranty();
	}
</script>
<div class="left">
    <div class="content narrow centered_text">
        Welcome <strong><?=$auth['User']['contact_name']?></strong>!
        <br /><br />
        <strong>Warranty Number:</strong>
        <br />
        <input type="text" id="warranty_search" style="width:100px;" onkeypress="onEnter();">
        <br />
        <input type="button" value="Search" onClick="openWarranty();">
    </div>

    <div class="content narrow" style="margin-top:10px;">
        <h2>Latest Dealers</h2>
        <table cellpadding="0" cellspacing="0" width="95%">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Contact</th>
            </tr>
            <?
            $i = 0;

            foreach($dealers as $dealer) {
                $class = 'hoverable';
                if ($i++ % 2 == 0) {
                    $class .= ' altrow';
                }
                ?>
                <tr class="<?=$class?>" onclick="window.location = '<?=$html->url(array("controller" => "users", "action" => "view", $dealer['User']['id']))?>';">
                    <td><?=$this->Time->timeAgoInWords($dealer['User']['created'])?></td>
                    <td><?=$dealer['User']['business_name']?></td>
                    <td><?=$dealer['User']['contact_name']?></td>
                </tr>
                <?
            }
            ?>
        </table>
    </div>
</div>

<div class="content wide right">
    <h2>Warranties to Approve</h2>
    <table cellpadding="0" cellspacing="0" width="95%">
	<tr>
            <th>Number</th>
            <th>Date</th>
            <th>Dealer</th>
            <th>Customer</th>
            <th>Type</th>
	</tr>
	<?php
	$i = 0;
	foreach ($needApproval as $warranty):
		$class = 'hoverable';
		if ($i++ % 2 == 0) {
			$class .= ' altrow';
		}
            ?>
            <tr class="<?=$class?>" onclick="window.location = '<?=$html->url(array("controller" => "warranties", "action" => "view", $warranty['Warranty']['id']))?>';">
                <td style="text-align:right;padding-right:10px;">
                    <?=$html->link($warranty['Warranty']['id'],array('controller' => 'warranties', 'action' => 'view', $warranty['Warranty']['id']))?>
                </td>
                <td><?php echo $warranty['Warranty']['installation_date']; ?>&nbsp;</td>
		<td><?php echo $warranty['Dealer']['email']; ?>&nbsp;</td>
		<td><?php echo $warranty['Customer']['email']; ?>&nbsp;</td>
		<td><?php echo $warranty['Warranty']['installation_type']; ?>&nbsp;</td>
            </tr>
	<?php endforeach; ?>
    </table>
</div>