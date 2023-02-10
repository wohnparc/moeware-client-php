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
     * @param string $title
     * @param string $description
     * @param Stock[] $stock
     * @param ArticlePrices $prices
     */
    public function __construct(
        private string $id,
        private ArticleRef $ref,
        private string $title,
        private string $description,
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
     * Returns the title of the article.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Returns the description of the article.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     *     title: string,
     *     description: string,
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
            (string)($data['title']),
            (string)($data['description']),
            array_map([Stock::class, 'fromArray'], $data['stock']),
            ArticlePrices::fromArray($data['prices']),
        );
    }
}
