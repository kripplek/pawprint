<?PHP

/**
 * @package stanley
 */

class Message {
    public static function create($mess){
        // just make divs for them. You could pull a partial if you wanted to.
        // keep it simple.
        $string='<div class="alert '.Message::classChooser($mess[1]).'">
            '.$mess[0].'
            </div>';

        return $string;
    }
    public static function classChooser($status){
        // expects error,info,success
        // you could add more.
        $error = ['error'=>'alert-error','info'=>'alert-primary','success'=>'alert-success'];
        //defaults to info.
        return (isset($error[$status]))? $error[$status] : $error['info'] ;
    }

}
