<?php

namespace GraphQL\SchemaObject;

class SpeciesPeopleEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesPeopleEdge";

    public function selectNode(SpeciesPeopleEdgeNodeArgumentsObject $argsObject = null)
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
