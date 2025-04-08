<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\SimpleType;

/** @phpstan-import-type UserPayload from \Wohnparc\Moeware\Data\SimpleType */
final class Consumer
{
    public function __invoke(): void
    {
        /** @phpstan-var UserPayload $user */
        $user = [
            'id' => 1,
            'name' => 'Max Mustermann',
            'email' => 'max@example.com',
        ];

        echo $user['name'];
    }
}
