<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ArticlePrices
{
    /**
     * Location constructor.
     *
     * @param int|null $recommendedRetailPrice
     * @param int|null $advertisingPrice
     * @param int|null $calculationPrice
     */
    public function __construct(
        private ?int $recommendedRetailPrice,
        private ?int $advertisingPrice,
        private ?int $calculationPrice,
    ) {
    }

    //
    // -- GETTER
    //

    /**
     * @return int|null
     */
    public function getRecommendedRetailPrice(): ?int
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * @return int|null
     */
    public function getAdvertisingPrice(): ?int
    {
        return $this->advertisingPrice;
    }

    /**
     * Returns the calculation price for the article.
     * If no price could be determined, null is returned.
     *
     * @return int|null
     */
    public function getCalculationPrice(): ?int
    {
        return $this->calculationPrice;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     recommendedRetailPrice: ?int,
     *     advertisingPrice: ?int,
     *     calculationPrice: ?int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (
                isset($data['recommendedRetailPrice'])
                    ? (int)$data['recommendedRetailPrice']
                    : null
            ),
            (
                isset($data['advertisingPrice'])
                    ? (int)$data['advertisingPrice']
                    : null
            ),
            (
                isset($data['calculationPrice'])
                    ? (int)$data['calculationPrice']
                    : null
            ),
        );
    }
}
