<script type="text/javascript" src="http://demos.9lessons.info/reCopy.js"></script> 
<script type="text/javascript"> 
	var ProductCount = 0;

	$(document).ready(function(){
		$('.addLink').click(function() {
			ProductCount++;
			$.get('<?=$html->url(array("controller" => "warranties", "action" => "addProduct"))?>/?counter=' + ProductCount,
				function(data) {
					$('#WarrantyProductList').append(data);
				});
		});
		
	});

	function removeFilm(filmRow) {
		$(filmRow).parent().slideUp(function(){ $(this).remove() });
		return false;
	}
</script> 

<div class="content warranties form" align="center">
    
    <?php
    echo $this->Form->create('Warranty');
    echo $this->Form->hidden('dealer_id', array('value' => $auth['User']['id']));
    echo $this->Form->hidden('installation_type', array('value' => $installation_type));
    ?>

	<fieldset style="width:800px;">
 	   <legend>New <?=$installation_type?> Warranty Application</legend>
	   <table> 
		<tr>
			<td id="WarrantyProductList">
				<div class="WarrantyProduct">
					<strong>Window Direction:</strong> <?=$form->input("WarrantyProduct.0.direction", array('type'=>'select', 'div' => false, 'label'=> false,'options'=>array('North'=>'North','South'=>'South','East'=>'East','West'=>'West'))); ?>
					<br/>
					<strong>Film:</strong> <?=$form->input("WarrantyProduct.0.product_id", array('div' => false, 'label'=> false)); ?>
					<strong>Square Feet:</strong> <?=$form->input("WarrantyProduct.0.square_footage", array('div' => false, 'label'=> false)); ?>
					<strong>Roll Number:</strong> <?=$form->input("WarrantyProduct.0.roll_number", array('div' => false, 'label'=> false)); ?>
					<br />
					<strong>Glass:</strong>
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Single Pane" />Single Pane
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Double Pane" />Double Pane
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Clear" />Clear
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Tinted" />Tinted
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Annealed" />Annealed
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Tempered" />Tempered
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Reflective" />Reflective
					<input type="checkbox" name="data[WarrantyProduct][0][glass][]" value="Low-E" />Low-E
					<br/>
					<strong>Largest Pane:</strong> <?=$form->input("WarrantyProduct.0.largest_pane_x", array('div' => false, 'label'=> false, 'size'=> 4)); ?> X
					<?=$form->input("WarrantyProduct.0.largest_pane_y", array('div' => false, 'label'=> false, 'size'=> 4)); ?> 
					<br/>
					<strong>Shading Percent:</strong> <?=$form->input("WarrantyProduct.0.shading_percent", array('type'=>'select', 'div' => false, 'label'=> false,'options'=>array('0'=>'0','<5'=>'<5','<10'=>'<10','>10'=>'>10','>20'=>'>20','>25'=>'>25'))); ?>
					<br/>
					<strong>Shading Style:</strong> <?=$form->radio("WarrantyProduct.0.shading_style", array('shading1'=>$html->image('shading1.png', array('width'=>'35px')),'shading2'=>$html->image('shading2.png', array('width'=>'35px')),'shading3'=>$html->image('shading3.png', array('width'=>'35px'))), array('default' => 'shading1', 'div' => false, 'legend'=> false, 'label'=> false)); ?>
			</td>
		</tr>
		<tr>
		  <td align="right" style="vertical-align:top;"><?=$html->image('add.gif', array('class' => 'addLink', 'alt'=>'Add Another Film')) ?> Add Another Film
</td>
		</tr>
		<tr> 
		  <td><?php echo $this->Form->input('installation_date', array('type' => 'date'))?></td> 
		</tr>
	  </table> 
	</fieldset>
<?php echo $this->Form->end('Submit', true);?>
</div>