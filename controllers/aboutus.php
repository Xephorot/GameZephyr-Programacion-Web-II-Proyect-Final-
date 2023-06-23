<?php 
class AboutUs extends Controller
{
    public $view;
    function __construct(){
        parent::__construct();
        $this->view->render("aboutus/index");
    }
}

?>