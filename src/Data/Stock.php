<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTime;
use Wohnparc\Moeware\Util\Util;

final class Stock {

    /**
     * Stock constructor.
     *
     * @param Location $location
     * @param int $quantity
     * @param DateTime|null $expectedAt
     */
    private function __construct(
        private Location $location,
        private int $quantity,
        private ?DateTime $expectedAt,
    ) {}

    //
    // -- GETTER
    //

    /**
     * Returns the location of the stock element.
     *
     * @return Location
     */
    public function getLocation(): Location {
        return $this->location;
    }

    /**
     * Returns the quantity of the stock element.
     *
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the expected arrival (at warehouse) date of the stock element.
     *
     * @return DateTime|null
     */
    public function getExpectedAt(): ?DateTime {
        return $this->expectedAt;
    }

    //
    // -- HELPER
    //

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
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

    /**
     * @return callable
     */
    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
