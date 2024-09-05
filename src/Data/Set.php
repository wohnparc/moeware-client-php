<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Set
{
    /**
     * Set constructor.
     *
     * @param string $id
     * @param SetRef $ref
     * @param LocalizedText[] $title1
     * @param LocalizedText[] $title2
     * @param LocalizedText[] $title3
     * @param string $manufacturer
     * @param bool $pseudoStockEnabled
     * @param int $pseudoStockCount
     * @param SetArticleItem[] $items
     */
    public function __construct(
        private string $id,
        private SetRef $ref,
        private array $title1,
        private array $title2,
        private array $title3,
        private string $manufacturer,
        private bool $pseudoStockEnabled,
        private int $pseudoStockCount,
        private array $items,
    ) {
    }



    //
    // -- GETTER
    //

    /**
     * @return SetArticleItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return SetRef
     */
    public function getRef(): SetRef
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
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @return bool
     */
    public function getPseudoStockEnabled(): bool
    {
        return $this->pseudoStockEnabled;
    }

    /**
     * @return int
     */
    public function getPseudoStockCount(): int
    {
        return $this->pseudoStockCount;
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
     *     items: array{
     *            article: array{
     *              baseID: int,
     *              variantID: int,
     *            },
     *            numberOfPieces: int,
     *     }[],
     *      title1: array{
     *    array{
     *          lang: string,
     *          value: string,
     *      },
     *    },
     *      title2: array{
     *    array{
     *          lang: string,
     *          value: string,
     *      },
     *    },
     *      title3: array{
     *    array{
     *          lang: string,
     *          value: string,
     *      },
     *    },
     *     manufacturer: string,
     *     pseudoStockEnabled: bool,
     *     pseudoStockCount: int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string) $data['id'],
            SetRef::fromArray($data['ref']),
            array_map([LocalizedText::class, 'fromArray'], $data['title1']),
            array_map([LocalizedText::class, 'fromArray'], $data['title2']),
            array_map([LocalizedText::class, 'fromArray'], $data['title3']),
            (string) $data['manufacturer'],
            (bool) $data['pseudoStockEnabled'],
            (int) $data['pseudoStockCount'],
            array_map(
                [SetArticleItem::class, 'fromArray'],
                $data['items'],
            ),
        );
    }

}
