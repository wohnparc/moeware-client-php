<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Location
{
    /**
     * Location constructor.
     *
     * @param string $code
     * @param int $number
     */
    public function __construct(
        private string $code,
        private int $number,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     code: string,
     *     number: int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string)($data['code']),
            (int)($data['number'])
        );
    }
}
