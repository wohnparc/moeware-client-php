<?php

namespace GraphQL\SchemaObject;

class FilmVehiclesEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmVehiclesEdge";

    public function selectNode(FilmVehiclesEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new VehicleQueryObject("node");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectCursor()
    {
        $this->selectField("cursor");

        return $this;
    }
}
