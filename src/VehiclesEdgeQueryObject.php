<?php

namespace GraphQL\SchemaObject;

class VehiclesEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "VehiclesEdge";

    public function selectNode(VehiclesEdgeNodeArgumentsObject $argsObject = null)
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
