<?php

namespace GraphQL\SchemaObject;

class RootQueryObject extends QueryObject
{
    const OBJECT_NAME = "";

    public function selectAllFilms(RootAllFilmsArgumentsObject $argsObject = null)
    {
        $object = new FilmsConnectionQueryObject("allFilms");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectFilm(RootFilmArgumentsObject $argsObject = null)
    {
        $object = new FilmQueryObject("film");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectAllPeople(RootAllPeopleArgumentsObject $argsObject = null)
    {
        $object = new PeopleConnectionQueryObject("allPeople");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectPerson(RootPersonArgumentsObject $argsObject = null)
    {
        $object = new PersonQueryObject("person");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectAllPlanets(RootAllPlanetsArgumentsObject $argsObject = null)
    {
        $object = new PlanetsConnectionQueryObject("allPlanets");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectPlanet(RootPlanetArgumentsObject $argsObject = null)
    {
        $object = new PlanetQueryObject("planet");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectAllSpecies(RootAllSpeciesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesConnectionQueryObject("allSpecies");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectSpecies(RootSpeciesArgumentsObject $argsObject = null)
    {
        $object = new SpeciesQueryObject("species");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectAllStarships(RootAllStarshipsArgumentsObject $argsObject = null)
    {
        $object = new StarshipsConnectionQueryObject("allStarships");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectStarship(RootStarshipArgumentsObject $argsObject = null)
    {
        $object = new StarshipQueryObject("starship");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectAllVehicles(RootAllVehiclesArgumentsObject $argsObject = null)
    {
        $object = new VehiclesConnectionQueryObject("allVehicles");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }

    public function selectVehicle(RootVehicleArgumentsObject $argsObject = null)
    {
        $object = new VehicleQueryObject("vehicle");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);

        return $object;
    }
}
