<?php

class baseView
{
    public function __construct($params){
         foreach($vars as $var){
            $this->{$var} = $var;
         }
    }
    public function displayView($viewtext){
        echo $viewText;   
    }
    


}
