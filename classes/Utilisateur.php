<?php
class Utilisateur
{
    private $utilisateur_id;
    private $username;
    private $email;
    private $role;

    public function __construct($id, $name, $email, $role)
    {
        $this->utilisateur_id = $id;
        $this->username = $name;
        $this->email = $email;
        $this->role = $role;
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
