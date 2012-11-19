<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title_for_layout?></title>
		<link type="image/png" href="http://www.madico.com/images/FavIcon.png" rel="shortcut icon"/> 
		<? echo $html->css('style.css'); ?> 
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Include external files and scripts here (See HTML helper for more info.) -->
        <?php echo $scripts_for_layout ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
		<script type="text/javascript">

                    $(document).ready(function() {
                        $('tr.hoverable').hover(function(){
                            $(this).addClass('activerow');
                        }, function() {
                            $(this).removeClass('activerow');
                        });
                    });

                    function openWarranty(){
				var warranty_id = document.getElementById('warranty_search');
				<?php
				if (strpos($this->params['url']['url'], "/") === false)
						echo 'window.location = "warranties/view/"+warranty_id.value;';
				else {
					if (strpos($this->params['url']['url'], "warranties/") === false)
						echo 'window.location = "../warranties/view/"+warranty_id.value;';
					else if (strpos($this->params['url']['url'], "warranties/view/") === false)
						echo ';window.location = "../warranties/view/"+warranty_id.value;';
					else
						echo ';window.location = +warranty_id.value;';
				}
				?>
			}
		</script>
    </head>
    <body>
        <div id="header_wrapper">
            <div id="header"></div>
	</div>
        <?php
        if($auth != null) {
        ?>
        <div id="menu">
            <div class="menu_item"><?php echo $this->Html->link('Home', array('controller' => 'users','action' => 'loginRedirect')); ?></div>
            <?
            if($auth['User']['group_id'] == 1) {
                ?>
                <div class="menu_item"><?php echo $this->Html->link('Browse Dealers', array('controller' => 'users', 'action' => 'dealers')); ?></div>
                <div class="menu_item"><?php echo $this->Html->link('Create User', array('controller' => 'users', 'action' => 'add')); ?></div>
                <?
            }
            if($auth['User']['group_id'] < 3) {
                ?>
                <div class="menu_item"><?php echo $this->Html->link('Browse Warranties', array('controller' => 'warranties', 'action' => 'index')); ?> </div>
                <?
            }
            ?>
            <div class="menu_item"><?=$this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'edit'))?></div>
            <div class="menu_item right"><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?> </div>
            <div class="clear"></div>
        </div>
        <?php
        }
        ?>
        <div class="clear"></div>

        <div class="container">
            <?php echo $session->flash(); ?>

            <!-- Here's where I want my views to be displayed -->
            <?php echo $content_for_layout ?>

            <div class="clear"></div>
        </div>

        <div id="footer">
            &copy;2010 <?=Configure::read('Company.name')?> | <?=Configure::read('Company.address')?>
        </div>
    </body>
</html>