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
     * @param string $manufacturer
     * @param bool $pseudoStockEnabled
     * @param int $pseudoStockCount
     * @param Stock[] $stock
     * @param ArticlePrices $prices
     */
    public function __construct(
        private string $id,
        private ArticleRef $ref,
        private array $title1,
        private array $title2,
        private array $title3,
        private string $manufacturer,
        private bool $pseudoStockEnabled,
        private int $pseudoStockCount,
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
     * Returns the first title of the article.
     *
     * @return LocalizedText[]
     */
    public function getTitle1(): array
    {
        return $this->title1;
    }

    /**
     * Returns the second title of the article.
     *
     * @return LocalizedText[]
     */
    public function getTitle2(): array
    {
        return $this->title2;
    }

    /**
     * Returns the third title of the article.
     *
     * @return LocalizedText[]
     */
    public function getTitle3(): array
    {
        return $this->title3;
    }

    /**
     * Returns the manufacturer of the article.
     *
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * Returns whether the pseudo stock is enabled.
     *
     * @return bool
     */
    public function isPseudoStockEnabled(): bool
    {
        return $this->pseudoStockEnabled;
    }

    /**
     * Returns the pseudo stock count.
     *
     * @return int
     */
    public function getPseudoStockCount(): int
    {
        return $this->pseudoStockCount;
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
     *             title1: array{
     *              array{
     *                lang: string,
     *                value: string,
     *              },
     *             },
     *             title2: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *             title3: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *     manufacturer: string,
     *     pseudoStockEnabled: bool,
     *     pseudoStockCount: int,
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
            (string) ($data['id']),
            ArticleRef::fromArray($data['ref']),
            array_map([LocalizedText::class, 'fromArray'], $data['title1']),
            array_map([LocalizedText::class, 'fromArray'], $data['title2']),
            array_map([LocalizedText::class, 'fromArray'], $data['title3']),
            (string) ($data['manufacturer']),
            (bool) ($data['pseudoStockEnabled']),
            (int) ($data['pseudoStockCount']),
            array_map([Stock::class, 'fromArray'], $data['stock']),
            ArticlePrices::fromArray($data['prices']),
        );
    }

}
