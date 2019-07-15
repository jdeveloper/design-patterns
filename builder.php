<?php

class Person
{
    public $employed;
    public $gender;
    const GENDER_MALE   = "Male";
    const GENDER_FEMALE = "Female"; 
}

interface PersonBuilderInterface
{
    public function setGender();
    public function setEmployed();
    public function getResult();
}

class EmployedMaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_MALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = true;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}
 
class UnemployedMaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_MALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = false;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}

class PersonDirector
{
    public function build(PersonBuilderInterface $builder)
    {
        $builder->setGender();
        $builder->setEmployed();
 
        return $builder->getResult();
    }
}

$director                = new PersonDirector();
$employedMaleBuilder     = new EmployedMaleBuilder();
$unemployedMaleBuilder   = new UnemployedMaleBuilder();
 
/**
 * object(Person)#3 (2) {
 * (
 *   ["employed"] => bool(true)
 *   ["gender"] => string(4) "Male"
 * )
 */
$employedMale     = $director->build($employedMaleBuilder);
 
/**
 * object(Person)#5 (2) {
 * (
 *   ["employed"] => bool(false)
 *   ["gender"] => string(4) "Male"
 * )
 */
$unemployedMale   = $director->build($unemployedMaleBuilder);