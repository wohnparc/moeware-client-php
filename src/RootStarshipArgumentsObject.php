<?php

namespace GraphQL\SchemaObject;

class RootStarshipArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $starshipID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setStarshipID($starshipID)
    {
        $this->starshipID = $starshipID;

        return $this;
    }
}
