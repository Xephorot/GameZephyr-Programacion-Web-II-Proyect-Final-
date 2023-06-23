<?php 
class Users extends Controller{
    function __construct()
    {
        parent::__construct();
        $this -> view ->render("users/index");
        parent::__construct();
    }
}

?>