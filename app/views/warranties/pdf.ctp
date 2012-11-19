<table width="75%" border="0" align="center" cellspacing="5" style="font-size:12pt;font-family:Georgia, serif;">
  <tr>
        <td style="text-align:left;"><strong><img src="<?=WWW_ROOT?>/img/Madico_ISO_Logo_Lg.gif"></strong></td>
        <td width="200px" style="text-align:center;font-weight:bold;font-size:14pt;">
            Warranty Number<br />
            <?=$warranty['Warranty']['id']?>
        </td>
  </tr>
  <? 
  $isThermo = false;
  $elements = array();
  foreach($warranty['WarrantyProduct'] as $wp) {
      $product = $wp['Product'];

      if(!in_array($product['warranty_text'], $elements)) {
        $elements[] = $product['warranty_text'];
      }

      $type = strtolower($warranty['Warranty']['installation_type']);
      $duration = $product[$type] == 0 ? 'Lifetime' : $product[$type] . " Year";
      ?>
    <tr>
        <td colspan="2" style="text-align:center;font-weight:bold;font-size:14pt;">
            <?=$duration?> <?=$product['name']?>
            <?
            if($product['glass_' . $type] > 0) {
                echo 'with ' . $product['glass_' . $type] . ' year ';
                if($product['thermosafe'] == 1) {
                    $isThermo = true;
                    echo 'Thermo-Safe ';
                }
                echo 'Glass-Breakage ';
            }
            ?>
            Limited Warranty
        </td>
    </tr>
    <?
  }
  ?>
</table>

<div style="width:75%;font-size:10pt;margin:auto;">
    <?=$this->element('standard')?>
</div>

<div style="page-break-after:always"></div>

<table width="75%" border="0" align="center" cellspacing="5" style="font-family:Georgia, serif;font-size:12pt;page-break-before:auto;">
  <tr>
        <td><strong>CUSTOMER INFORMATION</strong></td>
        <td><strong>DEALER INFORMATION</strong></td>
  </tr>
  <tr>
        <td>
                Name:
                <?php
                if (isset($warranty['Customer']['contact_name']))
                        echo $warranty['Customer']['contact_name'];
                ?>
        </td>
        <td>
                Dealer Name:
                <?php
                if (isset($warranty['Dealer']['business_name']))
                        echo $warranty['Dealer']['business_name'];
                ?>
        </td>
  </tr>
  <tr>
        <td>
                Business Name:
                <?php
                if (isset($warranty['Customer']['business_name']))
                        echo $warranty['Customer']['business_name'];
                ?>
        </td>
        <td>
                Address:
                <?php
                if (isset($warranty['Dealer']['address']))
                        echo $warranty['Dealer']['address'];
                ?>
        </td>
  </tr>
  <tr>
        <td>
                Installation Address:
                <?php
                if (isset($warranty['Customer']['address']))
                        echo $warranty['Customer']['address'];
                ?>
        </td>
        <td>
                <?php
                if (isset($warranty['Dealer']['city']))
                        echo $warranty['Dealer']['city'];
                ?>
                ,
                <?php
                if (isset($warranty['Dealer']['state']))
                        echo $warranty['Dealer']['state'];
                ?>
                <?php
                if (isset($warranty['Dealer']['zip']))
                        echo $warranty['Dealer']['zip'];
                ?>
        </td>
  </tr>
  <tr>
        <td>
                <?php
                if (isset($warranty['Customer']['city']))
                        echo $warranty['Customer']['city'];
                ?>
                ,
                <?php
                if (isset($warranty['Customer']['state']))
                        echo $warranty['Customer']['state'];
                ?>
                <?php
                if (isset($warranty['Customer']['zip']))
                        echo $warranty['Customer']['zip'];
                ?>
        </td>
        <td>
                Location:
                <?php echo $warranty['Warranty']['installation_type']; ?>
        </td>
  </tr>
  <tr>
        <td>
                Customer Phone:
                <?php
                if (isset($warranty['Customer']['phone']))
                        echo $warranty['Customer']['phone'];
                ?>
        </td>
        <td>Installation Date: <?php echo $warranty['Warranty']['installation_date']; ?> </td>
  </tr>
  <tr>
        <td colspan="2"><hr/></td>
  </tr>
  <tr>
        <td colspan="2"><div align="center" style="font-size:10pt;">
            <strong>* Exterior installations must be edge sealed with Dow Corning 795 Silicone Building Sealant or GE Silpruf Building Sealant. No substitutions are permitted without prior approval. Warranty will not be honored unless film has been properly sealed.</strong>
        </div></td>
  </tr>
  <tr>
        <td colspan="2"><div align="center" style="font-size:10pt;">Madico, Inc. | Warranty Department | 64 Industrial Parkway | Woburn, MA 01801</div></td>
  </tr>
</table>

<div style="page-break-after:always"></div>

<?
foreach($elements as $elem) {
	?>
	<div style="width:75%;font-size:10pt;margin:auto;">
		<?=$this->element($elem)?>
	</div>
	<?
}
?>