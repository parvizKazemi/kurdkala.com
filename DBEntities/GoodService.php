<?php
require_once "../utilities/TableNames.php";
require_once "../services/IGoodService.php";
require_once "BaseEntity.php";

class GoodService extends BaseEntity implements IGoodService
{
    private $groupId;
    private $companyId;
    private $count;
    private $name;
    private $price;
    private $model;
    private $off;
    private $pics;
    private $code;
    private $description;


    function __construct($tbName)
    {
        parent::__construct($tbName);
    }



    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getOff()
    {
        return $this->off;
    }

    /**
     * @param mixed $off
     */
    public function setOff($off)
    {
        $this->off = $off;
    }

    /**
     * @return mixed
     */
    public function getPics()
    {
        return $this->pics;
    }

    /**
     * @param mixed $pics
     */
    public function setPics($pics)
    {
        $this->pics = $pics;
    }

    protected function getEntity($entity)
    {
        $good=new GoodService(\utilities\TableNames::$Good);
        $good->setId($entity->id);
        $good->setGroupId($entity->group_id);
        $good->setCompanyId($entity->company_id);
        $good->setName($entity->name);
        $good->setCount($entity->count);
        $good->setModel($entity->model);
        $good->setOff($entity->off);
        $good->setPics($entity->pics);
        $good->setPrice($entity->price);
        $good->setCode($entity->code);
        $good->setDescription($entity->description);
        return $good;
    }

    protected function getBean($entity)
    {
        $entity->group_id=$this->getGroupId();
        $entity->company_id=$this->getCompanyId();
        $entity->name=$this->getName();
        $entity->count=$this->getCount();
        $entity->model=$this->getModel();
        $entity->off=$this->getOff();
        $entity->pics=$this->getPics();
        $entity->price=$this->getPrice();
        $entity->code=$this->getCode();
        $entity->description=$this->getDescription();
        return $entity;
    }

    public function save()
    {
        $good=new GoodService(\utilities\TableNames::$Good);
        $findedGood=$good->getByProperties(array("code"=>$this->getCode()));
        if($findedGood===false)
            return parent::save();
        $this->setErrorMessage("خطای کد مشابه");
        return false;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    function getLastInsertedGoods($count)
    {
        $fetchedGoods=array();
        $goods=$this->doQueryAndReturn("SELECT  `group`.name AS groupName, good.id, good.name, good.count, good.model, good.off, good.price,good.code  FROM good INNER JOIN `group` ON good.group_id=`group`.id ORDER BY id DESC LIMIT ".$count);

        foreach($goods as $g)
        {
            $good=new GoodService(\utilities\TableNames::$Good);
            $good->setId($g["id"]);
            $good->setCode($g["code"]);
            $good->setName($g["name"]);
            $good->setGroupId($g["groupName"]);
            $good->setModel($g["model"]);
            $good->setOff($g["off"]);
            $good->setPrice($g["price"]);
            $good->setCount($g["count"]);
            array_push($fetchedGoods,$good);
        }
        if(count($fetchedGoods)>0)
            return $fetchedGoods;
        else return false;
    }
}