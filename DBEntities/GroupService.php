<?php
require_once "BaseEntity.php";
require_once "../services/IGroupService.php";

class GroupService extends BaseEntity implements IGroupService
{
    private $name;
    private $parentId;
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
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }


    protected function getEntity($entity)
    {
        $group=new GroupService(\utilities\TableNames::$Group);
        $group->setName($entity->name);
        $group->setId($entity->id);
        $group->setParentId($entity->parent_id);
        $group->setIsActive($entity->is_active);
        return $group;
    }

    protected function getBean($entity)
    {
        $entity->name=$this->getName();
        $entity->parent_id=$this->getParentId();
        $entity->is_active=$this->getIsActive();
        return $entity;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}