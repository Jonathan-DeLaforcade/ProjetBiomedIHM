<?php
class UsersManager extends Model {
    public function getUsers()
    {
        $this->getBdd();
        return $this->getAll('User','User');
    }
}