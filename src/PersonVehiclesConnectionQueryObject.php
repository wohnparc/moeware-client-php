<?php

namespace GraphQL\SchemaObject;

class PersonVehiclesConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonVehiclesConnection";

    public function selectPageInfo(PersonVehiclesConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PersonVehiclesConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PersonVehiclesEdgeQueryObject("edges");
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

    public function selectVehicles(PersonVehiclesConnectionVehiclesArgumentsObject $argsObject = null)
    {
        $object = new VehicleQueryObject("vehicles");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
