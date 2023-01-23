<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

abstract class Query
{
    /**
     * Query constructor.
     *
     * @param GraphQLError[] $errors
     */
    protected function __construct(
        protected array $errors
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * Returns the errors of the query response.
     *
     * @return GraphQLError[]
     */
    final public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    final public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }
}
