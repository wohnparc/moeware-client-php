<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ArticleRef {

    /**
     * ArticleRef constructor.
     *
     * @param int $baseID
     * @param int $variantID
     */
    public function __construct(
        private int $baseID,
        private int $variantID,
    ) {}

    //
    // -- GETTER
    //

    /**
     * @return int
     */
    public function getBaseID(): int {
        return $this->baseID;
    }

    /**
     * @return int
     */
    public function getVariantID(): int {
        return $this->variantID;
    }

    //
    // -- HELPER
    //

    /**
     * @return string
     */
    public function __toString(): string {
        return "$this->baseID/" . str_pad((string)$this->variantID, 2, "0", STR_PAD_LEFT);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'baseID' => $this->baseID,
            'variantID' => $this->variantID,
        ];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (int) $data['baseID'],
            (int) $data['variantID']
        );
    }

    /**
     * @return callable
     */
    public static function mapToArray(): callable {
        return static function(self $self): array {
            return $self->toArray();
        };
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
