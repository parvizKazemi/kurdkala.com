<?php
require_once "BaseEntity.php";
require_once "./services/ILoginService.php";
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

    function __construct($tbName)
    {
        parent::__construct($tbName);
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
        return $login;
    }

    protected function getBean($entity)
    {
        $entity->u_name=$this->getUName();
        $entity->pass=$this->getPass();
        return $entity;
    }

    function checkLogin($uName, $pass)
    {
        return $this->getByProperties(array("u_name"=>$uName,"pass"=>$pass))[0];
    }
}