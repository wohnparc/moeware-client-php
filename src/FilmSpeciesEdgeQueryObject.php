<?php

namespace GraphQL\SchemaObject;

class FilmSpeciesEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmSpeciesEdge";

    public function selectNode(FilmSpeciesEdgeNodeArgumentsObject $argsObject = null)
    {
        $object = new SpeciesQueryObject("node");
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
