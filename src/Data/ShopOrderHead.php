<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopOrderHead
{
    /**
     * ShopOrderHead constructor.
     *
     * @param int $orderID
     * @param int $customerID
     * @param string $dateOfContract
     * @param ShopOrderAddress $billingAddress
     * @param ?ShopOrderAddress $deliveryAddress
     * @param ?string $delivery
     * @param ?string $deliveryDate
     * @param ?int $deliveryYear
     * @param ?int $deliveryWeek
     * @param string $deliveryCode
     * @param ?string $typeOfDelivery
     * @param ?string $deliveryBlock
     * @param ?string $deliveryBeginningDate
     * @param ?string $deliveryEndDate
     * @param ?string $deliveryDayTimeCode
     * @param ?int $deliveryTimeFrom
     * @param ?int $deliveryTimeUntil
     * @param ?string $complaintCode
     * @param string $status
     * @param string $payment
     * @param int $invoiceAmount
     */
    public function __construct(
        private int $orderID,
        private int $customerID,
        private string $dateOfContract,
        private ShopOrderAddress $billingAddress,
        private ?ShopOrderAddress $deliveryAddress,
        private ?string $delivery,
        private ?string $deliveryDate,
        private ?int $deliveryYear,
        private ?int $deliveryWeek,
        private string $deliveryCode,
        private ?string $typeOfDelivery,
        private ?string $deliveryBlock,
        private ?string $deliveryBeginningDate,
        private ?string $deliveryEndDate,
        private ?string $deliveryDayTimeCode,
        private ?int $deliveryTimeFrom,
        private ?int $deliveryTimeUntil,
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
     * @return string
     */
    public function getDateOfContract(): string
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
     * @return ?string
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * @return ?int
     */
    public function getDeliveryYear(): ?int
    {
        return $this->deliveryYear;
    }

    /**
     * @return ?int
     */
    public function getDeliveryWeek(): ?int
    {
        return $this->deliveryWeek;
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
    public function getDeliveryBeginningDate(): ?string
    {
        return $this->deliveryBeginningDate;
    }

    /**
     * @return ?string
     */
    public function getDeliveryEndDate(): ?string
    {
        return $this->deliveryEndDate;
    }

    /**
     * @return ?string
     */
    public function getDeliveryDayTimeCode(): ?string
    {
        return $this->deliveryDayTimeCode;
    }

    /**
     * @return ?int
     */
    public function getDeliveryTimeFrom(): ?int
    {
        return $this->deliveryTimeFrom;
    }

    /**
     * @return ?int
     */
    public function getDeliveryTimeUntil(): ?int
    {
        return $this->deliveryTimeUntil;
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
     *         salutation: string | null,
     *         title: string | null,
     *         firstName: string,
     *         lastName: string,
     *         additionalName: string,
     *         email: string,
     *         country: string,
     *         postCode: string,
     *         city: string,
     *         street: string,
     *         houseNumber: string,
     *         floor: string,
     *     },
     *     deliveryAddress: array{
     *         salutation: string | null,
     *         title: string | null,
     *         firstName: string,
     *         lastName: string,
     *         additionalName: string,
     *         email: string,
     *         country: string,
     *         postCode: string,
     *         city: string,
     *         street: string,
     *         houseNumber: string,
     *         floor: string,
     *     } | null,
     *     delivery: string,
     *     deliveryDate: string | null,
     *     deliveryYear: int | null,
     *     deliveryWeek: int | null,
     *     deliveryCode: string,
     *     typeOfDelivery: string | null,
     *     deliveryBlock: string | null,
     *     deliveryBeginningDate: string | null,
     *     deliveryEndDate: string | null,
     *     deliveryDayTimeCode: string | null,
     *     deliveryTimeFrom: int | null,
     *     deliveryTimeUntil: int | null,
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
            $data['dateOfContract'],
            ShopOrderAddress::fromArray($data['billingAddress']),
            isset($data['deliveryAddress']) ? ShopOrderAddress::fromArray($data['deliveryAddress']) : null,
            isset($data['delivery']) ? (string)$data['delivery'] : null,
            $data['deliveryDate'] ?? null,
            $data['deliveryYear'] ?? null,
            $data['deliveryWeek'] ?? null,
            $data['deliveryCode'],
            $data['typeOfDelivery'] ?? null,
            $data['deliveryBlock'] ?? null,
            $data['deliveryBeginningDate'] ?? null,
            $data['deliveryEndDate'] ?? null,
            $data['deliveryDayTimeCode'] ?? null,
            $data['deliveryTimeFrom'] ?? null,
            $data['deliveryTimeUntil'] ?? null,
            $data['complaintCode'] ?? null,
            $data['status'],
            $data['payment'],
            $data['invoiceAmount'],
        );
    }
}
