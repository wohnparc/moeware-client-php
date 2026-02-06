<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopMoeveAvailability
{
    /**
     * @param bool $available
     * @param string|null $unavailabilityReason
     * @param MoeveActiveDowntime|null $activeDowntime
     */
    private function __construct(
        private bool $available,
        private ?string $unavailabilityReason,
        private ?MoeveActiveDowntime $activeDowntime,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @return string|null
     */
    public function getUnavailabilityReason(): ?string
    {
        return $this->unavailabilityReason;
    }

    /**
     * @return MoeveActiveDowntime|null
     */
    public function getActiveDowntime(): ?MoeveActiveDowntime
    {
        return $this->activeDowntime;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     available: bool,
     *     unavailabilityReason: string|null,
     *     activeDowntime: array{
     *         id: string,
     *         type: string,
     *         startedAt: string,
     *         endsAt: string,
     *     }|null,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['available'],
            $data['unavailabilityReason'] ?? null,
            isset($data['activeDowntime'])
                ? MoeveActiveDowntime::fromArray($data['activeDowntime'])
                : null,
        );
    }
}
