<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTime;
use DateTimeImmutable;
use Wohnparc\Moeware\Util\Util;

final class Stock
{
    /**
     * Stock constructor.
     *
     * @param Location $location
     * @param int $quantity
     * @param DateTimeImmutable|null $expectedAt
     */
    private function __construct(
        private Location $location,
        private int $quantity,
        private ?DateTimeImmutable $expectedAt,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * Returns the location of the stock element.
     *
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * Returns the quantity of the stock element.
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Returns the expected arrival (at warehouse) date of the stock element.
     *
     * @return DateTimeImmutable|null
     */
    public function getExpectedAt(): ?DateTimeImmutable
    {
        return $this->expectedAt;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     location: array{
     *         code: string,
     *         number: int,
     *     },
     *     quantity: int,
     *     expectedAt: ?string,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            Location::fromArray($data['location']),
            (int) ($data['quantity']),
            (
                isset($data['expectedAt'])
        ? Util::fromRawDate((string) $data['expectedAt'])
        : null
            ),
        );
    }

}
