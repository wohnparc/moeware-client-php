<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;

/**
 * @phpstan-import-type ShopOrderAddressPayload from \Wohnparc\Moeware\Data\ShopOrderAddress
 * @phpstan-type ShopOrderHeadPayload array{
 *     orderID: int,
 *     customerID: int,
 *     dateOfContract: string|null,
 *     billingAddress: ShopOrderAddressPayload,
 *     deliveryAddress?: ShopOrderAddressPayload|null,
 *     delivery?: string|null,
 *     deliveryDate: string,
 *     deliveryTimeRange?: string|null,
 *     deliveryCode: string,
 *     typeOfDelivery?: string|null,
 *     deliveryBlock?: string|null,
 *     deliveryDayTimeCode?: string|null,
 *     complaintCode?: string|null,
 *     status: string,
 *     invoiceAmount: int,
 *     payment: string
 * }
 */
final class ShopOrderHead
{
    /**
     * @param int $orderID
     * @param int $customerID
     * @param ?string $dateOfContract
     * @param ShopOrderAddress $billingAddress
     * @param ShopOrderAddress|null $deliveryAddress
     * @param string|null $delivery
     * @param string $deliveryDate
     * @param string|null $deliveryTimeRange
     * @param string $deliveryCode
     * @param string|null $typeOfDelivery
     * @param string|null $deliveryBlock
     * @param string|null $deliveryDayTimeCode
     * @param string|null $complaintCode
     * @param string $status
     * @param int $invoiceAmount
     * @param string $payment
     */
    public function __construct(
        private int $orderID,
        private int $customerID,
        private ?string $dateOfContract,
        private ShopOrderAddress $billingAddress,
        private ?ShopOrderAddress $deliveryAddress,
        private ?string $delivery,
        private string $deliveryDate,
        private ?string $deliveryTimeRange,
        private string $deliveryCode,
        private ?string $typeOfDelivery,
        private ?string $deliveryBlock,
        private ?string $deliveryDayTimeCode,
        private ?string $complaintCode,
        private string $status,
        private int $invoiceAmount,
        private string $payment
    ) {
    }

    /**
     * @return int
     */
    public function getOrderID(): int
    {
        return $this->orderID;
    }

    /**
     * @return int
     */
    public function getCustomerID(): int
    {
        return $this->customerID;
    }

    /**
     * @return ?string
     */
    public function getDateOfContract(): ?string
    {
        return $this->dateOfContract;
    }

    /**
     * @return ShopOrderAddress
     */
    public function getBillingAddress(): ShopOrderAddress
    {
        return $this->billingAddress;
    }

    /**
     * @return ?ShopOrderAddress
     */
    public function getDeliveryAddress(): ?ShopOrderAddress
    {
        return $this->deliveryAddress;
    }

    /**
     * @return ?string
     */
    public function getDelivery(): ?string
    {
        return $this->delivery;
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
    public function getDeliveryCode(): string
    {
        return $this->deliveryCode;
    }

    /**
     * @return ?string
     */
    public function getTypeOfDelivery(): ?string
    {
        return $this->typeOfDelivery;
    }

    /**
     * @return ?string
     */
    public function getDeliveryBlock(): ?string
    {
        return $this->deliveryBlock;
    }


    /**
     * @return ?string
     */
    public function getDeliveryDayTimeCode(): ?string
    {
        return $this->deliveryDayTimeCode;
    }

    /**
     * @return ?string
     */
    public function getDeliveryTimeRange(): ?string
    {
        return $this->deliveryTimeRange;
    }

    /**
     * @return ?string
     */
    public function getComplaintCode(): ?string
    {
        return $this->complaintCode;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPayment(): string
    {
        return $this->payment;
    }

    /**
     * @return int
     */
    public function getInvoiceAmount(): int
    {
        return $this->invoiceAmount;
    }

    /**
     * @phpstan-param ShopOrderHeadPayload $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['orderID'],
            $data['customerID'],
            $data['dateOfContract'] ?? null,
            ShopOrderAddress::fromArray($data['billingAddress']),
            isset($data['deliveryAddress']) ? ShopOrderAddress::fromArray($data['deliveryAddress']) : null,
            $data['delivery'] ?? null,
            $data['deliveryDate'],
            $data['deliveryTimeRange'] ?? null,
            $data['deliveryCode'],
            $data['typeOfDelivery'] ?? null,
            $data['deliveryBlock'] ?? null,
            $data['deliveryDayTimeCode'] ?? null,
            $data['complaintCode'] ?? null,
            $data['status'],
            $data['invoiceAmount'],
            $data['payment'],
        );
    }
}
