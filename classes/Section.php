<?php
class Section
{
    private int $section_id;
    private string $designation;
    private string $description;
    public function __construct($id, $designation, $description)
    {
        $this->section_id = $id;
        $this->designation = $designation;
        $this->description = $description;
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
