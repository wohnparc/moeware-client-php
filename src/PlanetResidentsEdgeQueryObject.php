<?php

namespace GraphQL\SchemaObject;

class PlanetResidentsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetResidentsEdge";

    public function selectNode(PlanetResidentsEdgeNodeArgumentsObject $argsObject = null)
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
