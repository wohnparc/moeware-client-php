<?php

namespace GraphQL\SchemaObject;

class FilmCharactersEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmCharactersEdge";

    public function selectNode(FilmCharactersEdgeNodeArgumentsObject $argsObject = null)
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
