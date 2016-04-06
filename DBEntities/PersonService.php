<?php
require_once "./utilities/TableNames.php";
require_once "./services/IPersonService.php";
require_once "BaseEntity.php";
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 8:02 PM
 */
class PersonService extends BaseEntity implements IPersonService
{
    private $name;
    private $family;
    private $email;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
        $person->setEmail($entity->email);
        $person->setPhoneNumber($entity->phone_number);
        return $person;
    }

    protected function getBean($entity)
    {
        $entity->name=$this->getName();
        $entity->family=$this->getFamily();
        $entity->email=$this->getEmail();
        $entity->phone_number=$this->getPhoneNumber();
        return $entity;
    }
}