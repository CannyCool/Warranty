<?=$warranty['Dealer']['contact_name']?>,
    We have approved glass protection for warranty number <?=$warranty['Warranty']['id']?> for your customer <?=$warranty['Customer']['contact_name']?>.
    You can download the warranty documents at:
    <?=$this->Html->url(array('controller' => 'warranties', 'action' => 'download', $warranty['Warranty']['id']))?>

    Thank you again for choosing Madico window films.

    Madico, Inc
    Warranty Department