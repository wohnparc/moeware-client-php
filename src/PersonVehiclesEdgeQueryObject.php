<?php

namespace GraphQL\SchemaObject;

class PersonVehiclesEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonVehiclesEdge";

    public function selectNode(PersonVehiclesEdgeNodeArgumentsObject $argsObject = null)
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
