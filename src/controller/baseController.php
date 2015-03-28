<?php

abstract class baseController
{
    public $view;
    private $actionName;
    public $user;
    public function __construct(){
        $this->view = new stdClass();
        
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
        if((strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') ){
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
        

}
