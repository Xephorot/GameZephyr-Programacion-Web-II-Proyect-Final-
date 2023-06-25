<?php 
class VideoGames extends Controller{
    function __construct()
    {
        parent::__construct();
        $this -> view ->render("videogames/index");
        parent::__construct();
    }
}

?>