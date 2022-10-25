<?php

namespace GraphQL\SchemaObject;

class FilmSpeciesConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "FilmSpeciesConnection";

    public function selectPageInfo(FilmSpeciesConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(FilmSpeciesConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new FilmSpeciesEdgeQueryObject("edges");
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

    public function selectSpecies(FilmSpeciesConnectionSpeciesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesQueryObject("species");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
