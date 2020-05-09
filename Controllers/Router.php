<?php

require_once("Views/View.php");
class Router {
    private $_ctrl;
    private $_view;

    public function routerReq() {
        try {
            //CHARGEMENT AUTOMATIQUE DES CLASS
            spl_autoload_register(function($class) {
                require_once("Models/".$class.".php");
            });

            $url = "";

            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'USER
            if(isset($_GET['url']))
            {
                $url = explode('/',filter_var($_GET["url"],FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "Controllers/".$controllerClass.".php";
                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else {
                    throw new Exception("Page Introuvable");
                }
                
            } else {
                require_once("Controllers/ControllerHome.php");
                $this->_ctrl = new ControllerHome($url);
            }
        }

        //GESTION DES ERREURS
        catch(Exception $e) {
            $errorMsg = $e->getMessage();

            $this->_view = new View("404");
            $this->_view->generateError(array("errorMsg" => $errorMsg));
        }
    }
}