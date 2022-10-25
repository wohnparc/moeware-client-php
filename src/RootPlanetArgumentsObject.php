<?php

namespace GraphQL\SchemaObject;

class RootPlanetArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $planetID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setPlanetID($planetID)
    {
        $this->planetID = $planetID;

        return $this;
    }
}
