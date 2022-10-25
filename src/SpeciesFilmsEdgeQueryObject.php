<?php

namespace GraphQL\SchemaObject;

class SpeciesFilmsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesFilmsEdge";

    public function selectNode(SpeciesFilmsEdgeNodeArgumentsObject $argsObject = null)
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
