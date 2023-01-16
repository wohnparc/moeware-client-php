<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticle {

    /**
     * @var SetRef
     */
    private SetRef $set;

    /**
     * @var SetArticleItem[]
     */
    private array $items;

    /**
     * @var int|null
     */
    private ?int $calculatedInventoryPrice;

    /**
     * SetArticle constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     * @param int|null $calculatedInventoryPrice
     */
    public function __construct(
        SetRef $set,
        array $items,
        ?int $calculatedInventoryPrice
    )
    {
        $this->set = $set;
        $this->items = $items;
        $this->calculatedInventoryPrice = $calculatedInventoryPrice;
    }

    /**
     * @return SetRef
     */
    final public function getSet(): SetRef {
        return $this->set;
    }

    /**
     * @return array
     */
    final public function getItems(): array {
        return $this->items;
    }

    /**
     * @return int|null
     */
    final public function getCalculatedInventoryPrice(): ?int {
        return $this->calculatedInventoryPrice;
    }

    /**
     * @param array $data
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
