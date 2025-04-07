<?php
class Etudiant
{
    private int $student_id;
    private string $name;
    private $birthday;
    private $image;
    private int $section_id;

    public function __construct($student_id, $name, $birthday, $image, $section_id)
    {
        $this->student_id = $student_id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->section_id = $section_id;
    }
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            if ($property != 'image') {
                return $this->$property;
            }
            return base64_encode($this->$property);
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
