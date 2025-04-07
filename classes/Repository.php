<?php
abstract class Repository
{
    protected $db;
    public function __construct(protected $tableName)
    {
        $this->db = ConnexionBD::getInstance();
    }
    public function findAll()
    {
        $query = "SELECT * from {$this->tableName}";

        $response = $this->db->query($query);

        $elements = $response->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }
    public function findById($id, $tablename)
    {
        $query = "SELECT * from {$this->tableName} where {$tablename}_id = :id";

        $response = $this->db->prepare($query);
        $response->execute(['id' => $id]);

        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function delete($id, $tablename)
    {
        $query = "DELETE FROM {$this->tableName} where {$tablename}_id = :id";

        $response = $this->db->prepare($query);
        $response->execute(['id' => $id]);
        //resetting auto_increment
        $resetQuery = "SELECT MAX({$tablename}_id) AS max_id FROM {$this->tableName}";
        $maxId = $this->db->query($resetQuery)->fetch(PDO::FETCH_OBJ)->max_id;

        if ($maxId !== null) {
            $alterQuery = "ALTER TABLE {$this->tableName} AUTO_INCREMENT = " . ($maxId + 1);
            $this->db->exec($alterQuery);
        }
    }
    public function create($params)
    {
        $keys = array_keys($params);

        $keyString = implode(",", $keys);

        $paramselements = array_fill(0, count($keys), '?');
        $paramString = implode(",", $paramselements);
        $request = "INSERT INTO $this->tableName (`{$this->tableName}_id`, $keyString) VALUES (NULL, $paramString);";
        $reponse = $this->db->prepare($request);
        $reponse->execute(array_values($params));
        return $reponse->fetch(PDO::FETCH_OBJ);
    }
}
