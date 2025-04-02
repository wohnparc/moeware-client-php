<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopOrderData
{
    /**
     * ShopOrderData constructor.
     *
     * @param ShopOrderHead $head
     * @param ShopOrderPart[] $parts
     */
    public function __construct(
        private ShopOrderHead $head,
        private array $parts
    ) {
    }

    /**
     * @return ShopOrderHead
     */
    public function getHead(): ShopOrderHead
    {
        return $this->head;
    }

    /**
     * @return ShopOrderPart[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @param array{
     *     head: array{
     *         orderID: int,
     *         customerID: int,
     *         dateOfContract: string,
     *         billingAddress: array{
     *             name: string,
     *             email: string,
     *             country: string,
     *             postCode: string,
     *             city: string,
     *             street: string,
     *             houseNumber: string,
     *             floor: string,
     *         },
     *         deliveryAddress: array{
     *             name: string,
     *             email: string,
     *             country: string,
     *             postCode: string,
     *             city: string,
     *             street: string,
     *             houseNumber: string,
     *             floor: string,
     *         } | null,
     *         delivery: string | null,
     *         deliveryDate: string,
     *         deliveryTimeRange: string | null,
     *         deliveryCode: string,
     *         typeOfDelivery: string | null,
     *         deliveryBlock: string | null,
     *         deliveryDayTimeCode: string | null,
     *         complaintCode: string | null,
     *         status: string,
     *         invoiceAmount: int,
     *         payment: string,
     *     },
     *     parts: array{
     *         title: string,
     *         price: int,
     *         deliveryDate: string,
     *         positions: array{
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
     *     }[],
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            ShopOrderHead::fromArray($data['head']),
            array_map([ShopOrderPart::class, 'fromArray'], $data['parts'])
        );
    }
}
