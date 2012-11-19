<div class="content narrow left">
    Welcome <strong><?=$user['User']['business_name']?></strong>!
    <br /><br />
    <label for="contact_name">Contact Name:</label>
    <span id="contact_name"><?=$user['User']['contact_name']?></span>
    <br />
    <label for="address">Address:</label>
    <span id="address"><?=$user['User']['address']?></span>
    <br />
    <span id="address2"><?=$user['User']['address2']?></span>
    <br />
    <label for="city">City:</label>
    <span id="city"><?=$user['User']['city']?></span>
    <br />
    <label for="state">State:</label>
    <span id="state"><?=$user['User']['state']?></span>
    <br />
    <label for="zip">Zip:</label>
    <span id="zip"><?=$user['User']['zip']?></span>
    <br />
    <label for="phone">Phone:</label>
    <span id="phone"><?=$user['User']['phone']?></span>
    <br />
    <label for="email">Email:</label>
    <span id="email"><?=$user['User']['email']?></span>

    <div style="text-align:right;">
        <? echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit')); ?>
    </div>
</div>

<div class="content wide right centered_text">
    <?php echo $this->Html->link('New Residential Application', array('controller' => 'warranties','action' => 'add', 'Residential')); ?>
    |
    <?php echo $this->Html->link('New Commercial Application', array('controller' => 'warranties','action' => 'add', 'Commercial')); ?>
</div>