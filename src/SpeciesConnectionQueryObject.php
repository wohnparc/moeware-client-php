<?php

namespace GraphQL\SchemaObject;

class SpeciesConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesConnection";

    public function selectPageInfo(SpeciesConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(SpeciesConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesEdgeQueryObject("edges");
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

    public function selectSpecies(SpeciesConnectionSpeciesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesQueryObject("species");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
