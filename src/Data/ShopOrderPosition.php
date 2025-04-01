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
     * @param ?int $unitPrice
     * @param string $status
     * @param ?string $dateOfStatus
     * @param ?string $date
     * @param ?string $dateOfGoodsReturnedFromCustomer
     * @param string $invoiceNumber
     * @param ?string $dateOfComplaint
     * @param int $deliveryNotification
     * @param ?string $typeOfDelivery
     * @param string $deliveryCode
     * @param int $partialDeliveryCode
     * @param string $planningCode
     * @param ?string $deliveryDateOfContractOfSale
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
        private ?int $unitPrice,
        private string $status,
        private ?string $dateOfStatus,
        private ?string $date,
        private ?string $dateOfGoodsReturnedFromCustomer,
        private string $invoiceNumber,
        private ?string $dateOfComplaint,
        private int $deliveryNotification,
        private ?string $typeOfDelivery,
        private string $deliveryCode,
        private int $partialDeliveryCode,
        private string $planningCode,
        private ?string $deliveryDateOfContractOfSale,
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
     * @return ?string
     */
    public function getDateOfGoodsReturnedFromCustomer(): ?string
    {
        return $this->dateOfGoodsReturnedFromCustomer;
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
    public function getUnitPrice(): ?int
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
    public function getDate(): ?string
    {
        return $this->date;
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
     * @return ?string
     */
    public function getTypeOfDelivery(): ?string
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
     *     unitPrice: int | null,
     *     status: string,
     *     date: string | null,
     *     dateOfStatus: string | null,
     *     dateOfGoodsReturnedFromCustomer: string | null,
     *     invoiceNumber: string,
     *     dateOfComplaint: string | null,
     *     deliveryNotification: int,
     *     typeOfDelivery: string | null,
     *     deliveryCode: string,
     *     partialDeliveryCode: int,
     *     planningCode: string,
     *     deliveryDateOfContractOfSale: string | null,
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
            $data['date'] ?? null,
            $data['dateOfGoodsReturnedFromCustomer'] ?? null,
            $data['invoiceNumber'],
            $data['dateOfComplaint'] ?? null,
            $data['deliveryNotification'],
            $data['typeOfDelivery'] ?? null,
            $data['deliveryCode'],
            $data['partialDeliveryCode'],
            $data['planningCode'],
            $data['deliveryDateOfContractOfSale'] ?? null,
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
