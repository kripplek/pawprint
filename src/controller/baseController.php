<?php

abstract class baseController
{
    private $method;
    public $view;
    private $actionName;
    public $user;
    public function __construct(){
        $this->view = new stdClass();
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
    public function getPostVar($var){
        return (isset($_POST[$var]) )? $_POST[$var] : false;
    }
    public function setUser($user){
        $this->user=$user;
    }
    public function getUrl(){
        return $SERVER;
    }
    public function getView(){
        return $this->view;
    }
    public function getParam($param = 'id'){
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        if(is_array($uri)){
            $place = array_search($param,$uri);
            return $uri[$place+1];
        }
    }
    public function isPost(){
        if( $this->getRequestMethod() == 'POST') {
            return true;
        }
        return false;
    }
    public function addMessage($mess,$status){
       array_push( $_SESSION['messages'], [$mess,$status]);
    }
    public function redirect($uri){
        $_SESSION['redirect']= $uri;
    }
    public function getRequestMethod(){
        return $this->method;
    }


}
