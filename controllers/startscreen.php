<?php 
class StartScreen extends Controller
{
    public $view;
    function __construct(){
        parent::__construct();
        $this->view->render("startscreen/index");
    }
}

?>