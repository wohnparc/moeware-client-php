<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticleRef {

    /**
     * SetArticleRef constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     */
    public function __construct(
        private SetRef $set,
        private array $items,
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

    //
    // -- HELPER
    //

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'set' => $this->set->toArray(),
            'items' => array_map(SetArticleItem::mapToArray(), $this->items),
        ];
    }

    /**
     * @return callable
     */
    public static function mapToArray(): callable {
        return static function(self $self): array {
            return $self->toArray();
        };
    }

}
