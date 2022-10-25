<?php

namespace GraphQL\SchemaObject;

class PlanetFilmsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetFilmsConnection";

    public function selectPageInfo(PlanetFilmsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PlanetFilmsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PlanetFilmsEdgeQueryObject("edges");
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

    public function selectFilms(PlanetFilmsConnectionFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("films");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
