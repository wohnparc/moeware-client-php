<?php

namespace GraphQL\SchemaObject;

class SpeciesQueryObject extends QueryObject
{
    const OBJECT_NAME = "Species";

    public function selectName()
    {
        $this->selectField("name");

        return $this;
    }

    public function selectClassification()
    {
        $this->selectField("classification");

        return $this;
    }

    public function selectDesignation()
    {
        $this->selectField("designation");

        return $this;
    }

    public function selectAverageHeight()
    {
        $this->selectField("averageHeight");

        return $this;
    }

    public function selectAverageLifespan()
    {
        $this->selectField("averageLifespan");

        return $this;
    }

    public function selectEyeColors()
    {
        $this->selectField("eyeColors");

        return $this;
    }

    public function selectHairColors()
    {
        $this->selectField("hairColors");

        return $this;
    }

    public function selectSkinColors()
    {
        $this->selectField("skinColors");

        return $this;
    }

    public function selectLanguage()
    {
        $this->selectField("language");

        return $this;
    }

    public function selectHomeworld(SpeciesHomeworldArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("homeworld");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectPersonConnection(SpeciesPersonConnectionArgumentsObject $argsObject = null)
    {
        $object = new SpeciesPeopleConnectionQueryObject("personConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilmConnection(SpeciesFilmConnectionArgumentsObject $argsObject = null)
    {
        $object = new SpeciesFilmsConnectionQueryObject("filmConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectCreated()
    {
        $this->selectField("created");

        return $this;
    }

    public function selectEdited()
    {
        $this->selectField("edited");

        return $this;
    }

    public function selectId()
    {
        $this->selectField("id");

        return $this;
    }
}
