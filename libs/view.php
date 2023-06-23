<?php 
class View{
    function __construct(){
        //echo "<p>Vista Base</p>";
    }
    //Funcion que llama a la vista respectiva
    function render($nombre){
        $ruta = "views/".$nombre.".php";
        //echo $ruta;
        require $ruta;
        //require "views/".$nombre."/index";
    }
}
?>