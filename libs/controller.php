<?php 
class Controller{
    public $view;
    function __construct(){
        //echo "<p>Controlador Base</p>";
        $this->view = new View(); //Objecto Vista
    }
}

?>