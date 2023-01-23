<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Article {

    /**
     * Article constructor.
     *
     * @param string $id
     * @param ArticleRef $ref
     * @param string $title
     * @param string $description
     * @param Stock[] $stock
     * @param int|null $calculatedInventoryPrice
     */
    public function __construct(
        private string $id,
        private ArticleRef $ref,
        private string $title,
        private string $description,
        private array $stock,
        private ?int $calculatedInventoryPrice,
    ) {}

    //
    // -- GETTER
    //

    /**
     * Returns the ID for the article.
     *
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Returns the external reference of the article.
     *
     * @return ArticleRef
     */
    public function getRef(): ArticleRef {
        return $this->ref;
    }

    /**
     * Returns the title of the article.
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Returns the description of the article.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Returns the current stock data of the article.
     *
     * @return Stock[]
     */
    public function getStock(): array {
        return $this->stock;
    }

    /**
     * Returns the calculated inventory price for the article.
     * If no price could be calculated, null is returned.
     *
     * @return int|null
     */
    public function getCalculatedInventoryPrice(): ?int {
        return $this->calculatedInventoryPrice;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     id: string,
     *     ref: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     title: string,
     *     description: string,
     *     stock: array{
     *         location: array{
     *             code: string,
     *             number: int,
     *         },
     *         quantity: int,
     *         expectedAt: ?string,
     *     }[],
     *     calculatedInventoryPrice: ?int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (string)($data['id']),
            ArticleRef::fromArray($data['ref']),
            (string)($data['title']),
            (string)($data['description']),
            array_map([Stock::class, 'fromArray'], $data['stock']),
            (
                isset($data['calculatedInventoryPrice'])
                    ? (int)$data['calculatedInventoryPrice']
                    : null
            ),
        );
    }

}
