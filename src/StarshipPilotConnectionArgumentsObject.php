<?php

namespace GraphQL\SchemaObject;

class StarshipPilotConnectionArgumentsObject extends ArgumentsObject
{
    protected $after;
    protected $first;
    protected $before;
    protected $last;

    public function setAfter($after)
    {
        $this->after = $after;

        return $this;
    }

    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    public function setBefore($before)
    {
        $this->before = $before;

        return $this;
    }

    public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }
}
