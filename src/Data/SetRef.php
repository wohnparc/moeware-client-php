<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

class SetRef {

    /**
     * @var int
     */
    private int $baseID;

    /**
     * @var int
     */
    private int $variantID;

    /**
     * SetRef constructor.
     *
     * @param int $baseID
     * @param int $variantID
     */
    public function __construct(
        int $baseID,
        int $variantID
    )
    {
        $this->baseID = $baseID;
        $this->variantID = $variantID;
    }

    //
    // -- GETTER
    //

    /**
     * Returns the base ID of the set reference.
     *
     * @return int
     */
    final public function getBaseID(): int {
        return $this->baseID;
    }

    /**
     * Returns the variant ID of the set reference.
     *
     * @return int
     */
    final public function getVariantID(): int {
        return $this->variantID;
    }

    //
    // -- MAGIC METHODS
    //

    /**
     * @return string
     */
    public function __toString(): string {
        return "$this->baseID/" . str_pad($this->variantID, 2, "0", STR_PAD_LEFT);
    }

    //
    // -- HELPER
    //

    /**
     * @return array
     */
    final public function toArray(): array {
        return [
            'baseID' => $this->baseID,
            'variantID' => $this->variantID,
        ];
    }

    /**
     * @param array $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (int)($data['baseID'] ?? 0),
            (int)($data['variantID'] ?? 0),
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
