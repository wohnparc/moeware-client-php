<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

final class ProductLinkRelationStatus
{
    /**
     * ProductLinkRelationStatus constructor.
     *
     * @param ?int $stockWarehouse
     * @param ?int $stockWithInbound
     * @param bool $stockSyncActive
     * @param ?string $stockUpdatedAt
     * @param ?string $stockSyncedAt
     * @param ?int $suggestedPrice
     * @param ?string $suggestedPriceUpdatedAt
     * @param ?string $suggestedPriceSyncedAt
     * @param ?string $moewareURL
     * @param ProductLinkRelationStatusChannel[] $otherChannels
     */
    public function __construct(
        private ?int $stockWarehouse,
        private ?int $stockWithInbound,
        private bool $stockSyncActive,
        private ?string $stockUpdatedAt,
        private ?string $stockSyncedAt,
        private ?int $suggestedPrice,
        private ?string $suggestedPriceUpdatedAt,
        private ?string $suggestedPriceSyncedAt,
        private ?string $moewareURL,
        private array $otherChannels,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return ?int
     */
    public function getStockWarehouse(): ?int
    {
        return $this->stockWarehouse;
    }

    /**
     * @return ?int
     */
    public function getStockWithInbound(): ?int
    {
        return $this->stockWithInbound;
    }

    /**
     * @return bool
     */
    public function isStockSyncActive(): bool
    {
        return $this->stockSyncActive;
    }

    /**
     * @return ?string
     */
    public function getStockUpdatedAt(): ?string
    {
        return $this->stockUpdatedAt;
    }

    /**
     * @return ?string
     */
    public function getStockSyncedAt(): ?string
    {
        return $this->stockSyncedAt;
    }

    /**
     * @return ?int
     */
    public function getSuggestedPrice(): ?int
    {
        return $this->suggestedPrice;
    }

    /**
     * @return ?string
     */
    public function getSuggestedPriceUpdatedAt(): ?string
    {
        return $this->suggestedPriceUpdatedAt;
    }

    /**
     * @return ?string
     */
    public function getSuggestedPriceSyncedAt(): ?string
    {
        return $this->suggestedPriceSyncedAt;
    }

    /**
     * @return ?string
     */
    public function getMoewareURL(): ?string
    {
        return $this->moewareURL;
    }

    /**
     * @return ProductLinkRelationStatusChannel[]
     */
    public function getOtherChannels(): array
    {
        return $this->otherChannels;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     stockWarehouse: int | null,
     *     stockWithInbound: int| null,
     *     stockSyncActive: bool,
     *     stockUpdatedAt: string| null,
     *     stockSyncedAt: string| null,
     *     suggestedPrice: int| null,
     *     suggestedPriceUpdatedAt: string| null,
     *     suggestedPriceSyncedAt: string| null,
     *     moewareURL: string| null,
     *     otherChannels: array{
     *         channelID: string,
     *         domainIconURL: string,
     *         platformIconURL: string,
     *     }
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['stockWarehouse'] ?? null,
            $data['stockWithInbound'] ?? null,
            ((bool)$data['stockSyncActive']),
            isset($data['stockUpdatedAt'])
                ? DateTimeImmutable::createFromFormat(
                    DateTimeInterface::RFC3339,
                    $data['stockUpdatedAt'],
                    DateTimeZone::UTC,
                )
                : null,
            isset($data['stockSyncedAt'])
                ? DateTimeImmutable::createFromFormat(
                    DateTimeInterface::RFC3339,
                    $data['stockSyncedAt'],
                    DateTimeZone::UTC,
                )
                : null,
            $data['suggestedPrice'],
            isset($data['suggestedPriceUpdatedAt'])
                ? DateTimeImmutable::createFromFormat(
                    DateTimeInterface::RFC3339,
                    $data['suggestedPriceUpdatedAt'],
                    DateTimeZone::UTC,
                )
                : null,
            isset($data['suggestedPriceSyncedAt'])
                ? DateTimeImmutable::createFromFormat(
                    DateTimeInterface::RFC3339,
                    $data['suggestedPriceSyncedAt'],
                    DateTimeZone::UTC,
                )
                : null,
            $data['moewareURL'] ?? null,
            array_map(
                [ProductLinkRelationStatusChannel::class, 'fromArray'],
                $data['otherChannels']
            )
        );
    }
}
