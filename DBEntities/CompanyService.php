<?php
require_once "../services/ICompanyService.php";
require_once "BaseEntity.php";

/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/8/16
 * Time: 6:01 PM
 */
class CompanyService extends BaseEntity implements ICompanyService
{
    private $name;
    function __construct($tbName)
    {
        parent::__construct($tbName);
    }

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

    protected function getEntity($entity)
    {
        $company=new CompanyService(\utilities\TableNames::$Company);
        $company->setId($entity->id);
        $company->setName($entity->name);
        return $company;
    }

    protected function getBean($entity)
    {
        $entity->name=$this->getName();
        return $entity;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}