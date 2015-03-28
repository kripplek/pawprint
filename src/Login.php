<?php

/**
 * @author kyle s <kyle@kylesorrels.com>
 * @package pawPrint
 */

class Login
{
    public function __construct(){
        
    }
    public static function isValidSession(){
         
    }
    public static function logout(){
        #logout
            unset ($_POST);
            session_unset();
    }
    private function setValidLogin($user){
        
        $_SESSION['name']=$user->getUsername();
        $_SESSION['userDetails']= $user->toArray();
        $_SESSION['login']="true";
        $_SESSION['time']=time();
        $_SESSION['expires']=time() + (120*60); //2 hours times sixty seconds. = session expires in 2 hours. 
        $_SESSION['user']= $user;
        $_SESSION['messages']= array();

    }
    public function login($user,$pass =null){
        
        $user = UsersQuery::create()->filterByUsername($user)->findOne();
        //make sure we have a user
        if (!method_exists($user,'getEmail')){
            $error = 'Not a valid user, use your email';
        }else{
             if ($user->verifyPassword($pass)){
                $this->setValidLogin($user);
            }else{
                $error = 'Not a valid password';
            }
        }
        if(isset($error)){
            Template::displayLogin($error);
            exit;
        }
        $this->setValidLogin($user);
        return $user;
    }
    public function isValidLogin(){
       if((isset($_SESSION['login']))
         &&($_SESSION['login']==true)
         &&($_SESSION['expires']>time())
         ){
            return true;
        }else{
            //lets unset everything
            return false;
        }
    }
}
