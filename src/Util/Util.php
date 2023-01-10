<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Util;

use DateTime;
use DateTimeInterface;

class Util {

    /**
     * @param DateTime $date
     *
     * @return string
     */
    public static function toRawDate(DateTime $date): string {
        return $date->format(DateTimeInterface::RFC3339);
    }

    /**
     * @param string $raw
     *
     * @return DateTime
     */
    public static function fromRawDate(string $raw): DateTime {
        return DateTime::createFromFormat(DateTimeInterface::RFC3339, $raw);
    }

}
