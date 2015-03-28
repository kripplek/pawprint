<?php
require_once 'Api.class.php';
class pawPrintMain extends pawPrintBase
{
    protected $user;

    public function __construct() {
        //login goes here
        $login = new Login;
        //coment out for login disabled
        if(!$login->isValidlogin()){
            //not valid login
            if(isset($_POST['username'])&& isset($_POST['password'])){
                $this->user = $login->login($_POST['username'],$_POST['password']);
            }else{
                //they need the login
                 (new Template)->displayLogin();
            }
        }
        $request = $_SERVER['REQUEST_URI'];
        parent::__construct($request);
    }

 }

?>
