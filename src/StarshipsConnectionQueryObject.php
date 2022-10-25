<?php

namespace GraphQL\SchemaObject;

class StarshipsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipsConnection";

    public function selectPageInfo(StarshipsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(StarshipsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new StarshipsEdgeQueryObject("edges");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectTotalCount()
    {
        $this->selectField("totalCount");

        return $this;
    }

    public function selectStarships(StarshipsConnectionStarshipsArgumentsObject $argsObject = null)
    {
        $object = new StarshipQueryObject("starships");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
