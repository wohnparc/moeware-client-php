<?php

namespace GraphQL\SchemaObject;

class PlanetResidentsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetResidentsConnection";

    public function selectPageInfo(PlanetResidentsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PlanetResidentsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PlanetResidentsEdgeQueryObject("edges");
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

    public function selectResidents(PlanetResidentsConnectionResidentsArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("residents");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
