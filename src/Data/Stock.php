<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTime;
use Wohnparc\Moeware\Util\Util;

final class Stock {

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

    /**
     * Stock constructor.
     *
     * @param Location $location
     * @param int $quantity
     * @param DateTime|null $expectedAt
     */
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
