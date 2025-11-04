<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

/**
 * @phpstan-type TrackingPayload array{
 *     Number1: string|null,
 *     Number2: string|null,
 *     URL: string|null
 * }
 */
final class Tracking
{
    /**
     * @param string|null $number1
     * @param string|null $number2
     * @param string|null $url
     */
    public function __construct(
        private ?string $number1,
        private ?string $number2,
        private ?string $url
    ) {
    }

    /**
     * @return ?string
     */
    public function getNumber1(): ?string
    {
        return $this->number1;
    }

    /**
     * @return ?string
     */
    public function getNumber2(): ?string
    {
        return $this->number2;
    }

    /**
     * @return ?string
     */
    public function getURL(): ?string
    {
        return $this->url;
    }

    /**
     * @phpstan-param TrackingPayload $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['Number1'] ?? null,
            $data['Number2'] ?? null,
            $data['URL'] ?? null,
        );
    }
}
