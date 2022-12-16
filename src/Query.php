<?php

namespace Wohnparc\Moeware;

abstract class Query {

    /**
     * @var GraphQLError[]
     */
    protected array $errors;

    /**
     * Query constructor.
     *
     * @param GraphQLError[] $errors
     */
    protected function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    //
    // -- GETTER
    //

    /**
     * Returns the errors of the query response.
     *
     * @return GraphQLError[]
     */
    final public function getErrors(): array {
        return $this->errors;
    }

    final public function hasErrors(): bool {
        return count($this->errors) > 0;
    }

}
