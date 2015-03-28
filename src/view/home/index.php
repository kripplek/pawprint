<?php

$listWidget = new widget;
$listWidget->setColumn(5)
            ->setTheme()
            ->setTitle('Your Doors')
            ->setContents($this->test);
echo $listWidget->render();

$string = '';
foreach($this->list as $door){
    //var_dump($door);
    echo '</br>';
}



