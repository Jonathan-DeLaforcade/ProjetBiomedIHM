<?php
abstract class Bdd {
    private static $_bdd;

    protected static function setBdd() {
        self::$_bdd = new mysqli('vps779296.ovh.net', 'projetbts', 'btssnir/sql', 'ProjetBIOMED');
    }

    public function getBdd()
    {
        if(self::$_bdd == null)
        {
            $this->setBdd();
        }
        return self::$_bdd;
    }


}
