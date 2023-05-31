<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ArticleText
{
    /**
     * ArticleText constructor.
     *
     * @param ArticleTextType $type
     * @param LocalizedText[] $text
     */
    public function __construct(
        private ArticleTextType $type,
        private array $text,
    ) {
    }

    /**
     * Returns the type of the related text.
     *
     * @return ArticleTextType
     */
    public function getType(): ArticleTextType
    {
        return $this->type;
    }

    /**
     * Returns a list of texts for all available languages.
     *
     * @return array
     */
    public function getText(): array
    {
        return $this->text;
    }

    /**
     * Returns the localized text for the given language if available, null otherwise.
     *
     * @param Language $lang
     *
     * @return LocalizedText|null
     */
    public function getLocalizedText(Language $lang): ?LocalizedText
    {
        foreach ($this->text as $text) {
            if ($text->getLang()->equals($lang)) {
                return $text;
            }
        }

        return null;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     type: string,
     *     text: array{
     *         lang: string,
     *         value: string,
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            ArticleTextType::unsafeCreate($data['type']),
            array_map([LocalizedText::class, 'fromArray'], $data['text']),
        );
    }
}
