<?php 

class Main extends Controller{
    public $view;
    function __construct(){
        parent:: __construct();
        $this -> view ->render("main/index");
        //echo "<p> Llamaste al controlador main</p>";
        parent::__construct();
    }
    function saludo(){
        echo "llamaste al metodo saludo";
    }
}
?>