<?php

namespace GraphQL\SchemaObject;

class SpeciesFilmsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesFilmsConnection";

    public function selectPageInfo(SpeciesFilmsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(SpeciesFilmsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesFilmsEdgeQueryObject("edges");
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

    public function selectFilms(SpeciesFilmsConnectionFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("films");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
