<?php 
class Signin extends Controller
{
    public $view;
    function __construct(){
        parent::__construct();
        $this->view->render("SignIn/index");
    }
}

?>