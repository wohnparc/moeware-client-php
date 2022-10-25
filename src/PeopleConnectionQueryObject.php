<?php

namespace GraphQL\SchemaObject;

class PeopleConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PeopleConnection";

    public function selectPageInfo(PeopleConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PeopleConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PeopleEdgeQueryObject("edges");
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

    public function selectPeople(PeopleConnectionPeopleArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("people");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
