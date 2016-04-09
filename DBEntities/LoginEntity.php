<?php
require_once "BaseEntity.php";
require_once "../services/ILoginService.php";
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 10:33 AM
 */
class LoginEntity extends BaseEntity implements ILoginService
{
    private $uName;
    private $pass;
    private $email;
    private $personId;
    private $isActive;

    function __construct($tbName)
    {
        parent::__construct($tbName);
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
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

    //------------------------------------ Getter And Setter --------------------------------------------
    /**
     * @return mixed
     */
    public function getUName()
    {
        return $this->uName;
    }

    /**
     * @param mixed $uName
     */
    public function setUName($uName)
    {
        $this->uName = $uName;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    //----------------------------------- Implemented Functions -----------------------------------------

    protected function getEntity($entity)
    {
        $login=new LoginEntity(utilities\TableNames::$Login);
        $login->setId($entity->id);
        $login->setUName($entity->u_name);
        $login->setPass($entity->pass);
        $login->setEmail($entity->email);
        $login->setPersonId($entity->person_id);
        $login->setIsActive($entity->is_active);
        return $login;
    }

    protected function getBean($entity)
    {
        $entity->u_name=$this->getUName();
        $entity->pass=$this->getPass();
        $entity->email=$this->getEmail();
        $entity->person_id=$this->getPersonId();
        $entity->is_active=$this->getIsActive();
        return $entity;
    }

    function checkLogin($email, $pass)
    {
        return $this->getByProperties(array("email"=>$email,"pass"=>$pass,"is_active"=>1))[0];
    }

    function delete()
    {
        // TODO: Implement delete() method.
    }
}