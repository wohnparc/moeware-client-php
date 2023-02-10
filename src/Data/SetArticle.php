<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticle
{
    /**
     * SetArticle constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     * @param ArticlePrices $prices
     */
    public function __construct(
        private SetRef $set,
        private array $items,
        private ArticlePrices $prices,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return SetRef
     */
    public function getSet(): SetRef
    {
        return $this->set;
    }

    /**
     * @return SetArticleItem[]
     */
    public function getItems(): array
    {
        return $this->items;
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
     *     set: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     items: array{
     *         article: array{
     *             baseID: int,
     *             variantID: int,
     *         },
     *         numberOfPieces: int,
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
            SetRef::fromArray($data['set']),
            array_map([SetArticleItem::class, 'fromArray'], $data['items']),
            ArticlePrices::fromArray($data['prices']),
        );
    }
}
