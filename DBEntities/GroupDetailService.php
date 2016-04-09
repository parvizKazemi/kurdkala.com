<?php
require_once "BaseEntity.php";
require_once "../services/IGroupDetailService.php";
/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/7/16
 * Time: 12:59 PM
 */
class GroupDetailService extends BaseEntity implements IGroupDetailService
{
    private $groupId;
    private $detailId;

    function __construct($tbName)
    {
        parent::__construct($tbName);
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param mixed $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return mixed
     */
    public function getDetailId()
    {
        return $this->detailId;
    }

    /**
     * @param mixed $detailId
     */
    public function setDetailId($detailId)
    {
        $this->detailId = $detailId;
    }

    protected function getEntity($entity)
    {
        $groupDetail=new GroupDetailService(\utilities\TableNames::$GroupDetail);
        $groupDetail->setId($entity->id);
        $groupDetail->setGroupId($entity->group_id);
        $groupDetail->setDetailId($entity->detail_id);
        return $groupDetail;
    }

    protected function getBean($entity)
    {
        $entity->group_id=$this->getGroupId();
        $entity->detail_id=$this->getDetailId();
        return $entity;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}