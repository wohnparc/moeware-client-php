<?php

namespace GraphQL\SchemaObject;

class StarshipPilotsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipPilotsEdge";

    public function selectNode(StarshipPilotsEdgeNodeArgumentsObject $argsObject = null)
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
