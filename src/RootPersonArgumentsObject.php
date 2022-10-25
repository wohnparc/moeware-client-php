<?php

namespace GraphQL\SchemaObject;

class RootPersonArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $personID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setPersonID($personID)
    {
        $this->personID = $personID;

        return $this;
    }
}
