<?php

class User {
    private $_id;
    private $_Mail;
    private $_Password;
    private $_Role;


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


    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setMail($mail)
    {
        if (is_string($mail))
        {
            $this->_Mail = $mail;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password))
        {
            $this->_Password = $password;
        }
    }

    public function setRole($role)
    {
        $role = (int) $role;
        if ($role >= 0)
        {
            $this->_Role = $role;
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getMail()
    {
        return $this->_Mail;
    }

    public function getPassword()
    {
        return $this->_Password;
    }

    public function getRole()
    {
        return $this->_Role;
    }
}