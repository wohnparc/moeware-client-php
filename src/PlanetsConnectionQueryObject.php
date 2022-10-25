<?php

namespace GraphQL\SchemaObject;

class PlanetsConnectionQueryObject extends QueryObject
{
    const OBJECT_NAME = "PlanetsConnection";

    public function selectPageInfo(PlanetsConnectionPageInfoArgumentsObject $argsObject = null)
    {
        $object = new PageInfoQueryObject("pageInfo");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectEdges(PlanetsConnectionEdgesArgumentsObject $argsObject = null)
    {
        $object = new PlanetsEdgeQueryObject("edges");
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

    public function selectPlanets(PlanetsConnectionPlanetsArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("planets");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
