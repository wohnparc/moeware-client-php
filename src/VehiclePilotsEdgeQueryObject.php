<?php

namespace GraphQL\SchemaObject;

class VehiclePilotsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "VehiclePilotsEdge";

    public function selectNode(VehiclePilotsEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("node");
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
