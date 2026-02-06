<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use Wohnparc\Moeware\Util\Util;

final class MoeveActiveDowntime
{
    /**
     * @param string $id
     * @param string $type
     * @param DateTimeImmutable $startedAt
     * @param DateTimeImmutable $endsAt
     */
    private function __construct(
        private string $id,
        private string $type,
        private DateTimeImmutable $startedAt,
        private DateTimeImmutable $endsAt,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStartedAt(): DateTimeImmutable
    {
        return $this->startedAt;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getEndsAt(): DateTimeImmutable
    {
        return $this->endsAt;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     id: string,
     *     type: string,
     *     startedAt: string,
     *     endsAt: string,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['type'],
            Util::fromRawDate($data['startedAt']) ?? new DateTimeImmutable(),
            Util::fromRawDate($data['endsAt']) ?? new DateTimeImmutable(),
        );
    }
}
