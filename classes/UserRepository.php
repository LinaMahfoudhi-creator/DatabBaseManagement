<?php
class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('utilisateur');
    }

    public function findById($id, $tablename = 'utilisateur')
    {
        return parent::findById($id, $tablename);
    }

    public function delete($id, $tablename = 'utilisateur')
    {
        return parent::delete($id, $tablename);
    }
    public function getUserByUsernameAndEmail($username, $email)
    {
        $query = "SELECT * FROM utilisateur WHERE username = :username AND email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
