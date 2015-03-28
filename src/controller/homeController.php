<?php
/**
*@author kyle s <kyle@kylesorrels.com>
*
*/
class homeController extends baseController 
{
    public function __construct(){
        parent::__construct();
    } 

    public function indexAction(){
        $this->view->test = "index";
    }



}
