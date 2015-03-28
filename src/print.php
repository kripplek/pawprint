<?PHP
/**
 *@author Kyle Sorrels <kyle@kylesorrels.com>
 *@package pawPrint MVC
 *@license GPLv3
 */

abstract class pawPrintBase
{
    protected $method = '';
    protected $endpoint = '';
    protected $args = array();
    protected $file = Null;

    public function __construct($request) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Authorization: Basic YWRtaW46MTIzNDU=");
        require('../config/sysconfig.php');
        $this->user = $_SESSION['user'];

       //prioritize redirects
        if(isset($_SESSION['redirect']))  {
            $request= $_SESSION['redirect'];
            unset($_SESSION['redirect']);
        }
        $this->args = explode('/', rtrim($request, '/'));
       // do simple routing. default is /home/index
        $this->endpoint = $this->_sanitize( ( !isset($this->args[1]) || is_null($this->args[1]) )?'home':$this->args[1] );
        $this->action =$this->_sanitize( ( !isset($this->args[2]) || is_null($this->args[0]))?'index':$this->args[2] );
        $this->query=$_GET;
        $this->file = file_get_contents("php://input");

    }

    public function processRequest() {
        //default to home
        //one final sanitizaion. don't allow base routing.
        if($this->endpoint == 'base' || $this->action == 'base' ){
            $this->endpoint = "home";
            $this->action = 'index';
        }
        $className = $this->endpoint.'Controller';
        $action = $this->action .'Action';
        $viewPath = $this->viewPath.'/'.$this->endpoint .'/'.$this->action.'.php';

        if (class_exists($className) ){
            $controller = new $className;

            if(method_exists($controller,$action)){

                //checks were made, lets build the project
                //send the user to the controller
                $controller->setUser($this->user);
                $controller->{$action}($this->args);
                $project = new Template($controller->getView());
                // ajax modee or no?
                return $project->display($viewPath);
            }
        }
        //else end point doesnt exist
        return Template::render404();
    }


    private function _sanitize($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_sanitize($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

}
