<?php

namespace GraphQL\SchemaObject;

class RootFilmArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $filmID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setFilmID($filmID)
    {
        $this->filmID = $filmID;

        return $this;
    }
}
