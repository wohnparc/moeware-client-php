<?php

namespace GraphQL\SchemaObject;

class FilmPlanetsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmPlanetsEdge";

    public function selectNode(FilmPlanetsEdgeNodeArgumentsObject $argsObject = null)
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
