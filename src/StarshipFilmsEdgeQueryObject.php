<?php

namespace GraphQL\SchemaObject;

class StarshipFilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipFilmsEdge";

    public function selectNode(StarshipFilmsEdgeNodeArgumentsObject $argsObject = null)
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
