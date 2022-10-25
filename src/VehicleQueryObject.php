<?php

namespace GraphQL\SchemaObject;

class VehicleQueryObject extends QueryObject
{
    const OBJECT_NAME = "Vehicle";

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

    public function selectVehicleClass()
    {
        $this->selectField("vehicleClass");

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

    public function selectPilotConnection(VehiclePilotConnectionArgumentsObject $argsObject = null)
    {
        $object = new VehiclePilotsConnectionQueryObject("pilotConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilmConnection(VehicleFilmConnectionArgumentsObject $argsObject = null)
    {
        $object = new VehicleFilmsConnectionQueryObject("filmConnection");
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
