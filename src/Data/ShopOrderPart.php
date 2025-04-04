<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use Closure;
use DateTimeImmutable;
use Wohnparc\Moeware\Util\Util;

/**
 * @phpstan-import-type ShopOrderPositionPayload from \Wohnparc\Moeware\Data\ShopOrderPosition
 *
 * @phpstan-type ShopOrderPartPayload array{
 *     title: string,
 *     price: int,
 *     deliveryDate: string,
 *     positions: list<ShopOrderPositionPayload>
 * }
 */
final class ShopOrderPart
{
    /**
     * ShopOrderPart constructor.
     *
     * @param string $title
     * @param int $price
     * @param string $deliveryDate
     * @param ShopOrderPosition[] $positions
     */
    public function __construct(
        private string $title,
        private int $price,
        private string $deliveryDate,
        private array $positions
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDeliveryDate(): string
    {
        return $this->deliveryDate;
    }

    /**
     * @return ShopOrderPosition[]
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @phpstan-param ShopOrderPartPayload $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['price'],
            $data['deliveryDate'],
            array_map([ShopOrderPosition::class, 'fromArray'], $data['positions'])
        );
    }

}
