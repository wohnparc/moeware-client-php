<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Util;

use DateTime;
use DateTimeInterface;

class Util
{
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
     * @return DateTime
     */
    public static function fromRawDate(string $raw): ?DateTime
    {
        return DateTime::createFromFormat(DateTimeInterface::RFC3339, $raw) ?: null;
    }
}
