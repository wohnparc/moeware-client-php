<?php

namespace GraphQL\SchemaObject;

class FilmCharactersConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmCharactersConnection";

    public function selectPageInfo(FilmCharactersConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmCharactersConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmCharactersEdgeQueryObject("edges");
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

    public function selectCharacters(FilmCharactersConnectionCharactersArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("characters");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
