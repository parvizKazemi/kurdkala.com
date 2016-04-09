<?php
require_once "../database/rbInit.php";

/**
 * Created by PhpStorm.
 * User: parviz
 * Date: 4/5/16
 * Time: 9:29 AM
 */
abstract class BaseEntity
{
    private $tableName="";
    private $id;
    function __construct($tbName)
    {
        $this->setTableName($tbName);
    }

    protected abstract function getEntity($entity);
    protected abstract function getBean($entity);
    public abstract function delete();

    private function setTableName($tbName)
    {
        $this->tableName=$tbName;
    }
    public function getTableName()
    {
        return $this->tableName;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAll()
    {
        $entities=array();
        $result=R::findAll($this->getTableName());
        if(is_array($result) && count($result)>0) {
            foreach ($result as $entity)
                array_push($entities, $this->getEntity($entity));

            return $entities;
        }
        else
            return false;
    }

    public function getById($id)
    {
        $result=R::load($this->getTableName(),$id);
        if($result!=null)
            return $this->getEntity($result);
        else
            return false;
    }

    public function getByProperties(array $prop)
    {
        $entities=array();
        $sql="";
        $arrayCount=count($prop);
        $values=array();
        foreach($prop as $key => $value)
        {
            $sql.= "$key=? ";
            array_push($values,$value);
            if($arrayCount>1)
                $sql.="and ";
            $arrayCount--;
        }

        $result=R::find($this->getTableName(),$sql,$values);
        if(is_array($result) && count($result)>0) {
            foreach ($result as $entity)
                array_push($entities, $this->getEntity($entity));

            return $entities;
        }
        else
            return false;
    }

    public function getOneByProperties(array $prop)
    {
        $entities=array();
        $sql="";
        $arrayCount=count($prop);
        $values=array();
        foreach($prop as $key => $value)
        {
            $sql.= "$key=? ";
            array_push($values,$value);
            if($arrayCount>1)
                $sql.="and ";
            $arrayCount--;
        }

        $sql.=" LIMIT 1";

        $result=R::find($this->getTableName(),$sql,$values);
        if(is_array($result) && count($result)>0) {
            foreach ($result as $entity)
                array_push($entities, $this->getEntity($entity));

            return $entities;
        }
        else
            return false;
    }

    public function save()
    {
        $entity=R::dispense($this->getTableName());
        $id=R::store($this->getBean($entity));
        if($id!=null && $id>0)
        {
            $this->setId($id);
            return true;
        }else
            return false;
    }

    public function doQuery($query)
    {
        return R::exec($query);
    }



    public function edit()
    {
        $entity=R::load($this->getTableName(),$this->getId());
        $id=R::store($this->getBean($entity));
        if($id==$this->getId())
            return true;
        else
            return false;
    }


}