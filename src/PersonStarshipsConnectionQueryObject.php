<?php

namespace GraphQL\SchemaObject;

class PersonStarshipsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PersonStarshipsConnection";

    public function selectPageInfo(PersonStarshipsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PersonStarshipsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PersonStarshipsEdgeQueryObject("edges");
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

    public function selectStarships(PersonStarshipsConnectionStarshipsArgumentsObject $argsObject = null)
    {
        $object = new StarshipQueryObject("starships");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
