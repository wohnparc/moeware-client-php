<?php

namespace GraphQL\SchemaObject;

class StarshipsEdgeQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipsEdge";

    public function selectNode(StarshipsEdgeNodeArgumentsObject $argsObject = null)
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
