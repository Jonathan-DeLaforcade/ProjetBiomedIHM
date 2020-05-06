<?php

class Machine {
    private $_Numero_Serie;
    private $_Marque;
    private $_Modele;
    private $_Date_Mise_En_Service;


    public function __construct(array $data) 
    {
        $this->hydrate($data);   
    }


    public function hydrate(array $data) 
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) 
            {
                $this->$method($value);
            }
        }
    }


    public function setNumero_Serie($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_Numero_Serie = $id;
        }
    }

    public function setMarque($marque)
    {
        if (is_string($marque))
        {
            $this->_Marque = $marque;
        }
    }

    public function setModele($model)
    {
        if (is_string($model))
        {
            $this->_Modele = $model;
        }
    }

    public function setDate_Mise_En_Service($dms)
    {
        
        $this->_Date_Mise_En_Service = $dms;
    }

    public function getMarque()
    {
        return $this->_Marque;
    }
}