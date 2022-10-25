<?php

namespace GraphQL\SchemaObject;

class FilmsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmsConnection";

    public function selectPageInfo(FilmsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmsEdgeQueryObject("edges");
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

    public function selectFilms(FilmsConnectionFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("films");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
