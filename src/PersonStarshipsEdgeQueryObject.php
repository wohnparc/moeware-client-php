<?php

namespace GraphQL\SchemaObject;

class PersonStarshipsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonStarshipsEdge";

    public function selectNode(PersonStarshipsEdgeNodeArgumentsObject $argsObject = null)
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
