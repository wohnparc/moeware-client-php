<?php

namespace GraphQL\SchemaObject;

class FilmStarshipsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmStarshipsConnection";

    public function selectPageInfo(FilmStarshipsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmStarshipsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmStarshipsEdgeQueryObject("edges");
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

    public function selectStarships(FilmStarshipsConnectionStarshipsArgumentsObject $argsObject = null)
    {
        $object = new StarshipQueryObject("starships");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
