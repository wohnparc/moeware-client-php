<?php

namespace GraphQL\SchemaObject;

class VehiclePilotsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "VehiclePilotsConnection";

    public function selectPageInfo(VehiclePilotsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(VehiclePilotsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new VehiclePilotsEdgeQueryObject("edges");
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

    public function selectPilots(VehiclePilotsConnectionPilotsArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("pilots");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
