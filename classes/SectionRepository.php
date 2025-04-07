<?php
class SectionRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('section');
    }

    public function findById($id, $tablename = 'section')
    {
        return parent::findById($id, $tablename);
    }

    public function delete($id, $tablename = 'section')
    {
        return parent::delete($id, 'section');
    }
}
