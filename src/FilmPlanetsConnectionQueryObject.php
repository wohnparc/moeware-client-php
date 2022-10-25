<?php

namespace GraphQL\SchemaObject;

class FilmPlanetsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmPlanetsConnection";

    public function selectPageInfo(FilmPlanetsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmPlanetsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmPlanetsEdgeQueryObject("edges");
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

    public function selectPlanets(FilmPlanetsConnectionPlanetsArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("planets");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
