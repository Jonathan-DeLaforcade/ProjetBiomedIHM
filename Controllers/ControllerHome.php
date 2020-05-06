<?php

require_once("Views/View.php");

class ControllerHome extends Model {
    private $_UsersManager;
    private $_view;

    public function __construct($url)
    {
        if (isset($url) && !(is_string ($url)) && (count($url) > 1))
        {
            throw new Exception("Page introuvable");
        } else {
            $this->users();
        }
    }

    private function users() 
    {

        $this->_UsersManager = new UsersManager;
        $users = $this->_UsersManager->getUsers();

        $numberModules = $this->getTableLigneNumber("Modules");
        $numberPraticiens = $this->getTableLigneNumber("Praticiens");
        $numberFlash = $this->getNumberTotal("Utilisation","NbFlashs");

        $data = array(
            "Modules" => $numberModules,
            "Praticiens" => $numberPraticiens,
            "Flash" => $numberFlash
        );

        $this->_view = new View('Home');
        $this->_view->generate(
            array(
                'users' => $users, 
                'stats' => $data
            )
        );
    }
}
