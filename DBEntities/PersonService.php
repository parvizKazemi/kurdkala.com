<?php
require_once "../utilities/TableNames.php";
require_once "../services/IPersonService.php";
require_once "BaseEntity.php";

class PersonService extends BaseEntity implements IPersonService
{
    private $name;
    private $family;
    private $phoneNumber;

    function __construct($tbName)
    {
        parent::__construct($tbName);
    }

    //--------------------------------------- Getters And Setters ----------------------------
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param mixed $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    //----------------------------------------------------------------------------------------------

    protected function getEntity($entity)
    {
        $person=new PersonService(\utilities\TableNames::$Person);
        $person->setName($entity->name);
        $person->setFamily($entity->family);
        $person->setPhoneNumber($entity->phone_number);
        return $person;
    }

    protected function getBean($entity)
    {
        $entity->name=$this->getName();
        $entity->family=$this->getFamily();
        $entity->phone_number=$this->getPhoneNumber();
        return $entity;
    }

    public function delete()
    {
        $deleteQuery="delete * from ".$this->getTableName()." where id=".$this->getId();
        $this->doQuery($deleteQuery);
    }
}