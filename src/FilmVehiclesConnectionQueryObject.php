<?php

namespace GraphQL\SchemaObject;

class FilmVehiclesConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmVehiclesConnection";

    public function selectPageInfo(FilmVehiclesConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmVehiclesConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmVehiclesEdgeQueryObject("edges");
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

    public function selectVehicles(FilmVehiclesConnectionVehiclesArgumentsObject $argsObject = null)
    {
        $object = new VehicleQueryObject("vehicles");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
