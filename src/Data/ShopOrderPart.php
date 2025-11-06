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
 *     typeOfDelivery: string,
 *     deliveryCode: string,
 *     positions: list<ShopOrderPositionPayload>,
 *     refunds: list<ShopOrderPositionPayload>
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
     * @param string $typeOfDelivery
     * @param string $deliveryCode
     * @param ShopOrderPosition[] $positions
     * @param ShopOrderPosition[] $refunds
     */
    public function __construct(
        private string $title,
        private int $price,
        private string $deliveryDate,
        private string $typeOfDelivery,
        private string $deliveryCode,
        private array $positions,
        private array $refunds
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getDeliveryDate(): string
    {
        return $this->deliveryDate;
    }

    /**
     * @return string
     */
    public function getTypeOfDelivery(): string
    {
        return $this->typeOfDelivery;
    }

    /**
     * @return string
     */
    public function getDeliveryCode(): string
    {
        return $this->deliveryCode;
    }

    /**
     * @return ShopOrderPosition[]
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @return ShopOrderPosition[]
     */
    public function getRefunds(): array
    {
        return $this->refunds;
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
            $data['typeOfDelivery'],
            $data['deliveryCode'],
            array_map([ShopOrderPosition::class, 'fromArray'], $data['positions']),
            array_map([ShopOrderPosition::class, 'fromArray'], $data['refunds'])
        );
    }

}
