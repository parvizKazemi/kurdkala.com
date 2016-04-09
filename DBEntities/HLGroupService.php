<?php
require_once "../utilities/TableNames.php";
require_once "../services/IHLGroupDetailService.php";
require_once "DetailNameService.php";

class HLGroupService extends DetailNameService implements IHLGroupDetailService
{

    protected function getEntity($entity)
    {
        $detailName=new HLGroupService(\utilities\TableNames::$DetailName);
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

    function getDetailNameByGroupId($gid)
    {
        $sql = 'SELECT detailname.id,detailname.name FROM detailname INNER JOIN groupdetail ON detailname.id=groupdetail.detail_id WHERE groupdetail.group_id=?';
        $rows=R::getAll($sql,[$gid]);
        $detailNames=array();
        foreach($rows as $row)
        {
            $detailName=new DetailNameService(\utilities\TableNames::$DetailName);
            $detailName->setId($row["id"]);
            $detailName->setName($row["name"]);
            array_push($detailNames,$detailName);
        }

        if(count($detailNames)>0)
            return $detailNames;
        return false;
    }
}