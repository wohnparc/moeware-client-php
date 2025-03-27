<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use Wohnparc\Moeware\Util\Util;

final class ShopOrderHead
{
    /**
     * ShopOrderHead constructor.
     *
     * @param int $orderID
     * @param int $customerID
     * @param ?DateTimeImmutable $dateOfContract
     * @param ShopOrderAddress $billingAddress
     * @param ?ShopOrderAddress $deliveryAddress
     * @param ?string $delivery
     * @param string $deliveryDate
     * @param string $deliveryCode
     * @param ?string $typeOfDelivery
     * @param ?string $deliveryBlock
     * @param ?string $deliveryDayTimeCode
     * @param ?string $deliveryTimeRange
     * @param ?string $complaintCode
     * @param string $status
     * @param string $payment
     * @param int $invoiceAmount
     */
    public function __construct(
        private int $orderID,
        private int $customerID,
        private ?DateTimeImmutable $dateOfContract,
        private ShopOrderAddress $billingAddress,
        private ?ShopOrderAddress $deliveryAddress,
        private ?string $delivery,
        private string $deliveryDate,
        private string $deliveryCode,
        private ?string $typeOfDelivery,
        private ?string $deliveryBlock,
        private ?string $deliveryDayTimeCode,
        private ?string $deliveryTimeRange,
        private ?string $complaintCode,
        private string $status,
        private string $payment,
        private int $invoiceAmount,
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
     * @return ?DateTimeImmutable
     */
    public function getDateOfContract(): ?DateTimeImmutable
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
     * @param array{
     *     orderID: int,
     *     customerID: int,
     *     dateOfContract: string,
     *     billingAddress: array{
     *         name: string,
     *         email: string,
     *         country: string,
     *         postCode: string,
     *         city: string,
     *         street: string,
     *         houseNumber: string,
     *         floor: string,
     *     },
     *     deliveryAddress: array{
     *         name: string,
     *         email: string,
     *         country: string,
     *         postCode: string,
     *         city: string,
     *         street: string,
     *         houseNumber: string,
     *         floor: string,
     *     } | null,
     *     delivery: string | null,
     *     deliveryDate: string,
     *     deliveryTimeRange: string | null,
     *     deliveryCode: string,
     *     typeOfDelivery: string | null,
     *     deliveryBlock: string | null,
     *     deliveryDayTimeCode: string | null,
     *     complaintCode: string | null,
     *     status: string,
     *     payment: string,
     *     invoiceAmount: int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['orderID'],
            $data['customerID'],
            Util::fromRawDate((string) $data['dateOfContract']),
            ShopOrderAddress::fromArray($data['billingAddress']),
            isset($data['deliveryAddress']) ? ShopOrderAddress::fromArray($data['deliveryAddress']) : null,
            isset($data['delivery']) ? (string)$data['delivery'] : null,
            $data['deliveryDate'] ,
            $data['deliveryCode'],
            $data['typeOfDelivery'] ?? null,
            $data['deliveryBlock'] ?? null,
            $data['deliveryDayTimeCode'] ?? null,
            $data['deliveryTimeRange'] ?? null,
            $data['complaintCode'] ?? null,
            $data['status'],
            $data['payment'],
            $data['invoiceAmount'],
        );
    }
}
