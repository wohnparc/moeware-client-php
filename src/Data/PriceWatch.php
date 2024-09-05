<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Wohnparc\Moeware\Util\Util;

final class PriceWatch
{
    /**
     * @param int|null $suggestedPrice
     * @param \DateTimeImmutable|null $suggestedPriceUpdatedAt
     * @param \DateTimeImmutable|null $suggestedPriceSyncedAt
     * @param bool $enabled
     * @param string|null $externalID
     */
    public function __construct(
        private ?int $suggestedPrice,
        private ?DateTimeImmutable $suggestedPriceUpdatedAt,
        private ?DateTimeImmutable $suggestedPriceSyncedAt,
        private bool $enabled,
        private ?string $externalID,
    ) {
    }

    /**
     * @return int|null
     */
    public function getSuggestedPrice(): ?int
    {
        return $this->suggestedPrice;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getSuggestedPriceUpdatedAt(): ?DateTimeImmutable
    {
        return $this->suggestedPriceUpdatedAt;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getSuggestedPriceSyncedAt(): ?DateTimeImmutable
    {
        return $this->suggestedPriceSyncedAt;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return string|null
     */
    public function getExternalID(): ?string
    {
        return $this->externalID;
    }

    /**
     * @param array{
     *      enabled: bool,
     *      externalID: string|null,
     *      suggestedPrice: int| null,
     *      suggestedPriceUpdatedAt: string| null,
     *      suggestedPriceSyncedAt: string| null,
     * } $data
     */
    public static function fromArray(
        array $data
    ): self {
        return new self(
            $data['suggestedPrice'],
            Util::fromRawDate($data['suggestedPriceUpdatedAt'] ?? ''),
            Util::fromRawDate($data['suggestedPriceSyncedAt'] ?? ''),
            ((bool) $data['enabled']),
            $data['externalID'] ?: null,
        );
    }

}
