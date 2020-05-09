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

    public function generateLogin($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile("Views/TemplateLogin.php",array("t" => $this->_t,"content" => $content));

        echo $view;
    }

    public function generateNotLogin($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile("Views/TemplateNotLogin.php",array("t" => $this->_t,"content" => $content));

        echo $view;
    }

    public function generateError($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile("Views/TemplateError.php",array("t" => $this->_t,"content" => $content));

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