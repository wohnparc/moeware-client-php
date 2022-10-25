<?php

namespace GraphQL\SchemaObject;

class StarshipPilotsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "StarshipPilotsConnection";

    public function selectPageInfo(StarshipPilotsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(StarshipPilotsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new StarshipPilotsEdgeQueryObject("edges");
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

    public function selectPilots(StarshipPilotsConnectionPilotsArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("pilots");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
