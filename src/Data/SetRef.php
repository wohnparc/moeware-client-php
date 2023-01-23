<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetRef
{
    /**
     * SetRef constructor.
     *
     * @param int $baseID
     * @param int $variantID
     */
    public function __construct(
        private int $baseID,
        private int $variantID,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * Returns the base ID of the set reference.
     *
     * @return int
     */
    public function getBaseID(): int
    {
        return $this->baseID;
    }

    /**
     * Returns the variant ID of the set reference.
     *
     * @return int
     */
    public function getVariantID(): int
    {
        return $this->variantID;
    }

    //
    // -- MAGIC METHODS
    //

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "$this->baseID/" . str_pad((string)$this->variantID, 2, "0", STR_PAD_LEFT);
    }

    //
    // -- HELPER
    //

    /**
     * @return array{
     *     baseID: int,
     *     variantID: int,
     * }
     */
    public function toArray(): array
    {
        return [
            'baseID' => $this->baseID,
            'variantID' => $this->variantID,
        ];
    }

    /**
     * @param array{
     *     baseID: int,
     *     variantID: int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (int)($data['baseID']),
            (int)($data['variantID']),
        );
    }
}
