<?php

namespace Wohnparc\Moeware\Util;

use DateTime;
use DateTimeInterface;

class Util {

    public static function toRawDate(DateTime $date): string {
        return $date->format(DateTimeInterface::RFC3339);
    }

    public static function fromRawDate(string $raw): DateTime {
        return DateTime::createFromFormat(DateTimeInterface::RFC3339, $raw);
    }

}
