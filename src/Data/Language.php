<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

class Language // TODO: refactor to actual enum when shops make use of php 8.1
{
    private const DE = "DE";
    private const EN = "EN";

    /**
     * Language constructor.
     *
     * @param string $value
     */
    private function __construct(
        private string $value,
    ) {
    }

    public static function DE(): self
    {
        return new self(self::DE);
    }

    public static function EN(): self
    {
        return new self(self::EN);
    }

    /**
     * @param Language $other
     *
     * @return bool
     */
    final public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    //
    // -- HELPER
    //

    public static function unsafeCreate(string $value): self
    {
        return new self($value);
    }
}
