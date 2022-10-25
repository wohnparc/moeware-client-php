<?php

namespace GraphQL\SchemaObject;

class FilmQueryObject extends QueryObject
{
    const OBJECT_NAME = "Film";

    public function selectTitle()
    {
        $this->selectField("title");

        return $this;
    }

    public function selectEpisodeID()
    {
        $this->selectField("episodeID");

        return $this;
    }

    public function selectOpeningCrawl()
    {
        $this->selectField("openingCrawl");

        return $this;
    }

    public function selectDirector()
    {
        $this->selectField("director");

        return $this;
    }

    public function selectProducers()
    {
        $this->selectField("producers");

        return $this;
    }

    public function selectReleaseDate()
    {
        $this->selectField("releaseDate");

        return $this;
    }

    public function selectSpeciesConnection(FilmSpeciesConnectionArgumentsObject $argsObject = null)
    {
        $object = new FilmSpeciesConnectionQueryObject("speciesConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectStarshipConnection(FilmStarshipConnectionArgumentsObject $argsObject = null)
    {
        $object = new FilmStarshipsConnectionQueryObject("starshipConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectVehicleConnection(FilmVehicleConnectionArgumentsObject $argsObject = null)
    {
        $object = new FilmVehiclesConnectionQueryObject("vehicleConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectCharacterConnection(FilmCharacterConnectionArgumentsObject $argsObject = null)
    {
        $object = new FilmCharactersConnectionQueryObject("characterConnection");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectPlanetConnection(FilmPlanetConnectionArgumentsObject $argsObject = null)
    {
        $object = new FilmPlanetsConnectionQueryObject("planetConnection");
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
