<?php
require_once "../services/IGoodDetailService.php";
require_once "../utilities/TableNames.php";
require_once "BaseEntity.php";

class GoodDetailService extends BaseEntity implements IGoodDetailService
{
    private $detailId;
    private $goodId;
    private $value;

    function __construct($tbName)
    {
        parent::__construct($tbName);
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

    /**
     * @return mixed
     */
    public function getGoodId()
    {
        return $this->goodId;
    }

    /**
     * @param mixed $goodId
     */
    public function setGoodId($goodId)
    {
        $this->goodId = $goodId;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function getEntity($entity)
    {
        $goodDetail=new GoodDetailService(\utilities\TableNames::$GoodDetail);
        $goodDetail->setId($entity->id);
        $goodDetail->setDetailId($entity->detail_id);
        $goodDetail->setGoodId($entity->good_id);
        $goodDetail->setValue($entity->value);
        return $goodDetail;
    }

    protected function getBean($entity)
    {
        $entity->detail_id=$this->getDetailId();
        $entity->good_id=$this->getGoodId();
        $entity->value=$this->getValue();
        return $entity;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}