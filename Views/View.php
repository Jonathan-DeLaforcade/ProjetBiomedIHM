<?php

class View 
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'Views/View'.$action.".php";
        $this->_t = $action;
    }

    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile("Views/Template.php",array("t" => $this->_t,"content" => $content));

        echo $view;
    }

    private function generateFile($file, $data)
    {
        if (file_exists($file))
        {
            extract($data);

            ob_start();
            require($file);
            return ob_get_clean();
        } else {
            throw new Exception("Fichier ".$file." Introuvable");
        }
    }
}