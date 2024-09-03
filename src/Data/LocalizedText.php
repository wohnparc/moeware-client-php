<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class LocalizedText
{
    /**
     * LocalizedText constructor.
     *
     * @param string $lang
     * @param string $value
     */
    public function __construct(
        private string $lang,
        private string $value
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * Returns the language code.
     *
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * Returns the localized text.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     lang: string,
     *     value: string,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string)($data['lang']),
            (string)($data['value'])
        );
    }
}
