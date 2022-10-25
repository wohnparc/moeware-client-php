<?php

namespace GraphQL\SchemaObject;

class PlanetFilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetFilmsEdge";

    public function selectNode(PlanetFilmsEdgeNodeArgumentsObject $argsObject = null)
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
