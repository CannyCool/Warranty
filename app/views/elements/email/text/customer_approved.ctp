<?=$warranty['Customer']['contact_name']?>,
    We have approved glass protection for your warranty (#<?=$warranty['Warranty']['id']?>).
    You can download your warranty documents at:
    http://www.broadsidetech.com<?=$this->Html->url(array('controller' => 'warranties', 'action' => 'download', $warranty['Warranty']['id']))?>

    Thank you again for choosing Madico window films.

    Madico, Inc
    Warranty Department