<?php

namespace GraphQL\SchemaObject;

class SpeciesPeopleConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "SpeciesPeopleConnection";

    public function selectPageInfo(SpeciesPeopleConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(SpeciesPeopleConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesPeopleEdgeQueryObject("edges");
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

    public function selectPeople(SpeciesPeopleConnectionPeopleArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("people");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
