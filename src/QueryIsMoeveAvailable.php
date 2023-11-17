<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

final class QueryIsMoeveAvailable extends Query
{
    /**
     * @param bool $isMoeveAvailable
     */
    public function __construct(
        private bool $isMoeveAvailable
    ) {
        parent::__construct([]);
    }

    /**
     * @param array<array{
     *     message: string,
     *     path: string[],
     * }> $errors
     *
     * @return static
     */
    public static function withErrors(array $errors): self
    {
        $self = new self(false);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

    /**
     * @return bool
     */
    public function isMoeveAvailable(): bool
    {
        return $this->isMoeveAvailable;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     isMoeveAvailable: bool,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self($data['isMoeveAvailable']);
    }

    /**
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query isMoeveAvailable {
          isMoeveAvailable
        }
        GQL;
    }

    /**
     * @return array{}|null
     */
    public static function variables(): ?array
    {
        return null;
    }
}
