<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use Closure;
use DateTimeImmutable;
use Wohnparc\Moeware\Util\Util;

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
        private int    $price,
        private string $deliveryDate,
        private array  $positions
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
     * @param array{
     *     title: string,
     *     price: int,
     *     deliveryDate: string,
     *     positions: array{
     *      positionNumber: int,
     *      uniquePositionNumber: int,
     *      baseID: int,
     *      variantID: int,
     *      quantity: int,
     *      unitPrice: int | null,
     *      status: string,
     *      date: string | null,
     *      dateOfStatus: string | null,
     *      dateOfContract: string | null,
     *      dateOfGoodsReturnedFromCustomer: string | null,
     *      invoiceNumber: string,
     *      dateOfComplaint: string | null,
     *      deliveryNotification: int,
     *      typeOfDelivery: string | null,
     *      deliveryCode: string,
     *      partialDeliveryCode: int,
     *      planningCode: string,
     *      deliveryDateOfContractOfSale: string | null,
     *      dateOfReceipt: string | null,
     *      scheduledDeliveryDate: string | null,
     *      itemText1: string,
     *      itemText2: string,
     *      itemText3: string,
     *      itemTextShop1: string,
     *      itemTextShop2: string,
     *      itemTextShop3: string,
     *      positionText123: string,
     *      trackingNumber1: string | null,
     *      trackingNumber2: string | null,
     *      trackingURL: string | null,
     *     }[],
     * } $data
     *
     * @return static
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
