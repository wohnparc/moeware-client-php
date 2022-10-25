<?php

namespace GraphQL\SchemaObject;

class PeopleEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PeopleEdge";

    public function selectNode(PeopleEdgeNodeArgumentsObject $argsObject = null)
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
