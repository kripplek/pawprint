<?php

$status = array('success'=>'alert-success','error'=>'alert-danger');

foreach($this->messages as $message):
?>
    <div class="alert <?php echo $status[$message[1]]?>">
        <?php echo $message[0];?> 
    </div>

<?php endforeach;?>
