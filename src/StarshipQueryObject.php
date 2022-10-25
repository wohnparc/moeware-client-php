<?php

namespace GraphQL\SchemaObject;

class StarshipQueryObject extends QueryObject
{
    const OBJECT_NAME = "Starship";

    public function selectName()
    {
        $this->selectField("name");

        return $this;
    }

    public function selectModel()
    {
        $this->selectField("model");

        return $this;
    }

    public function selectStarshipClass()
    {
        $this->selectField("starshipClass");

        return $this;
    }

    public function selectManufacturers()
    {
        $this->selectField("manufacturers");

        return $this;
    }

    public function selectCostInCredits()
    {
        $this->selectField("costInCredits");

        return $this;
    }

    public function selectLength()
    {
        $this->selectField("length");

        return $this;
    }

    public function selectCrew()
    {
        $this->selectField("crew");

        return $this;
    }

    public function selectPassengers()
    {
        $this->selectField("passengers");

        return $this;
    }

    public function selectMaxAtmospheringSpeed()
    {
        $this->selectField("maxAtmospheringSpeed");

        return $this;
    }

    public function selectHyperdriveRating()
    {
        $this->selectField("hyperdriveRating");

        return $this;
    }

    public function selectMGLT()
    {
        $this->selectField("MGLT");

        return $this;
    }

    public function selectCargoCapacity()
    {
        $this->selectField("cargoCapacity");

        return $this;
    }

    public function selectConsumables()
    {
        $this->selectField("consumables");

        return $this;
    }

    public function selectPilotConnection(StarshipPilotConnectionArgumentsObject $argsObject = null)
    {
        $object = new StarshipPilotsConnectionQueryObject("pilotConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilmConnection(StarshipFilmConnectionArgumentsObject $argsObject = null)
    {
        $object = new StarshipFilmsConnectionQueryObject("filmConnection");
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
