<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticle {

    /**
     * SetArticle constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     * @param int|null $calculatedInventoryPrice
     */
    public function __construct(
        private SetRef $set,
        private array $items,
        private ?int $calculatedInventoryPrice,
    ) {}

    //
    // -- GETTER
    //

    /**
     * @return SetRef
     */
    public function getSet(): SetRef {
        return $this->set;
    }

    /**
     * @return SetArticleItem[]
     */
    public function getItems(): array {
        return $this->items;
    }

    /**
     * @return int|null
     */
    public function getCalculatedInventoryPrice(): ?int {
        return $this->calculatedInventoryPrice;
    }

    //
    // -- HELPER
    //

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            SetRef::fromArray($data['set'] ?? []),
            array_map(SetArticleItem::mapFromArray(), $data['items'] ?? []),
            (
                isset($data['calculatedInventoryPrice'])
                    ? (int)$data['calculatedInventoryPrice']
                    : null
            ),
        );
    }

    /**
     * @return callable
     */
    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
