<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Article
{
    /**
     * Article constructor.
     *
     * @param string $id
     * @param ArticleRef $ref
     * @param LocalizedText[] $title1
     * @param LocalizedText[] $title2
     * @param LocalizedText[] $title3
     * @param ArticleText[] $texts
     * @param Stock[] $stock
     * @param ArticlePrices $prices
     */
    public function __construct(
        private string $id,
        private ArticleRef $ref,
        private array $title1,
        private array $title2,
        private array $title3,
        private array $texts,
        private array $stock,
        private ArticlePrices $prices,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * Returns the ID for the article.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the external reference of the article.
     *
     * @return ArticleRef
     */
    public function getRef(): ArticleRef
    {
        return $this->ref;
    }

    /**
     * @return LocalizedText[]
     */
    public function getTitle1(): array
    {
        return $this->title1;
    }

    /**
     * @return LocalizedText[]
     */
    public function getTitle2(): array
    {
        return $this->title2;
    }

    /**
     * @return LocalizedText[]
     */
    public function getTitle3(): array
    {
        return $this->title3;
    }

    /**
     * @return ArticleText[]
     */
    public function getTexts(): array
    {
        return $this->texts;
    }

    /**
     * @param ArticleTextType $type
     *
     * @return ArticleText|null
     */
    public function getTextForType(ArticleTextType $type): ?ArticleText
    {
        foreach($this->texts as $text) {
            if($text->getType()->equals($type)) {
                return $text;
            }
        }

        return null;
    }

    /**
     * Returns the current stock data of the article.
     *
     * @return Stock[]
     */
    public function getStock(): array
    {
        return $this->stock;
    }

    /**
     * @return ArticlePrices
     */
    public function getPrices(): ArticlePrices
    {
        return $this->prices;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     id: string,
     *     ref: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     title1: array{
     *         lang: string,
     *         value: string,
     *     },
     *     title2: array{
     *         lang: string,
     *         value: string,
     *     },
     *     title3: array{
     *         lang: string,
     *         value: string,
     *     },
     *     texts: array{
     *         type: string,
     *         text: array{
     *             lang: string,
     *             value: string,
     *         },
     *     },
     *     stock: array{
     *         location: array{
     *             code: string,
     *             number: int,
     *         },
     *         quantity: int,
     *         expectedAt: ?string,
     *     }[],
     *     prices: array{
     *         recommendedRetailPrice: ?int,
     *         advertisingPrice: ?int,
     *         calculationPrice: ?int,
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string)($data['id']),
            ArticleRef::fromArray($data['ref']),
            array_map([LocalizedText::class, 'fromArray'], $data['title1']),
            array_map([LocalizedText::class, 'fromArray'], $data['title2']),
            array_map([LocalizedText::class, 'fromArray'], $data['title3']),
            array_map([ArticleText::class, 'fromArray'], $data['texts']),
            array_map([Stock::class, 'fromArray'], $data['stock']),
            ArticlePrices::fromArray($data['prices']),
        );
    }
}
