<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

/**
 * @phpstan-import-type TrackingPayload from Tracking
 * @phpstan-type ShopOrderPositionPayload array{
 *     positionNumber: int|null,
 *     uniquePositionNumber: int|null,
 *     baseID: int|null,
 *     variantID: int|null,
 *     quantity: int|null,
 *     unitPrice: int|null,
 *     status: string|null,
 *     dateOfStatus: string|null,
 *     date: string|null,
 *     dateOfGoodsReturnedFromCustomer: string|null,
 *     invoiceNumber: string|null,
 *     dateOfComplaint: string|null,
 *     deliveryNotification: int|null,
 *     typeOfDelivery: string|null,
 *     deliveryCode: string|null,
 *     partialDeliveryCode: int|null,
 *     planningCode: string|null,
 *     deliveryDateOfContractOfSale: string|null,
 *     itemText1: string|null,
 *     itemText2: string|null,
 *     itemText3: string|null,
 *     itemTextShop1: string|null,
 *     itemTextShop2: string|null,
 *     itemTextShop3: string|null,
 *     positionText123: string|null,
 *     tracking: list<TrackingPayload>|null
 * }
 */
final class ShopOrderPosition
{
    /**
     * @param int $positionNumber
     * @param int $uniquePositionNumber
     * @param int $baseID
     * @param int $variantID
     * @param int $quantity
     * @param int|null $unitPrice
     * @param string $status
     * @param string|null $dateOfStatus
     * @param string|null $date
     * @param string|null $dateOfGoodsReturnedFromCustomer
     * @param string $invoiceNumber
     * @param string|null $dateOfComplaint
     * @param int $deliveryNotification
     * @param string|null $typeOfDelivery
     * @param string $deliveryCode
     * @param int $partialDeliveryCode
     * @param string $planningCode
     * @param string|null $deliveryDateOfContractOfSale
     * @param string $itemText1
     * @param string $itemText2
     * @param string $itemText3
     * @param string $itemTextShop1
     * @param string $itemTextShop2
     * @param string $itemTextShop3
     * @param string $positionText123
     * @param Tracking[] $tracking
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
        private array $tracking
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
     * @return Tracking[]
     */
    public function getTracking(): array
    {
        return $this->tracking;
    }

    /**
     * @phpstan-param ShopOrderPositionPayload $data
     */
    public static function fromArray(array $data): self
    {
        $tracking = [];
        if (isset($data['tracking'])) {
            $tracking = array_map([Tracking::class, 'fromArray'], $data['tracking']);
        }

        return new self(
            $data['positionNumber'] ?? 0,
            $data['uniquePositionNumber'] ?? 0,
            $data['baseID'] ?? 0,
            $data['variantID'] ?? 0,
            $data['quantity'] ?? 0,
            $data['unitPrice'] ?? null,
            $data['status'] ?? '',
            $data['dateOfStatus'] ?? null,
            $data['date'] ?? null,
            $data['dateOfGoodsReturnedFromCustomer'] ?? null,
            $data['invoiceNumber'] ?? '',
            $data['dateOfComplaint'] ?? null,
            $data['deliveryNotification'] ?? 0,
            $data['typeOfDelivery'] ?? null,
            $data['deliveryCode'] ?? '',
            $data['partialDeliveryCode'] ?? 0,
            $data['planningCode'] ?? '',
            $data['deliveryDateOfContractOfSale'] ?? null,
            $data['itemText1'] ?? '',
            $data['itemText2'] ?? '',
            $data['itemText3'] ?? '',
            $data['itemTextShop1'] ?? '',
            $data['itemTextShop2'] ?? '',
            $data['itemTextShop3'] ?? '',
            $data['positionText123'] ?? '',
            $tracking,
        );
    }
}
