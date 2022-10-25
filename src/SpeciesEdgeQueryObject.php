<?php

namespace GraphQL\SchemaObject;

class SpeciesEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesEdge";

    public function selectNode(SpeciesEdgeNodeArgumentsObject $argsObject = null)
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
