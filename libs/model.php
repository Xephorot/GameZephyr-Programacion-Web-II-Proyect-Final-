<?php
require_once 'libs/database.php';

class Model {
    protected $db;
    protected $model;

    function __construct() {
        //echo "<p>Modelo Base</p>";
        $this->db = new Database();
    }

    function loadModel($model) {
        $url = 'models/' . $model . 'model.php';
        if (file_exists($url)) {
            require_once $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }
}
?>
