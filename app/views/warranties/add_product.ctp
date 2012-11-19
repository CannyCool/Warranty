<div class="WarrantyProduct">
	<strong>Window Direction:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".direction", array('type'=>'select', 'div' => false, 'label'=> false,'options'=>array('North'=>'North','South'=>'South','East'=>'East','West'=>'West'))); ?>
	<br/>
	<strong>Film:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".product_id", array('div' => false, 'label'=> false)); ?>
	<strong>Square Feet:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".square_footage", array('div' => false, 'label'=> false)); ?>
	<strong>Roll Number:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".roll_number", array('div' => false, 'label'=> false)); ?>
	<br />
	<strong>Glass:</strong>
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Single Pane" />Single Pane
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Double Pane" />Double Pane
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Clear" />Clear
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Tinted" />Tinted
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Annealed" />Annealed
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Tempered" />Tempered
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Reflective" />Reflective
	<input type="checkbox" name="data[WarrantyProduct][<?=$this->getVar('counter')?>][glass][]" value="Low-E" />Low-E
	<br/>
	<strong>Largest Pane:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".largest_pane_x", array('div' => false, 'label'=> false, 'size'=> 4)); ?> X
	<?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".largest_pane_y", array('div' => false, 'label'=> false, 'size'=> 4)); ?>
	<br/>
	<strong>Shading Percent:</strong> <?=$form->input("WarrantyProduct." . $this->getVar('counter') . ".shading_percent", array('type'=>'select', 'div' => false, 'label'=> false,'options'=>array('0'=>'0','<5'=>'<5','<10'=>'<10','>10'=>'>10','>20'=>'>20','>25'=>'>25'))); ?>
	<br/>
	<strong>Shading Style:</strong> <?=$form->radio("WarrantyProduct." . $this->getVar('counter') . ".shading_style", array('shading1'=>$html->image('shading1.png', array('width'=>'35px')),'shading2'=>$html->image('shading2.png', array('width'=>'35px')),'shading3'=>$html->image('shading3.png', array('width'=>'35px'))), array('default' => 'shading1', 'div' => false, 'legend'=> false, 'label'=> false)); ?>
	<?=$html->image('remove.gif', array('class' => 'removeLink', 'alt'=>'Remove Film', 'onclick' => 'removeFilm(this);')) ?>
</div>