<?php

namespace GraphQL\SchemaObject;

class PersonQueryObject extends QueryObject
{
    const OBJECT_NAME = "Person";

    public function selectName()
    {
        $this->selectField("name");

        return $this;
    }

    public function selectBirthYear()
    {
        $this->selectField("birthYear");

        return $this;
    }

    public function selectEyeColor()
    {
        $this->selectField("eyeColor");

        return $this;
    }

    public function selectGender()
    {
        $this->selectField("gender");

        return $this;
    }

    public function selectHairColor()
    {
        $this->selectField("hairColor");

        return $this;
    }

    public function selectHeight()
    {
        $this->selectField("height");

        return $this;
    }

    public function selectMass()
    {
        $this->selectField("mass");

        return $this;
    }

    public function selectSkinColor()
    {
        $this->selectField("skinColor");

        return $this;
    }

    public function selectHomeworld(PersonHomeworldArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("homeworld");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilmConnection(PersonFilmConnectionArgumentsObject $argsObject = null)
    {
        $object = new PersonFilmsConnectionQueryObject("filmConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectSpecies(PersonSpeciesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesQueryObject("species");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectStarshipConnection(PersonStarshipConnectionArgumentsObject $argsObject = null)
    {
        $object = new PersonStarshipsConnectionQueryObject("starshipConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectVehicleConnection(PersonVehicleConnectionArgumentsObject $argsObject = null)
    {
        $object = new PersonVehiclesConnectionQueryObject("vehicleConnection");
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
