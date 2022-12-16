<?php

namespace Wohnparc\Moeware\Data;

class ArticleRef {

    private int $baseID;

    private int $variantID;

    final public function getBaseID(): int {
        return $this->baseID;
    }

    final public function getVariantID(): int {
        return $this->variantID;
    }

    public function __toString(): string {
        return "$this->baseID/" . str_pad($this->variantID, 2, "0", STR_PAD_LEFT);
    }

    final public function toArray(): array {
        return [
            'baseID' => $this->baseID,
            'variantID' => $this->variantID,
        ];
    }

    public static function fromArray(array $data): self {
        $self = new self();

        $self->baseID = $data['baseID'];
        $self->variantID = $data['variantID'];

        return $self;
    }

    public static function mapToArray(): callable {
        return static function(self $self): array {
            return $self->toArray();
        };
    }

    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
