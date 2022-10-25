<?php

namespace GraphQL\SchemaObject;

class FilmStarshipsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmStarshipsEdge";

    public function selectNode(FilmStarshipsEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new StarshipQueryObject("node");
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
