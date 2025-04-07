<?php
class EtudiantRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('student');
    }

    public function findById($id, $tablename = 'student')
    {
        return parent::findById($id, $tablename);
    }

    public function delete($id, $tablename = 'student')
    {
        return parent::delete($id, 'student');
    }
    public function findBySectionId($id, $tablename = 'student')
    {
        $query = "SELECT * from {$this->tableName} where section_id = :id";

        $response = $this->db->prepare($query);
        $response->execute(['id' => $id]);

        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function update($id, $params)
    {
        $set = [];
        foreach ($params as $key => $value) {
            $set[] = "$key = :$key";
        }
        $setString = implode(", ", $set);
        $query = "UPDATE {$this->tableName} SET $setString WHERE student_id = :id";

        $params['id'] = $id;
        $response = $this->db->prepare($query);
        return $response->execute($params);
    }
}
