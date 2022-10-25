<?php

namespace GraphQL\SchemaObject;

class PersonFilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonFilmsEdge";

    public function selectNode(PersonFilmsEdgeNodeArgumentsObject $argsObject = null)
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
