<?php
echo $session->flash('auth');
echo $this->Form->create('User', array('action' => 'login'));
?>
    <div class="login form content narrow centered" align="center">
		<legend style="width:250px;">Login</legend><br/> 
		<? echo $form->input('email');?>
		<? echo $form->input('password');?>
		<?php echo $form->submit('Login');?>
    </div>
<?php echo $form->end();?>
<br/>
<div align="center">
	<?php echo $this->Html->link('Dealer Registration', array('controller' => 'users', 'action' => 'registration')); ?>
</div>