<?php 
    class App{
        function __construct()
        {
            //echo"<p>Mi aplicacion MVC de WEB II";
            // Lógica en la URL
            $url = isset($_GET['url']) ? $_GET['url'] : 'main';
            $url = explode("/", $url);

            //echo "<br>";
            //echo "<br>";
            //echo $url[0];
            //echo "<br>";
            //echo "<br>";
            //Llamamos al controlador
            $rute = "controllers/".$url[0].".php";
            //echo "Ruta: ".$rute;
            //echo "<br>";
            if(file_exists(($rute))){
                require_once $rute;
                $c = new $url[0];
                //Procesamos el metodo
                if(isset($url[1])){
                    if(method_exists($c, $url[1])){
                        $c -> {$url[1]}();
                    }
                    else{
                        //echo "<p style='color: red'>El Metodo ".$url[1]." no existe</p>";
                    }
                }
            }
            else{
                //Crear Controladores de Errores
                require_once "controllers/errores.php";
                $e = new Errores();
            }

        }
    }

?>