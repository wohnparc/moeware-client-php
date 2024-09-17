<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopOrderPosition
{
    /**
     * ShopOrderPosition constructor.
     *
     * @param int $positionNumber
     * @param int $uniquePositionNumber
     * @param int $baseID
     * @param int $variantID
     * @param int $quantity
     * @param int $unitPrice
     * @param string $status
     * @param ?string $dateOfStatus
     * @param ?string $dateOfContract
     * @param ?string $dateOfDispatch
     * @param ?string $dateOfExpectedDelivery
     * @param ?string $timeOfExpectedDelivery
     * @param ?string $dateOfExpectedDeliveryAccording
     * @param ?string $dateOfGoodsReturnedFromCustomer
     * @param ?string $dateOfPickup
     * @param int $timeOfPickup
     * @param string $invoiceNumber
     * @param ?string $dateOfComplaint
     * @param int $deliveryNotification
     * @param string $typeOfDelivery
     * @param string $deliveryCode
     * @param int $partialDeliveryCode
     * @param string $planningCode
     * @param ?string $deliveryDateOfContractOfSale
     * @param ?string $dateOfReceipt
     * @param ?string $scheduledDeliveryDate
     * @param string $itemText1
     * @param string $itemText2
     * @param string $itemText3
     * @param string $itemTextShop1
     * @param string $itemTextShop2
     * @param string $itemTextShop3
     * @param string $positionText123
     * @param ?string $trackingNumber1
     * @param ?string $trackingNumber2
     * @param ?string $trackingURL
     */
    public function __construct(
        private int $positionNumber,
        private int $uniquePositionNumber,
        private int $baseID,
        private int $variantID,
        private int $quantity,
        private int $unitPrice,
        private string $status,
        private ?string $dateOfStatus,
        private ?string $dateOfContract,
        private ?string $dateOfDispatch,
        private ?string $dateOfExpectedDelivery,
        private ?string $timeOfExpectedDelivery,
        private ?string $dateOfExpectedDeliveryAccording,
        private ?string $dateOfGoodsReturnedFromCustomer,
        private ?string $dateOfPickup,
        private int $timeOfPickup,
        private string $invoiceNumber,
        private ?string $dateOfComplaint,
        private int $deliveryNotification,
        private string $typeOfDelivery,
        private string $deliveryCode,
        private int $partialDeliveryCode,
        private string $planningCode,
        private ?string $deliveryDateOfContractOfSale,
        private ?string $dateOfReceipt,
        private ?string $scheduledDeliveryDate,
        private string $itemText1,
        private string $itemText2,
        private string $itemText3,
        private string $itemTextShop1,
        private string $itemTextShop2,
        private string $itemTextShop3,
        private string $positionText123,
        private ?string $trackingNumber1,
        private ?string $trackingNumber2,
        private ?string $trackingURL
    ) {
    }

    /**
     * @return int
     */
    public function getPositionNumber(): int
    {
        return $this->positionNumber;
    }

    /**
     * @return int
     */
    public function getUniquePositionNumber(): int
    {
        return $this->uniquePositionNumber;
    }

    /**
     * @return int
     */
    public function getBaseID(): int
    {
        return $this->baseID;
    }

    /**
     * @return int
     */
    public function getVariantID(): int
    {
        return $this->variantID;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return ?string
     */
    public function getDateOfStatus(): ?string
    {
        return $this->dateOfStatus;
    }

    /**
     * @return ?string
     */
    public function getDateOfContract(): ?string
    {
        return $this->dateOfContract;
    }

    /**
     * @return ?string
     */
    public function getDateOfDispatch(): ?string
    {
        return $this->dateOfDispatch;
    }

    /**
     * @return ?string
     */
    public function getDateOfExpectedDelivery(): ?string
    {
        return $this->dateOfExpectedDelivery;
    }

    /**
     * @return ?string
     */
    public function getTimeOfExpectedDelivery(): ?string
    {
        return $this->timeOfExpectedDelivery;
    }

    /**
     * @return ?string
     */
    public function getDateOfExpectedDeliveryAccording(): ?string
    {
        return $this->dateOfExpectedDeliveryAccording;
    }

    /**
     * @return ?string
     */
    public function getDateOfGoodsReturnedFromCustomer(): ?string
    {
        return $this->dateOfGoodsReturnedFromCustomer;
    }

    /**
     * @return ?string
     */
    public function getDateOfPickup(): ?string
    {
        return $this->dateOfPickup;
    }

    /**
     * @return int
     */
    public function getTimeOfPickup(): int
    {
        return $this->timeOfPickup;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    /**
     * @return ?string
     */
    public function getDateOfComplaint(): ?string
    {
        return $this->dateOfComplaint;
    }

    /**
     * @return int
     */
    public function getDeliveryNotification(): int
    {
        return $this->deliveryNotification;
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
     * @return int
     */
    public function getPartialDeliveryCode(): int
    {
        return $this->partialDeliveryCode;
    }

    /**
     * @return string
     */
    public function getPlanningCode(): string
    {
        return $this->planningCode;
    }

    /**
     * @return ?string
     */
    public function getDeliveryDateOfContractOfSale(): ?string
    {
        return $this->deliveryDateOfContractOfSale;
    }

    /**
     * @return ?string
     */
    public function getDateOfReceipt(): ?string
    {
        return $this->dateOfReceipt;
    }

    /**
     * @return ?string
     */
    public function getScheduledDeliveryDate(): ?string
    {
        return $this->scheduledDeliveryDate;
    }

    /**
     * @return string
     */
    public function getItemText1(): string
    {
        return $this->itemText1;
    }

    /**
     * @return string
     */
    public function getItemText2(): string
    {
        return $this->itemText2;
    }

    /**
     * @return string
     */
    public function getItemText3(): string
    {
        return $this->itemText3;
    }

    /**
     * @return string
     */
    public function getItemTextShop1(): string
    {
        return $this->itemTextShop1;
    }

    /**
     * @return string
     */
    public function getItemTextShop2(): string
    {
        return $this->itemTextShop2;
    }

    /**
     * @return string
     */
    public function getItemTextShop3(): string
    {
        return $this->itemTextShop3;
    }

    /**
     * @return string
     */
    public function getPositionText123(): string
    {
        return $this->positionText123;
    }

    /**
     * @return ?string
     */
    public function getTrackingNumber1(): ?string
    {
        return $this->trackingNumber1;
    }

    /**
     * @return ?string
     */
    public function getTrackingNumber2(): ?string
    {
        return $this->trackingNumber2;
    }

    /**
     * @return ?string
     */
    public function getTrackingURL(): ?string
    {
        return $this->trackingURL;
    }

    /**
     * @param array{
     *     positionNumber: int,
     *     uniquePositionNumber: int,
     *     baseID: int,
     *     variantID: int,
     *     quantity: int,
     *     unitPrice: int,
     *     status: string,
     *     dateOfStatus: string | null,
     *     dateOfContract: string | null,
     *     dateOfDispatch: string | null,
     *     dateOfExpectedDelivery: string | null,
     *     timeOfExpectedDelivery: string | null,
     *     dateOfExpectedDeliveryAccording: string | null,
     *     dateOfGoodsReturnedFromCustomer: string | null,
     *     dateOfPickup: string | null,
     *     timeOfPickup: int,
     *     invoiceNumber: string,
     *     dateOfComplaint: string | null,
     *     deliveryNotification: int,
     *     typeOfDelivery: string,
     *     deliveryCode: string,
     *     partialDeliveryCode: int,
     *     planningCode: string,
     *     deliveryDateOfContractOfSale: string | null,
     *     dateOfReceipt: string | null,
     *     scheduledDeliveryDate: string | null,
     *     itemText1: string,
     *     itemText2: string,
     *     itemText3: string,
     *     itemTextShop1: string,
     *     itemTextShop2: string,
     *     itemTextShop3: string,
     *     positionText123: string,
     *     trackingNumber1: string | null,
     *     trackingNumber2: string | null,
     *     trackingURL: string | null,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['positionNumber'],
            $data['uniquePositionNumber'],
            $data['baseID'],
            $data['variantID'],
            $data['quantity'],
            $data['unitPrice'],
            $data['status'],
            $data['dateOfStatus'] ?? null,
            $data['dateOfContract'] ?? null,
            $data['dateOfDispatch'] ?? null,
            $data['dateOfExpectedDelivery'] ?? null,
            $data['timeOfExpectedDelivery'] ?? null,
            $data['dateOfExpectedDeliveryAccording'] ?? null,
            $data['dateOfGoodsReturnedFromCustomer'] ?? null,
            $data['dateOfPickup'] ?? null,
            $data['timeOfPickup'],
            $data['invoiceNumber'],
            $data['dateOfComplaint'] ?? null,
            $data['deliveryNotification'],
            $data['typeOfDelivery'],
            $data['deliveryCode'],
            $data['partialDeliveryCode'],
            $data['planningCode'],
            $data['deliveryDateOfContractOfSale'] ?? null,
            $data['dateOfReceipt'] ?? null,
            $data['scheduledDeliveryDate'] ?? null,
            $data['itemText1'],
            $data['itemText2'],
            $data['itemText3'],
            $data['itemTextShop1'],
            $data['itemTextShop2'],
            $data['itemTextShop3'],
            $data['positionText123'],
            $data['trackingNumber1'] ?? null,
            $data['trackingNumber2'] ?? null,
            $data['trackingURL'] ?? null
        );
    }
}
