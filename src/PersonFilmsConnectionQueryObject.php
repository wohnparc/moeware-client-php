<?php

namespace GraphQL\SchemaObject;

class PersonFilmsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonFilmsConnection";

    public function selectPageInfo(PersonFilmsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PersonFilmsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PersonFilmsEdgeQueryObject("edges");
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

    public function selectFilms(PersonFilmsConnectionFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("films");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
