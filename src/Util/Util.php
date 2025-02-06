<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Util;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

class Util
{
    public const  DATE_FORMAT = 'Y-m-d\TH:i:s\Z';
    public const  DATE_FORMAT_ALTERNATE = 'Y-m-d\TH:i:s.v\Z';

    /**
     * Returns the formatted string representation of the
     * given DateTime to be used in the GraphQL API.
     *
     * @param DateTime $date
     *
     * @return string
     */
    public static function toRawDate(DateTime $date): string
    {
        return $date->format(DateTimeInterface::RFC3339);
    }

    /**
     * Returns the parsed DateTime object of the given string
     * representation coming from the GraphQL API.
     *
     * @param string $raw
     *
     * @return DateTimeImmutable|null
     */
    public static function fromRawDate(string $raw): ?DateTimeImmutable
    {
        $date = DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $raw);

        if (!$date) {
            $date = DateTimeImmutable::createFromFormat(self::DATE_FORMAT_ALTERNATE, $raw);
        }

        return $date ?: null;
    }

}
