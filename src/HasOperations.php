<?php

namespace Ferdiunal\History;

trait HasOperations
{
    /**
     * Get all of the agent's operations.
     */
    public function operations()
    {
        return $this->morphMany(config('history.model'), 'user');
    }
}
