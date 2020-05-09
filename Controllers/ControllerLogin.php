<?php

require_once("Views/View.php");

class ControllerLogin extends Model {
    private $_view;

    public function __construct($url)
    {
        if (isset($url) && !(is_string ($url)))
        {
            throw new Exception("Page introuvable");
        } else {
            $this->login();
        }
    }

    private function login() 
    {

        //$this->_UsersManager = new UsersManager;
        //$users = $this->_UsersManager->getUsers();

        //$numberModules = $this->getTableLigneNumber("Modules");
        //$numberPraticiens = $this->getTableLigneNumber("Praticiens");
        //$numberFlash = $this->getNumberTotal("Utilisation","NbFlashs");

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
