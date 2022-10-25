<?php

namespace GraphQL\SchemaObject;

class VehicleFilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "VehicleFilmsEdge";

    public function selectNode(VehicleFilmsEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("node");
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
