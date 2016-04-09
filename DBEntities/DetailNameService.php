<?php
require_once "BaseEntity.php";
require_once "../services/IDetailNameService.php";

class DetailNameService extends BaseEntity implements IDetailNameService
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
        $detailName=new DetailNameService(\utilities\TableNames::$DetailName);
        $detailName->setId($entity->id);
        $detailName->setName($entity->name);
        return $detailName;
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

    function singleInstaceSave()
    {
        $detailName=$this->getOneByProperties(array("name"=>$this->getName()));
        if($detailName!=false)
            return $detailName;

        return parent::save();
    }
}