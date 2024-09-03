<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ProductLinkInfo
{
    /**
     * ProductLinkInfo constructor.
     *
     * @param bool $productNotFound
     * @param bool $productDisabled
     * @param bool $invalidSetConfig
     * @param bool $invalidSetItems
     */
    public function __construct(
        private bool $productNotFound,
        private bool $productDisabled,
        private bool $invalidSetConfig,
        private bool $invalidSetItems,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return bool
     */
    public function isProductNotFound(): bool
    {
        return $this->productNotFound;
    }

    /**
     * @return bool
     */
    public function isProductDisabled(): bool
    {
        return $this->productDisabled;
    }

    /**
     * @return bool
     */
    public function isInvalidSetConfig(): bool
    {
        return $this->invalidSetConfig;
    }

    /**
     * @return bool
     */
    public function isInvalidSetItems(): bool
    {
        return $this->invalidSetItems;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     productNotFound: bool,
     *     productDisabled: bool,
     *     invalidSetConfig: bool,
     *     invalidSetItems: bool,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (bool)$data['productNotFound'],
            (bool)$data['productDisabled'],
            (bool)$data['invalidSetConfig'],
            (bool)$data['invalidSetItems'],
        );
    }
}
