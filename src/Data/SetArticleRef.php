<?php

namespace Wohnparc\Moeware\Data;

class SetArticleRef {

    /**
     * @var SetRef
     */
    private SetRef $set;

    /**
     * @var SetArticleItem[]
     */
    private array $items;

    /**
     * SetArticleRef constructor.
     *
     * @param SetRef $set
     * @param SetArticleItem[] $items
     */
    public function __construct(
        SetRef $set,
        array $items
    )
    {
        $this->set = $set;
        $this->items = $items;
    }

    //
    // -- GETTER
    //

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

    //
    // -- HELPER
    //

    /**
     * @return array
     */
    final public function toArray(): array {
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
