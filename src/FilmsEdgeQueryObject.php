<?php

namespace GraphQL\SchemaObject;

class FilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmsEdge";

    public function selectNode(FilmsEdgeNodeArgumentsObject $argsObject = null)
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
