<?php 
class Venta extends Controller {
    function __construct(){
        echo "Llamaste a venta";
        parent::__construct();
    }
    function registrar(){
        echo "<p> se ha registrado una venta</p>";
        parent::__construct();
    }
}

?>