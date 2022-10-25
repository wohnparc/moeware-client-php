<?php

namespace GraphQL\SchemaObject;

class PlanetQueryObject extends QueryObject
{
    const OBJECT_NAME = "Planet";

    public function selectName()
    {
        $this->selectField("name");

        return $this;
    }

    public function selectDiameter()
    {
        $this->selectField("diameter");

        return $this;
    }

    public function selectRotationPeriod()
    {
        $this->selectField("rotationPeriod");

        return $this;
    }

    public function selectOrbitalPeriod()
    {
        $this->selectField("orbitalPeriod");

        return $this;
    }

    public function selectGravity()
    {
        $this->selectField("gravity");

        return $this;
    }

    public function selectPopulation()
    {
        $this->selectField("population");

        return $this;
    }

    public function selectClimates()
    {
        $this->selectField("climates");

        return $this;
    }

    public function selectTerrains()
    {
        $this->selectField("terrains");

        return $this;
    }

    public function selectSurfaceWater()
    {
        $this->selectField("surfaceWater");

        return $this;
    }

    public function selectResidentConnection(PlanetResidentConnectionArgumentsObject $argsObject = null)
    {
        $object = new PlanetResidentsConnectionQueryObject("residentConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilmConnection(PlanetFilmConnectionArgumentsObject $argsObject = null)
    {
        $object = new PlanetFilmsConnectionQueryObject("filmConnection");
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
