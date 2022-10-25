<?php

namespace GraphQL\SchemaObject;

class PlanetsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetsEdge";

    public function selectNode(PlanetsEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("node");
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
