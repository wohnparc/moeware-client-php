<?php

namespace GraphQL\SchemaObject;

class StarshipFilmsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipFilmsConnection";

    public function selectPageInfo(StarshipFilmsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(StarshipFilmsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new StarshipFilmsEdgeQueryObject("edges");
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

    public function selectFilms(StarshipFilmsConnectionFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("films");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
