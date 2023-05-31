<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

class ArticleTextType // TODO: refactor to actual enum when shops make use of php 8.1
{
    private const MAIN = "MAIN";

    /**
     * ArticleTextType constructor.
     *
     * @param string $value
     */
    private function __construct(
        private string $value,
    ) {
    }

    /**
     * Returns an instance of ArticleTextType of the enum value MAIN.
     *
     * @return self
     */
    public static function MAIN(): self
    {
        return new self(self::MAIN);
    }

    /**
     * Returns whether the passed ArticleTextType object is equal to the current one.
     *
     * @param ArticleTextType $other
     *
     * @return bool
     */
    final public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    /**
     * Returns a string representation of the ArticleTextType object.
     *
     * @return string
     */
    final public function __toString(): string
    {
        return $this->value;
    }

    //
    // -- HELPER
    //

    /**
     * Manually creates an instance of ArticleTextType with the given enum value.
     * Only used within the library. DO NOT USE OTHERWISE.
     *
     * @param string $value
     *
     * @return self
     */
    public static function unsafeCreate(string $value): self
    {
        return new self($value);
    }
}
