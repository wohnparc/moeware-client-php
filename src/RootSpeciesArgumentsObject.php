<?php

namespace GraphQL\SchemaObject;

class RootSpeciesArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $speciesID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setSpeciesID($speciesID)
    {
        $this->speciesID = $speciesID;

        return $this;
    }
}
