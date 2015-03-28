<?php


#config
require('../config/sysconfig.php');

#autoload
function __autoload($class_name) {

    include('../config/sysconfig.php');


    $objectPaths = array($modelPath,$controllerPath,$viewPath,$pieces);

      foreach($objectPaths as $prefix){
         $path = $prefix . '/' . $class_name . '.php';
         if(file_exists($path)){
            require_once $path;
            return;
          }
       }
}

#propel
require_once('../src/propel.php');

#functional
require '../src/endpoints.class.php';
#template
require '../src/template.php';

#sandbox
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
        $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {

        $paw= new pawPrintMain();
             return $paw->processRequest();

} catch (Exception $e) {
    //echo $e;
    //var_dump($e);
    include ('../errors/500.html');
}

