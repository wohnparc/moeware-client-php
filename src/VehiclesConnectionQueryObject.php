<?php

namespace GraphQL\SchemaObject;

class VehiclesConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "VehiclesConnection";

    public function selectPageInfo(VehiclesConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(VehiclesConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new VehiclesEdgeQueryObject("edges");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectTotalCount()
    {
        $this->selectField("totalCount");

        return $this;
    }

    public function selectVehicles(VehiclesConnectionVehiclesArgumentsObject $argsObject = null)
    {
        $object = new VehicleQueryObject("vehicles");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
