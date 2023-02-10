<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticleRef
{
    /**
     * SetArticleRef constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     */
    public function __construct(
        private SetRef $set,
        private array $items,
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

    //
    // -- HELPER
    //

    /**
     * @return array{
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
     * }
     */
    public function toArray(): array
    {
        return [
            'set' => $this->set->toArray(),
            'items' => array_map(SetArticleItem::mapToArray(), $this->items),
        ];
    }

    /**
     * @return callable(static): array{
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
     * }
     */
    public static function mapToArray(): callable
    {
        return static function (self $self): array {
            return $self->toArray();
        };
    }

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
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            SetRef::fromArray($data['set']),
            array_map([SetArticleItem::class, 'fromArray'], $data['items']),
        );
    }
}
