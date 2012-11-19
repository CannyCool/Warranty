<?
echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login'));
?>
    <div id="login" class="content narrow centered centered_text">
        <strong>Thank you for using Madico's online warranty program.</strong>
        <br />
        Already registered? Please sign in here:
        <br /><br />
        <? echo $form->input('email');?>
        <? echo $form->input('password');?>
        <?php echo $form->submit('Login');?>
    </div>
<?php echo $form->end();?>
<br/>
<div align="center">
	New user? Click <?php echo $this->Html->link('here', array('controller' => 'users', 'action' => 'registration')); ?> to register your company. 
</div>