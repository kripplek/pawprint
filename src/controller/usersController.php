<?php


/**
 * @author Kyle S <kyle@kylesorrel.com>
 *
 */

class usersController extends baseController
{
    public function __construct(){
        parent::__construct();
        $this->view->pageName = "Users";
    }
    public function indexAction(){
        //configure breadcrumbs
        $this->view->subtitle = "Available Users";

    }
    public function newAction(){
        $this->view->subtitle = "Create a New User";

        if($this->isPost()){
            //save and stuff
        }
    }
}
