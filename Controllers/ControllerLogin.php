<?php

require_once("Views/View.php");

class ControllerLogin extends Model {
    private $_view;

    public function __construct($url)
    {
        if (isset($url) && !(is_string ($url)) && (count($url) > 1))
        {
            throw new Exception("Page introuvable");
        } else {
            $this->login();
        }
    }

    private function login() 
    {

        $data = array(
            "Modules" => 0,
            "Praticiens" => 0,
            "Flash" => 0
        );

        $this->_view = new View('Login');
        $this->_view->generateNotLogin(
            array(
                'users' => [], 
                'stats' => $data
            )
        );
    }
}
