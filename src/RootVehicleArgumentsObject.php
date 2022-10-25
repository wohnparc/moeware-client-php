<?php

namespace GraphQL\SchemaObject;

class RootVehicleArgumentsObject extends ArgumentsObject
{
    protected $id;
    protected $vehicleID;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setVehicleID($vehicleID)
    {
        $this->vehicleID = $vehicleID;

        return $this;
    }
}
