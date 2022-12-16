<?php

namespace Wohnparc\Moeware\Data;

use DateTime;
use Wohnparc\Moeware\Util\Util;

class Stock {

    /**
     * @var Location
     */
    private Location $location;

    /**
     * @var int
     */
    private int $quantity;

    /**
     * @var DateTime|null
     */
    private ?DateTime $expectedAt;

    private function __construct(Location $location, int $quantity, ?DateTime $expectedAt) {
        $this->location = $location;
        $this->quantity = $quantity;
        $this->expectedAt = $expectedAt;
    }

    /**
     * Returns the location of the stock element.
     *
     * @return Location
     */
    final public function getLocation(): Location {
        return $this->location;
    }

    /**
     * Returns the quantity of the stock element.
     *
     * @return int
     */
    final public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the expected arrival (at warehouse) date of the stock element.
     *
     * @return DateTime|null
     */
    final public function getExpectedAt(): ?DateTime {
        return $this->expectedAt;
    }

    public static function fromArray(array $data): self {
        return new self(
            Location::fromArray($data['location'] ?? []),
            (int)($data['quantity'] ?? 0),
            (
                isset($data['expectedAt'])
                    ? Util::fromRawDate((string)$data['expectedAt'])
                    : null
            ),
        );
    }

    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
