<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class LocalizedText
{
    /**
     * LocalizedText constructor.
     *
     * @param Language $lang
     * @param string $value
     */
    public function __construct(
        private Language $lang,
        private string $value,
    ) {
    }

    /**
     * Returns the language of the related text.
     *
     * @return Language
     */
    public function getLang(): Language
    {
        return $this->lang;
    }

    /**
     * Returns the value of the related text in the set language.
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
            Language::unsafeCreate($data['lang']),
            (string) $data['value'],
        );
    }
}
