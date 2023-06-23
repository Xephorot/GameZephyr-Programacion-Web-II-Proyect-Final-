<?php 
class Login extends Controller
{
    public $view;
    function __construct(){
        parent::__construct();
        $this->view->render("login/index");
        //echo"<p>Login</p>";
    }
}

?>