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
     * @param ?DateTimeImmutable $stockUpdatedAt
     * @param ?DateTimeImmutable $stockSyncedAt
     * @param ?int $suggestedPrice
     * @param ?DateTimeImmutable $suggestedPriceUpdatedAt
     * @param ?DateTimeImmutable $suggestedPriceSyncedAt
     * @param ?string $moewareURL
     * @param ProductLinkRelationStatusChannel[] $otherChannels
     */
    public function __construct(
        private ?int $stockWarehouse,
        private ?int $stockWithInbound,
        private bool $stockSyncActive,
        private ?DateTimeImmutable $stockUpdatedAt,
        private ?DateTimeImmutable $stockSyncedAt,
        private ?int $suggestedPrice,
        private ?DateTimeImmutable $suggestedPriceUpdatedAt,
        private ?DateTimeImmutable $suggestedPriceSyncedAt,
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
            DateTimeImmutable::createFromFormat(
                DateTimeInterface::RFC3339,
                $data['stockUpdatedAt'],
                new DateTimeZone('UTC'),
            ),
            DateTimeImmutable::createFromFormat(
                DateTimeInterface::RFC3339,
                $data['stockSyncedAt'],
                new DateTimeZone('UTC'),
            ),
            $data['suggestedPrice'],
            DateTimeImmutable::createFromFormat(
                DateTimeInterface::RFC3339,
                $data['suggestedPriceUpdatedAt'],
                new DateTimeZone('UTC'),
            ),
            DateTimeImmutable::createFromFormat(
                DateTimeInterface::RFC3339,
                $data['suggestedPriceSyncedAt'],
                new DateTimeZone('UTC'),
            ),
            $data['moewareURL'] ?? null,
            array_map(
                [ProductLinkRelationStatusChannel::class, 'fromArray'],
                $data['otherChannels']
            )
        );
    }
}
